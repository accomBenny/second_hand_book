<?php

use App\Model\User;
//var_dump($_POST);
require '../../../vendor/autoload.php';

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Allow-Headers: Content-Type");

$user = new User();
isset($_POST['account']) ? $account = trim($_POST['account']) : $account = '';
isset($_POST['password']) ? $password = trim($_POST['password']) : $password = '';
$return = $user->loginUser($account,$password);
header('Content-Type: application/json');
echo json_encode($return);