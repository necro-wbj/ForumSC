<?php
require 'connect_database.php';
$data = json_decode(file_get_contents('php://input'));
$stmt = $db->prepare('select * from topic where group_id=?');
$stmt->execute([$data->{"gid"}]);
$data = array();
while ($row = $stmt->fetch()) {
	//小心,此處的=號是把右邊的值存往左側
	$data[] = (object) [
		'tid' => $row['topic_id'],
		'gid' => $row['group_id'],
		'tname' => $row['name'],
	];
}
http_response_code(200);
header("Content-Type: application/json;charset=UTF-8");
echo json_encode($data);