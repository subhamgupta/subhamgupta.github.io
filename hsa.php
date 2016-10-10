<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Entries</title>
</head>
<body>
	<?php
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$username="root";	
			$password="asdf";
			$server = "localhost";
			$dbname= "praneeth";
			$connect = new MySQLi($server,$username,$password,$dbname);
			
			if($connect->connect_errno){
				echo "Connection failed";
			}
			//$db=mysqli_select_db("praneeth",$connect);
			$mail=$_POST['name'];
			$pwd=$_POST['pass'];
			echo $mail;
			echo $pwd;								
			$sqlQuery = "SELECT * FROM `praneeth`.customers WHERE mail='$mail' AND password= '$pwd'";
			$sql = $connect->query($sqlQuery);
			$rows = $sql->num_rows;
			if($rows > 0){
				echo "Login succesful";
				$_SESSION['name']=$mail;
				//header('Refresh:2 ;url=http://praneeth-tkart.rhcloud.com/Sk.php');
			}
			else{
				echo "Login fail";
			
		//	header('Refresh:3 ;url=login.html');
			}
			
		}
	?>
</body>
</html>