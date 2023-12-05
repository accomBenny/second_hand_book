<?php

use App\Model\User;
require '../../../vendor/autoload.php';

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Allow-Headers: Content-Type");

$user = new User();
isset($_POST['email']) ? $email = trim($_POST['email']) : $email = '';
isset($_POST['account']) ? $account = trim($_POST['account']) : $account = '';
isset($_POST['password']) ? $password = trim($_POST['password']) : $password = '';
isset($_POST['password_check']) ? $password_check = trim($_POST['password_check']) :$password_check = '';
$return = $user->registerUser($email,$account,$password,$password_check);
header('Content-Type: application/json');
echo json_encode($return);
