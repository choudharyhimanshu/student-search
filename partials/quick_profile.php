<?php
	
	if(isset($_GET['username'])){
		$username = $_GET['username'];
	}
	else{
		die('Invalid Username');
	}

	$data = file_get_contents('../data/data.txt');
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

	if($flag){
		?>
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
					<a target="_blank" href="http://home.iitk.ac.in/~<?php echo $student[0];?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
					  Visit Homepage
					</a>
					<a target="_blank" href="https://www.facebook.com/public?query=<?php echo $student[1]; ?>&ed=IIT%20Kanpur" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
					  Search on FB
					</a>
				</div>
			</div>
		<?php
	}
	else {
		echo "Username not found.";
	}
?>