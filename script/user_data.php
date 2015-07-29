<?php

    include 'JSON.php';
    $json = new Services_JSON();

    $params = array(
        'username' => $_GET['username']
    );

    $data = file_get_contents(dirname(dirname(__FILE__)).'/data/student_data.bin');
    $data = unserialize($data);

    $result = array();
    $result['data'] = NULL;

    foreach ($data as $student) {
        if($student['username'] == $params['username']){
            $result['data'] = $student;
            break;
        }
    }

    echo $json->encode($result);
?>
