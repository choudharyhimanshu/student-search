<?php

    $LIMIT = 300;

    $params = json_decode(file_get_contents('php://input'), true);

    $params = array(
        'name' => $_GET['name'],
        'username' => $_GET['username'],
        'roll_no' => $_GET['roll_no'],
        'address' => $_GET['address'],
        'gender' => $_GET['gender'],
        'batch' => $_GET['batch'],
        'hall' => $_GET['hall'],
        'program' => $_GET['program'],
        'department' => $_GET['department'],
        'blood' => $_GET['blood']
    );

    $data = file_get_contents(dirname(dirname(__FILE__)).'/data/student_data.json');
    $data = json_decode($data,true);

    $result = array();

    foreach ($data as $student) {
        if(sizeof($result['data']) >= $LIMIT){
            break;
        }
        if ($params['name'] != 'null') {
			if(stripos(str_replace('  ', ' ', $student['name']), $params['name']) === false){
                continue;
            }
		}
        if ($params['username'] != 'null') {
			if(stripos($student['username'], $params['username']) === false){
                continue;
            }
		}
        if ($params['roll_no'] != 'null') {
			if($student['roll_no'] != $params['roll_no']){
                continue;
            }
		}
        if ($params['address'] != 'null') {
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
        $result['data'][] = $student;
    }

    $result['stats'] = array(
        'total_results' => sizeof($result['data']),
        'query' => $params
    );

    echo json_encode($result);
?>
