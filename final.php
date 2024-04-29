<?php

	session_start();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
    		$u = preg_replace('/[^a-z]/', '', $_POST['username']);
    		$p = preg_replace('/[^a-zA-Z0-9]/', '', $_POST['password']); 
		$file = fopen("/var/www/html/auth.db", "r") or die("Unable to open file");
		$credentials_matched = false;

    		while (($line = fgets($file)) !== false) 
    		{
        		list($username_from_file, $password_from_file) = explode("\t", trim($line));

        		if ($username_from_file === $u && $password_from_file === $p) 
        		{
            			$credentials_matched = true;
            			break;
        		}
    		}
    		
		fclose($file);
		
    		if ($credentials_matched) 
    		{
        		$_SESSION['loggedin']=1;
			$_SESSION['username'] = $u;
	
    		} 
    		else 
    		{
        		$_SESSION['loggedin']=0;
    		}
	} 
	else 
	{
    		$u = '';
    		$p = '';
	}
	
?>

<?php 

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1 && !isset($_GET['page'])) 
	{ 
	
?>

	<html>

		<head>
		
			<title>CPSC222 Final Exam</title>	
				
		</head>
		
		<body>
		
			<h1>CPSC222 Final Exam</h1>
			<p><b>Welcome, 
			
<?php 

			echo $_SESSION['username'].'! '; ?><a href="final_logout.php">(Log Out)</a></p></b>
			<p>Dashboard:</p>
			<ul><li><a href="?page=1">User list</a>
			<li><a href="?page=2">Group list</a>
			<li><a href="?page=3">Syslog</a></ul>
					 
		</body>
		
		<footer>
		
			<hr>
			
<?php 

	echo "<p>".date('Y-m-d H:i:sA')."</p>"; 
	
?>

		</footer>

<?php 

	}
	if ((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == 0) && (!isset($_GET['page']) || $_SERVER['REQUEST_METHOD'] == 'POST')) 
	{
	
?>

	<html>

		<head>
			<title>CPSC222 Final Exam</title>
		</head>
		<body>
		
			<h1>CPSC222 Final Exam</h1>

			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                	<table>
                		<tr><td>Username:</td><td><center> <input type="text" name="username"></td></tr>
                		<tr><td>Password:</td><td><center> <input type="text" name="password"></td></tr>
				<tr><td><input type="submit" name="submit"  value="Login" /></td>
			</form>
			</table>
		
		</body>
		<footer>
		<hr>
		
<?php 

	echo "<p style='font-family:helvetica'>".date('Y-m-d H:i:s A')."</p>"; 
	
?>
		</footer>

	</html>

<?php 

	} 
	
?>

<?php 

	if(isset($_GET['page']))
	{
	
?>
	
    	<html>

		<head>

			<h1>CPSC222 Final Exam</h1>
		</head>
		
		<body>
			<p><b>Welcome, 
<?php 

			echo $_SESSION['username'].'! '; 
			
?>
			<a href="final_logout.php">(Log Out)</a></p></b>
			<p><a href="final.php">< Back to Dashboard</a></p>

<?php 

	if($_GET['page']>=4)
	{
	
?>

			<p>Invalid page</p>
			</body>
			<footer>
			<hr>
                        	
<?php 

	echo "<p>".date('Y-m-d H:i:s A')."</p>"; 
	
?>

                	</footer>

        	</html>
        
<?php 

	}
	
?>
		
<?php	

	if($_GET['page'] == 1)
	{
	
?>
		<br>
		<p><b>User list</b></p>
		<table border = 1>
        		<tr>
                	<td><center><b>Username</b></td>
                	<td><center><b>Password</b></td>
                	<td><center><b>UID</b></td>
                	<td><center><b>GID</b></td>
                	<td><center><b>Display Name</b></td>
                	<td><center><b>Home Directory</b></td>
			<td><center><b>Default Shell</b></td>            
                	</tr>
		
<?php

        		$file = fopen("/etc/passwd", "r") or die("Unable to open file");
        		while (($line = fgets($file)) !== false) 
        		{
            			$fields = explode(":", $line);
            			$username = $fields[0];
            			$password = $fields[1];
            			$uid = $fields[2];
            			$gid = $fields[3];
            			$displayName = $fields[4];
            			$homeDirectory = $fields[5];
            			$defaultShell = $fields[6];
            			
            			echo "<tr>";
            			echo "<td><center>$username</td>";
           	 		echo "<td><center>$password</td>";
            			echo "<td><center>$uid</td>";
            			echo "<td><center>$gid</td>";
            			echo "<td><center>$displayName</td>";
            			echo "<td><center>$homeDirectory</td>";
            			echo "<td><center>$defaultShell</td>";
            			echo "</tr>";
        		}

       			fclose($file);
       			
?>
    			</table>	
			</body>
			<footer>
                        <hr>
                        
<?php 

	echo "<p>".date('Y-m-d H:i:s A')."</p>"; 
	
?>
                	</footer>

        </html>

<?php 
	
	} 
	
?>

<?php 

	if($_GET['page'] == 2)
	{
	
?>

                        <br>
                        <p><b>Group list</b></p>
                        <table border = 1>
                        	<tr>
        	        	<td><center><b>Group Name</b></td>
                		<td><center><b>Password</b></td>
                		<td><center><b>GID</b></td>
                		<td><center><b>Members</b></td>
				</tr>
			
<?php

        	$file = fopen("/etc/group", "r") or die("Unable to open file");
        	while (($line = fgets($file)) !== false) 
        	{
            		$fields = explode(":", $line);
            		$group = $fields[0];
            		$password = $fields[1];
            		$gid = $fields[2];
            		$members = $fields[3];

          		echo "<tr>";
            		echo "<td><center>$group</td>";
           	 	echo "<td><center>$password</td>";
            		echo "<td><center>$gid</td>";
            		echo "<td><center>$members</td>";
            		echo "</tr>";
        	}

        	fclose($file);
        	
?>
        
    				</table>	
				</body>	
				<footer>
                        	<hr>
                        	
<?php

	echo "<p>".date('Y-m-d H:i:s A')."</p>"; 
	
?>
                		</footer>

			</html>

<?php 

	}

?>

<?php 

	if ($_GET['page'] == 3) { 
	
?>

    			<br>
    			<p><b>Syslog</b></p>
    			<table border="1">
        		<tr>
            		<td><center><b>Date</b></td>
            		<td><center><b>Hostname</b></td>
            		<td><center><b>Application[PID]</b></td>
            		<td><center><b>Message</b></td>
        		</tr>

<?php

        $file = fopen("/var/log/syslog", "r") or die("Unable to open file");
        while (($line = fgets($file)) !== false) 
        {
        	preg_match('/^(\S+\s+\d+\s+\d+:\d+:\d+)\s+([\w.-]+)\s+([^[]+)\s+(\[[^\]]+\])\s+(.*)$/', $line, $matches);
        	if (count($matches) < 6) 
        	{
            		continue; // Skip lines that don't match the pattern
        	}	
        	$date = trim($matches[1]);
        	$hostname = trim($matches[2]);
        	$application = trim($matches[3], ':');
        	$message = trim($matches[5]);

           	echo "<tr>";
            	echo "<td><center>$date</td>";
            	echo "<td><center>$hostname</td>";
            	echo "<td><center>$application</td>";
            	echo "<td><center>$message</td>";
            	echo "</tr>";
        }

        fclose($file);
        
?>

	</table>
    	</body>
	<footer>
        <hr>
        
<?php 

	echo "<p>" . date('Y-m-d H:i:s A') . "</p>"; ?>
    	</footer>
    	</html>
    	
<?php 
	}

	} 

?>
