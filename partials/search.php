<div class="mdl-grid">
	<?php
		error_reporting(E_ALL);
	    ini_set('display_errors', 1);

		$LIMIT = 200;
		$count = 0;

	    $params = array(
	        'query' => $_GET['query'],
	        'gender' => $_GET['gender'],
	        'batch' => $_GET['batch'],
	        'hall' => $_GET['hall'],
	        'degree' => $_GET['degree'],
	        'dept' => $_GET['dept'],
	        'blood' => str_replace('%2B','+',$_GET['blood'])
	    );

	    $data = file_get_contents('data/data.txt');
	    $data = explode("%%", $data);
	    $size = sizeof($data);

	    $mail_list = '';

	    for($i=0;$i<$size-1;$i++){
	    	if($count >= $LIMIT){
	            break;
	        }
	        $student = explode('$$',$data[$i]);
	        if ($params['query'] != '') {
				if((stripos($student[1], $params['query']) === false) && (stripos($student[0], $params['query']) === false) && (stripos($student[5], $params['query']) === false) && (stripos($student[6], $params['query']) === false)){
	                continue;
	            }
			}
	        if ($params['gender'] != 'all') {
				if($student[2] != $params['gender']){
	                continue;
	            }
			}
	        if ($params['batch'] != 'all') {
				if (strpos(substr($student[5], 0 ,2), $params['batch']) === false) {
					continue;
				}
			}
	        if ($params['hall'] != 'all') {
				if(stripos($student[8], $params['hall']) === false){
	                continue;
	            }
			}
	        if ($params['degree'] != 'all') {
				if(stripos($student[3], $params['degree']) === false){
	                continue;
	            }
			}
	        if ($params['dept'] != 'all') {
				if(stripos($student[4], $params['dept']) === false){
	                continue;
	            }
			}
	        if ($params['blood'] != 'all') {
				if(stripos($student[7], $params['blood']) === false){
	                continue;
	            }
			}
			?>

		<div class="mdl-cell mdl-cell--4-col">
			<div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: ;">
			  <div class="mdl-card__title mdl-card--expand"></div>
			  <div class="mdl-card__actions" onclick="quickView('<?php echo $student[0];?>')">
			    <span class="demo-card-image__filename"><?php echo $student[1];?></span>
			  </div>
			  <div class="mdl-card__menu">
			    <a href="profile.php?username=<?php echo $student[0];?>" target="_blank" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
			      <i class="material-icons">open_in_new</i>
			    </a>
			  </div>
			</div>
		</div>
			<?php
			$mail_list .= $student[0].'@iitk.ac.in; ';
			$count++;
	    }
	?>


	<div class="mdl-cell mdl-cell--12-col">
		<div class="mdl-card mdl-shadow--2dp" style="width:100%;">
			<div class="mdl-card__supporting-text">
				<p>Total Results : <?php echo $count; ?></p>
				<p><?php echo $mail_list; ?></p>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	  document.getElementById('query').value = "<?php echo $_GET['query'];?>";
	  document.getElementById('gender').value = "<?php echo $_GET['gender'];?>";
	  document.getElementById('batch').value = "<?php echo $_GET['batch'];?>";
	  document.getElementById('hall').value = "<?php echo $_GET['hall'];?>";
	  document.getElementById('degree').value = "<?php echo $_GET['degree'];?>";
	  document.getElementById('dept').value = "<?php echo $_GET['dept'];?>";
	  document.getElementById('blood').value = "<?php echo $_GET['blood'];?>";
</script>

<!-- url('http://himanshuchoudhary.com/sites/student-search-photo/photos/<?php echo $student[0];?>.jpg'), url('http://oa.cc.iitk.ac.in:8181/Oa/Jsp/Photo/<?php echo $student[5];?>_0.jpg')-->