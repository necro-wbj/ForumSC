<?php
require 'connect_database.php';
$data = json_decode(file_get_contents('php://input'));
$stmt = $db->prepare('insert into topic(group_id,name) values(?,?)');
$stmt->execute([$data->{'id'}, $data->{'name'}]);
http_response_code(201);
header("Content-Type: application/json;charset=UTF-8");
echo json_encode($data);