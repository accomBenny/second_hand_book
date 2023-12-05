<?php

use App\Model\Comment;
require '../../../vendor/autoload.php';

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Allow-Headers: Content-Type");

$Comment = new Comment();
var_dump($_POST);
isset($_POST['id']) ? $id = $_POST['id'] : $id = '';
$return = $Comment->deleteComment($id);

header('Content-Type: application/json');
echo json_encode($return);