<?php
    $params = json_decode(file_get_contents('php://input'), true);

    $data = file_get_contents(dirname(dirname(__FILE__)).'/data/student_data.json');
    $data = json_decode($data,true);

    $result = array();
    $result['data'] = NULL;

    foreach ($data as $student) {
        if($student['username'] == $params['username']){
            $result['data'] = $student;
            break;
        }
    }

    echo json_encode($result);
?>