<?

// pseudodyn -  a primitive alternative to third-party dynamic DNS services

include 'include_config.php';

if (in_array($user, $alloweduser)) 
{
	$ip = $_SERVER['REMOTE_ADDR'];
	$time = date('Y-m-d H:i:s');
	$check_last_ip = file($datafolder."$user.txt");
	$last_ip = $check_last_ip[1];
	$trim_last_ip = trim($last_ip);
	if (!empty($_SERVER['HTTPS'])) {
	    $protocol = "HTTPS";
	}
	else
	{
		$protocol = "HTTP";
	}
	if ($trim_last_ip == $ip)
	{
		exit;
	}
	file_put_contents($datafolder.$filename, "$user" . PHP_EOL);
	file_put_contents($datafolder.$filename, "$ip" . PHP_EOL, FILE_APPEND);
	file_put_contents($datafolder.$filename, "$time" . PHP_EOL, FILE_APPEND);
	file_put_contents($datafolder.$filename, "$protocol" . PHP_EOL, FILE_APPEND);
	if (in_array($user, $loggeduser)) 
	{
		file_put_contents($datafolder.$logfilename, "$ip" . PHP_EOL, FILE_APPEND);
		file_put_contents($datafolder.$logfilename, "$time" . PHP_EOL, FILE_APPEND);
		file_put_contents($datafolder.$logfilename, "----------" . PHP_EOL, FILE_APPEND);
	}
	exit;
}

switch ($user)
	{
		case 'chief':
		if (empty($_SERVER['HTTPS'])) 
			{
		    	exit;
			}
			echo "<html>";
			echo "<head>";
			echo "<style>";
			echo "table, th, td {border: 1px solid black;border-collapse: collapse;}";
			echo "th, td {padding: 5px;";
			echo "th {text-align: left;}";
			echo "</style>";
			echo "</head>";
			echo "<body>";
			echo "<table>";
			echo "<tr>";
			echo "<th>Name</th>";
			echo "<th>IP</th>";
			echo "<th>Last Update</th>";
			echo "<th>Protocol</th>";
			echo "</tr>";
			$countalloweduser = count($alloweduser);
			for ($x = 0; $x < $countalloweduser; $x++)
			{
				echo "<tr>";
				$read_filename = file_get_contents ($datafolder."$alloweduser[$x].txt");
				$convert = explode ("\n", $read_filename);
				for ($i = 0; $i < count($convert); $i++)  
					{
						echo "<td>";
						echo "$convert[$i]";
						echo "</td>";
					}
				echo "</tr>";
			}	
			echo "</table>";
			echo "</bodyl>";
			echo "</html>";
			break;
		
		default;
			echo "I'm sorry, Dave, I'm afraid I can't do that.";
			break;
	}

?>