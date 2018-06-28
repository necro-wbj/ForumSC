<?php
require 'connect_database.php';
$data = json_decode(file_get_contents('php://input'));
$stmt = $db->prepare('select * from message where topic_id=?');
$stmt->execute([$data->{"tid"}]);
$data = array();
while ($row = $stmt->fetch()) {
	//小心,此處的=號是把右邊的值存往左側
	$data[] = (object) [
		'mid' => $row['message_id'],
		'msg' => $row['message'],
		'name' => $row['name'],
		'tid' => $row['topic_id'],
	];
}
http_response_code(200);
header("Content-Type: application/json;charset=UTF-8");
echo json_encode($data);