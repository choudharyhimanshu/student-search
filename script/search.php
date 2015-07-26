<?php
    $params = json_decode(file_get_contents('php://input'), true);

    $data = file_get_contents(dirname(dirname(__FILE__)).'/data/student_data.json');
    $data = json_decode($data,true);

    $result = array();

    foreach ($data as $student) {
        if ($params['name'] != '') {
			if(stripos(str_replace('  ', ' ', $student['name']), $params['name']) === false){
                continue;
            }
		}
        if ($params['username'] != '') {
			if(stripos($student['username'], $params['username']) === false){
                continue;
            }
		}
        if ($params['roll_no'] != '') {
			if($student['roll_no'] != $params['roll_no']){
                continue;
            }
		}
        if ($params['address'] != '') {
			if(stripos($student['address'], $params['address']) === false){
                continue;
            }
		}
        if ($params['gender'] != 'all') {
			if($student['gender'] != $params['gender']){
                continue;
            }
		}
        if ($params['batch'] != 'all') {
			if (strpos(substr($student['roll_no'], 0 ,2), $params['batch']) === false) {
				continue;
			}
		}
        if ($params['hall'] != 'all') {
			if(stripos($student['hostel'], $params['hall']) === false){
                continue;
            }
		}
        if ($params['program'] != 'all') {
			if(stripos($student['program'], $params['program']) === false){
                continue;
            }
		}
        if ($params['department'] != 'all') {
			if(stripos($student['department'], $params['department']) === false){
                continue;
            }
		}
        if ($params['blood'] != 'all') {
			if(stripos($student['blood'], $params['blood']) === false){
                continue;
            }
		}
        $result[] = $student;
    }

    echo json_encode($result);
?>
