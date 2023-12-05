<?php
namespace App\Model;
use App\Config\Database;
use PDO;
use Exception;
use PDOException;

class Comment{

    /**
     * 資料庫連線
     */
    public function dbConnect(){
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
    function createComment($comment)
    {
        $db = $this->dbConnect();
        $sql = "INSERT INTO comments (content) VALUES (?)";
        $statement = $db->prepare($sql);
        try 
        {
            if (empty($comment)) {
                throw new Exception("新增的留言不可為空");
            }
            else {
                $statement->execute([$comment]);
                $return =[
                    "event" => "新增留言成功",
                    "status" =>"success",
                    "content" => "已新增留言",
                    "text" => $comment,
                ];
                http_response_code(201);
                return $return;
            }
        }
        catch(Exception $e)
        {
            $return = [
                "event" => "新增失敗",
                "status" => "error",
                "content" => "新增留言失敗.原因: " . $e->getMessage(),
            ];
            http_response_code(403);
            return $return;
        }
    }
    function getComment()
    {
        $db = $this->dbConnect();
        $sql = "SELECT * FROM comments";
        $statement = $db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    function deleteComment($id)
    {
        $db = $this->dbConnect();
        $sql = "DELETE FROM comments WHERE id = ?";
        $statement = $db->prepare($sql);
        $check = $this->findId($id);
        try{
            
            if (empty($id)) 
            {
                throw new Exception("id不可為空");
            }
            
            if (!$check) {
                throw new Exception("找不到指定的id");
            }
            else
            {
                $statement->execute([$id]);
                $return = [
                    "event" => "刪除成功",
                    "status" => "success",
                    "content" => "已刪除留言",
                ];
                http_response_code(200);
                return $return;
            }
        }
        catch(Exception $e)
        {
            $return = [
                "event" => "刪除失敗",
                "status" => "error",
                "content" => "刪除留言失敗，" .$e->getMessage(),
            ];
            http_response_code(401);
            return $return;
        }
    }
    function findId ($id){
        $db = $this->dbConnect();
        $sql = "SELECT * FROM comments WHERE id =?";
        $statement = $db->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    function editComment($id,$editComment)
    {
        $db = $this->dbConnect();
        $sql = "UPDATE comments SET content = ? WHERE id=? ";
        $statement = $db->prepare($sql);
        try {
            if(empty($editComment))
            {
                throw new Exception("編輯留言不可為空");
            }
            else
            {
                $statement->execute([$editComment,$id]);
                $return = [
                    "event" => "編輯留言成功",
                    "status" => "success",
                    "content" => "已編輯留言",
                ];
                return $return;
            }
        }
        catch(Exception $e)
        {
            $return = [
                "event" => "編輯留言失敗",
                "status" => "error",
                "content" => "編輯留言失敗，" .$e->getMessage(),
            ];
            return $return;
        }
        
    }
    /**
     * 新增留言
     * 第一階段練習完成
     * 1. 驗證輸入欄位皆有輸入
     * 2. 先能夠直接新增留言
     * 第二階段練習完成
     * 1. 只有登入後才能新增留言
     *
     */
    /**
     * 取得留言
     * 1. 先能夠直接取得留言
     * 2. 不輸入內容即全部
     * 3. 能夠搜尋關鍵字
     * 4. 能夠搜尋時間範圍
     *    - 起始時間不能在結束時間之後
     *    - 可以不填起始時間，預設為 很久以前
     *    - 可以不填結束時間，預設為現在
     * 5. 3 和 4 條件一起搜尋
     */
    /**
     * 刪除留言
     * 第一階段練習完成
     * 1. 驗證輸入欄位皆有輸入
     * 2. 先能夠直接刪除留言
     * 第二階段練習完成
     * 1. 只有登入後才能刪除留言
     * 2. 只有本人才可以刪除留言
     */
    /**
     * 修改留言
     * 第一階段練習完成
     * 1. 驗證輸入欄位皆有輸入
     * 2. 先能夠直接修改留言
     * 3. update_at 時間會變更成更改時的時間
     * 第二階段練習完成
     * 1. 只有登入後才能修改留言
     * 2. 只有本人才可以修改留言
     */
}
