<html>
	<head>
		<title>PHP 5.3 and 5.4 deprecated function scanner</title>
		<meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'>
		<script src="js/jquery.js"></script>
		<?php
	
			echo '<script>';
			echo 'var fileList = new Array(';
			$i = 0;
			foreach ($fileList AS $value)
			{
				$i++;
				if ($i>1)
					echo ',';
				echo "'".$value."'";
			}
			echo ');';
			echo '</script>';
		?>
		<script src="js/script.js"></script>
		<link rel='stylesheet' type='text/css' href='css/style.css'>		
	</head>
	<body>
		<h1>PHP 5.3 & 5.4 Deprecated Scanner</h1>
		<div id="ellenorzes">
			Checked: <span id="ittjar"></span>/<span id="ennyibol"></span> file
		</div>
		<div id="progressbar_corner">
			<div id="progressbar"></div>
		</div>
		<div id="error" class="empty">
			
		</div>
		
		<div id="list"></div>
	</body>
</html>