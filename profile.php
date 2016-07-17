<?php
	if(isset($_GET['username'])){
		$username = $_GET['username'];
	}
	else{
		die('Invalid Username');
	}

	$data = file_get_contents('data/data.txt');
	$data = explode("%%", $data);
	$size = sizeof($data);

	$flag = false;

	for($i=0;$i<$size-1;$i++){
		$student = explode('$$',$data[$i]);

		if($student[0] == $username){
			$flag = true;
			break;
		}
	}

	if(!$flag){
		die("Username not found.");
	}
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <meta property="og:title" content="<?php echo $student[1]; ?>" />
    <meta property="og:type" content="profile" />
    <meta property="og:image" content="http://himanshuchoudhary.com/sites/student-search-photo/photos/<?php echo $student[0];?>.jpg" />
    <meta property="og:image" content="http://oa.cc.iitk.ac.in:8181/Oa/Jsp/Photo/<?php echo $student[5];?>_0.jpg" />


	<title>Student Search | IITK</title>

	<link rel="stylesheet" href="css/material.indigo-red.min.css" />

	<link rel="stylesheet" href="css/style.css" />

	<link rel="stylesheet" href="fonts/md-icons.css">
	<link href="fonts/font_roboto.css" rel="stylesheet">

    <script src="js/jquery-1.9.1.js"></script>
	<script src="js/material.min.js"></script>

</head>
<body>
	<div class="profile">
		<div class="photo" style="background-image: url('http://himanshuchoudhary.com/sites/student-search-photo/photos/<?php echo $student[0];?>.jpg'), url('http://oa.cc.iitk.ac.in:8181/Oa/Jsp/Photo/<?php echo $student[5];?>_0.jpg')"></div>
		<h4 class="name"><?php echo $student[1]; ?></h4>
		<p><b><?php echo $student[0]; ?>@iitk.ac.in</b></p>
		<p><b><?php echo $student[5]; ?></b></p>
		<p><?php echo $student[3].' '.$student[4]; ?></p>
		<p><?php echo $student[2].' | '.$student[7]; ?></p>
		<p><?php echo $student[8]; ?></p>
		<p><i><?php echo $student[6]; ?></i></p>

		<div>
			<a target="_blank" href="http://home.iitk.ac.in/~<?php echo $student[0];?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
			  Visit Homepage
			</a>
			<a target="_blank" href="https://www.facebook.com/public?query=<?php echo $student[1]; ?>&ed=IIT%20Kanpur" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
			  Search on FB
			</a>
		</div>
	</div>
</body>
</html>