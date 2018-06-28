<?php
$id = $_GET['id'];
if (!is_numeric($id)) {
	echo "failed";
	exit;
}
require 'connect_database.php';
//查詢
$stmt = $db->prepare('select * from group_list where group_id=?');
$stmt->execute([$id]);
$data = NULL;
if ($row = $stmt->fetch()) {
	//小心,此處的=號是把右邊的值存往左側
	$data = (object) [
		'name' => $row['name'],
		'id' => $row['group_id'],
	];
} else {
	http_response_code(404);
	echo "no data";
	exit;
}
http_response_code(200);
header("Content-Type: application/json;charset=UTF-8");
echo json_encode($data);