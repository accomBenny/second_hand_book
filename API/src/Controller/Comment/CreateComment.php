<?php

use App\Model\Comment;
require '../../../vendor/autoload.php';

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Allow-Headers: Content-Type");

$Comment = new Comment();
isset($_POST['text']) ? $comment = $_POST['text'] : $comment = '';
$return = $Comment->createComment($comment);

header('Content-Type: application/json');
echo json_encode($return);


