<?php
namespace App\Model;
use App\Config\Database;
use PDO;
use Exception;
use PDOException;
class User
{
    /**
     * 進行與資料庫的初始連線
     * 回傳連線
     *
     * @return  PDO         $db     資料庫的連線
     * @throws  Exception   $e      回應錯誤訊息
     */
    function dbConnect()
    {
        $type_db = Database::DATABASE_INFO['type_db'];
        $type_db_host = Database::DATABASE_INFO['type_db_host'];
        $type_db_name = Database::DATABASE_INFO['type_db_name'];
        $type_db_user = Database::DATABASE_INFO['type_db_user'];
        $type_db_pass = Database::DATABASE_INFO['type_db_pass'];
        $connect = $type_db . ":host=" . $type_db_host . ";dbname=" .
            $type_db_name;
        try {
            $db = new PDO($connect, $type_db_user, $type_db_pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->query("SET NAMES UTF8");
        } catch (PDOException $e) {
            die("Error!:" . $e->getMessage() . '<br>');
        }
        return $db;
    }
    /**
     * 
     * @param string $account
     * @param string $password
     * @param string $email
     * @param string $pass_check
     * @throws \Exception
     * @return array
     */ 
    public function registerUser(
        string $email,
        string $account,
        string $password,
        string $password_check,
    ) {
        $db = $this->dbConnect();
        $sql = "INSERT INTO users (account, password, email) VALUES (?,?,?)";
        $statement = $db->prepare($sql);
        $check =$this->checkUser($account, $email);
        // var_dump($check);
        try {
            if (empty($account) || empty($password) || empty($email)||empty($password_check) )
            {
                throw new Exception("資料不齊全");
            }
            if ($password_check !== $password) 
            {
                throw new Exception("密碼不一致");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                throw new Exception("email格式錯誤");          
            }
            if ($check['name_RESULT'] ||$check['email_RESULT']){
                if(($check['name_RESULT'] && $check['email_RESULT'])){
                    throw new Exception("帳號或信箱已被註冊");
                }else if ($check['name_RESULT']){
                    throw new Exception("帳號已被註冊");
                }else {
                    throw new Exception("信箱已被註冊");
                }
            }
            $password = password_hash($password, PASSWORD_DEFAULT);
            if ($statement->execute([$account, $password, $email])) {
                $return = [
                    "event" => "註冊成功",
                    "status" => "success",
                    "content" => "已註冊 # $account.再請登入",
                ];
                http_response_code(201);
                return $return;
            } else {
                throw new Exception("未知錯誤" . $statement->errorInfo()[2]);
            }
        } catch (PDOException $e) {
            $return = [
                "event" => "註冊失敗",
                "status" => "error",
                "content" => "註冊失敗.原因: " . $e->getMessage(),
            ];
            http_response_code(500);
            return $return;
        } catch (Exception $e) {
            $return = [
                "event" => "註冊失敗",
                "status" => "error",
                "content" => "註冊失敗.原因: " . $e->getMessage(),
            ];
            http_response_code(400);
            return $return;
        }
    }
    function checkUser (string $account,string $email)
    {
        $db = $this->dbConnect();
        $sql = "SELECT IF (EXISTS (
                        SELECT account 
                        FROM users 
                        WHERE account = ?), 1, 0) AS name_RESULT,
                    IF (EXISTS(
                        SELECT email
                        FROM users
                        WHERE email = ?), 1, 0) AS email_RESULT";
        $statement = $db->prepare($sql);
        $statement->execute([$account,$email]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function loginUser (string $account,string $password){
        $db = $this->dbConnect();
        $sql = "SELECT * FROM users WHERE account = ?";
        $statement = $db->prepare($sql);
        $statement->execute([$account]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        try {
            if(empty($account) || empty($password))
            {
                throw new Exception("帳號或密碼為空");
            }
            if ($user && password_verify($password, $user['password']))
                {
                    $_SESSION['session'] = $user['id'];
                    $return = [
                        "event"=> "登入成功",
                        "status" => "success",
                        "content" => "使用者. $account .已登入",
                        "user" => [
                            "account" => $account,
                            "email" => $user["email"],
                            "id" => $user["id"]
                        ]
                    ];
                    return $return;
                }
                else
                {
                    $return = [
                        "event"=> "登入失敗",
                        "status" => "error",
                        "content" => "此帳號或密碼錯誤",
                    ];
                    http_response_code(401);
                    return $return;
                }
        }
        catch (Exception $e)
        {
            $return = [
                "event" => "登入失敗",
                "status" => "error",
                "content" => "登入失敗.原因: " . $e->getMessage(),
            ];
        }
    }
    /**
     * 帳號登入
     * 必須：
     * 1. 驗證輸入蘭為皆有輸入
     * 2. 向資料庫驗證帳號密碼正確性
     * 3. 回傳必須回傳的使用者資料
     * 4. 我該怎麼讓前端請求到後端的時候知道你是誰?
     *      - 1. 關鍵字 Session & Cookie
     *      - 2. Cookie 中的 PHPSESSID
     *      - 3, $_COOKIE['X-User-Id'] = $data['id'];，這句請忽略，你寫完我
     *              再來跟你說用在哪
     */
}