<?php
$data=json_decode(file_get_contents('php://input'));
require 'connect_database.php';
$stmt = $db->prepare('update group_list set name=? where group_id=?');
$stmt->execute([$data->{"name"},$data->{"id"}]);
http_response_code(200);
header("Content-Type: application/json;charset=UTF-8");
echo json_encode($data);