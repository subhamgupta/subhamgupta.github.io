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
			$username="adminAhwR2PQ";	
			$password="SZQijmUftmln";
			$server = "127.5.212.130:3306";
			$database="praneeth";
			$connect = mysqli_connect($server,$username,$password,$database);
			
			if(!connect){
				echo "Connection failed";
			}
			//$db=mysqli_select_db("praneeth",$connect);
			$mail=$_POST['mail'];
			$pwd=$_POST['pwd'];								
			$sqlQuery = "SELECT * FROM `praneeth`.customers WHERE mail='$mail' AND password= '$pwd'";
			$sql = mysqli_query($connect,$sqlQuery);
			$rows=mysqli_num_rows($sql);
			if($rows > 0){
				echo "Login succesful";
				$_SESSION['name']=$mail;
				header('Refresh:2 ;url=http://praneeth-tkart.rhcloud.com/Sk.php');
			}
			else{
				echo "Login fail";
			
			header('Refresh:3 ;url=login.html');
			}
			mysqli_close($connect);
			
		}
	?>
</body>
</html>