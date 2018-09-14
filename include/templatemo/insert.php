<?php
#print_r($_POST);
//include "db.php";

//echo $_POST['fname'];
//echo "<br>";

//echo $_POST['password'];
//echo $sss="adssad";

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$password = $_POST['password'];
	$sql= "INSERT INTO customer set fname='$fname', lname='$lname', uname='$uname', password_cust='$password'"; // insert data arahan sql ke dalam table
	#mysql_query($sql);
	//$result = mysql_query($sql);
	//header("Location : profile.php");
	//echo $db;
	?>
    <script language="javascript">
	alert("Pendaftaran Berjaya. Sila log masuk menggunakan username dan password yang telah didaftarkan.");
	
	//window.location.replace("http://localhost/eKST/index.php");
	
	</script>
   <a href="http://localhost/eKST/index.php">Login</a> 
  	<?php
   // header( "refresh:0.5;url=http://localhost/eKST/index.html" );	
   
   
	?>