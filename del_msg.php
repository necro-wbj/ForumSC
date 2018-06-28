<?php
require 'connect_database.php';
$data = json_decode(file_get_contents('php://input'));
$stmt = $db->prepare('delete from message where message_id=?');
$stmt->execute([$data->{'id'}]);
http_response_code(200);
header("Content-Type: application/json;charset=UTF-8");
echo json_encode($data);