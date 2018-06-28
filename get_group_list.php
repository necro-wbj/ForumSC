<?php
require 'connect_database.php';
$stmt = $db->prepare('select * from group_list');
$stmt->execute();
$data = array();
while ($row = $stmt->fetch()) {
	//小心,此處的=號是把右邊的值存往左側
	$data[] = (object) [
		'gid' => $row['group_id'],
		'gname' => $row['name'],
	];
}
http_response_code(200);
header("Content-Type: application/json;charset=UTF-8");
echo json_encode($data);