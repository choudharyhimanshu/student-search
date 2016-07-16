<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 1);

	$data = file_get_contents('data/data.json');
	$data = json_decode($data,True);

	for ($i=0; $i<sizeof($data); $i++) {
		$user = $data[$i];
		$str = $user['username'].'$$'.$user['name'].'$$'.$user['gender'].'$$'.$user['program'].'$$'.$user['department'].'$$'.$user['roll_no'].'$$'.$user['address'].'$$'.$user['blood'].'$$'.$user['hostel']."%%";
		file_put_contents('data/data.txt', $str, FILE_APPEND);
	}
	echo "Done";
?>