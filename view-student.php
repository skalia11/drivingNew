<?php
/********************************************************** 
 * Project Name: Driving School System
 * Version: 1.0
 * Developer: Saransh Kalia & Emad Zamout
 * Course: CPSC 3660
 **********************************************************/
session_start();
if(!isset($_SESSION['user'])){
header('Location:index.php');
} ?>
  
<?php 
include 'includes/dashboard_header.php';?>
</head>
  <body>

<?php 	
$sin = (isset($_GET['sincard']) ? $_GET['sincard'] : null);
	
	if($sin){
	include 'includes/connect.php';

$sqlget= mysqli_query($dbhandle,"SELECT first_name, balance,address,city,postal,last_name,dl_number,phone_num,date_birth,gender FROM PEOPLE  join student on student.sincard=people.sincard where people.sincard ='$sin'");
$sqlshow=mysqli_fetch_assoc($sqlget);

if($sqlshow['gender']='m' || $sqlshow['gender']='M'){
	$genderF="Male";
}else{
	$genderF="Female";
}

?>

<h1>Student Information </h1>
<hr />

<table  align="center" color="blue" border="4">

	<?php 
echo "<tr><td><h2><font color='red'>Full Name:</h2></td><td><h3>". $sqlshow['first_name']." ". $sqlshow['last_name'].'</h3></td></tr>'; 
echo "<tr><td><h2><font color='red'>Driving License:</h2></td><td><h3>". $sqlshow['dl_number'].'</h3></td></tr>'; 
echo "<tr><td><h2><font color='red'>Gender:</h2></td><td><h3>". $genderF.'</h3></td></tr>'; 
echo "<tr><td><h2><font color='red'>Date of Birth:</h2></td><td><h3>". date("F j, Y",strtotime($sqlshow['date_birth'])).'</h3></td></tr>'; 
echo "<tr><td><h2><font color='red'>Phone No#:</h2></td><td><h3>". $sqlshow['phone_num'].'</h3></td></tr>'; 
echo "<tr><td><h2><font color='red'>Address:</h2></td><td><h3>". $sqlshow['address'].'</h3></td></tr>'; 
echo "<tr><td><h2><font color='red'>City:</h2></td><td><h3>". $sqlshow['city'].'</h3></td></tr>'; 
echo "<tr><td><h2><font color='red'>Postal Code:</h2></td><td><h3>". $sqlshow['postal'].'</h3></td></tr>'; 
echo "<tr><td><h2><font color='red'>Balance:</h2></td><td><h2>$". number_format($sqlshow['balance'],2).'</h2></td></tr>'; 


?>
</table>
<hr />
<button id="close-nicemodal" class="btn">Close</button>
<?php }
else{
	header('Location:error/index.php');
}

?>
<div>
<br /></div>
</body>
	</html>