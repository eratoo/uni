<?php header("content-type: text/html;charset=iso-8859-7") ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<title>Columbus travel | ������� | �������� | ��������</title>
<style>

 b {color:#4C80BC}
.im 
{
	width:200px;
	float:left;
	padding-right:15px;
}



 </style>
  <link rel="stylesheet" type="text/css" href="style.css" >
 </head>
 
 <body>

  <a name="top"></a>

 <div class="page">
 
  <!--               U S E R                 -->
<br><div>  
<?php
if(!isset($_SESSION['name']) && empty($_SESSION['name']))
{
	session_destroy();
	echo "<div class='login'><h5><a href='register.php#reg'>�������/�������  </a></h5></div>";
	
}
else 
{
		$mail = $_SESSION['email'];
	$user = $_SESSION['name'];
	echo "<div class ='login'> <h5>���� ���,<a href='profile.php' title='�� ������ ���' >  $user </a> | <a href='logout.php'>����������</a></h5></div>";
}
?>
 <!--               /U S E R                 --></div>
 <div>
 <h1>Columbus Travel</h1> 
</div>


 <!--               s l i d e s h o w                 (928,344)-->
<div class="slideshow-container">
	<div class="mySlides">
	  <img src="berlin.jpg" style="width:100%">
	  <div class="text">��������</div>
	</div>
	<div class="mySlides">
	  <img src="morocco.jpg" style="width:100%">
	  <div class="text">������</div>
	</div>
	<div class="mySlides">
	  <img src="ny.jpg" style="width:100%">
	  <div class="text">��� �����</div>
	</div>
	<div class="mySlides">
	  <img src="pig.jpg" style="width:100%">
	  <div class="text">��������</div>
	</div>
	<div class="mySlides">
	  <img src="milan.jpg" style="width:100%">
	  <div class="text">������</div>
	</div>
	<div class="mySlides">
	  <img src="london.jpg" style="width:100%">
	  <div class="text">�������</div>
	</div>

	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>

<script>
var slideIndex = 1;

showSlides(slideIndex);

window.setInterval(slide,3000);


function slide()
{
	showSlides(slideIndex);
	slideIndex += 1;	  
}
function showSlides(n) 
{
  var i;
  var slides = document.getElementsByClassName("mySlides");
  
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }  
  slides[slideIndex-1].style.display = "block"; 
  
}
function plusSlides(n) {
  showSlides(slideIndex += n);
  
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

</script>
<!--               /s l i d e s h o w                 -->



<div>
<!--               m a i n    m e n u                 -->
<table id="menu">
 <tr><td><a href="index.php">������ ������</a></td><td><a href="trips.php">����������</a></td>

 <td><a href="http://localhost/columbustravel/tickets.php"> ���������</a></td><td style="border:none;"><a href="contact.php">�����������</a></td>
 </table>
<!--               /m a i n    m e n u                 --> 
 </div>
 <br><br>
 <div class="row">
 <div class="column left">
 <!--               c o n t e n t                 -->


 <?php
	$trip =  $_POST["trip"];
	$checkin =  $_POST["checkin"];
	$checkout =  $_POST["checkout"];
	$tickets =  $_POST["tickets"];
	$tickets= intval($tickets);
	if($trip == "Berlin") $cost = $tickets * 300 ;	
	else if($trip == "Morocco") $cost = $tickets * 400 ;	
	else if($trip == "New York") $cost = $tickets * 700 ;	
	else if($trip == "Bahamas") $cost = $tickets * 400 ;	
	else if($trip == "Milan") $cost = $tickets * 50 ;	
	else $cost = $tickets * 90 ;
	
	$cost = 2*$cost;

	
	?>
	<form method="post">
	<div style='padding-left:60px;'>	
	<br><br><br><h2>�������� ��������</h2><br>
	<table style='float:left'><tr><td>����������:<?php echo $trip?> </td></tr>
	<tr><td>���������:<?php echo  $checkin?> </td></tr>
	<tr><td>���������: <?php echo $checkout?> </td></tr>
	<tr><td>������� ���������� �� ���������:<?php echo  $tickets ?></td></tr>
	<tr><td>&nbsp </td></tr><tr><td>�������� ������:<?php echo  $cost ?>����</td></tr><tr><td>&nbsp </td></tr><tr><td>&nbsp </td></tr>
	<input type='hidden' name='trip' value='<?php echo $trip?>'><input type='hidden' name='checkin' value='<?php echo $checkin?>'><input type='hidden' name='checkout' value='<?php echo $checkout?>'><input type='hidden' name='tickets' value='<?php echo $tickets?>'>
	<tr><td><input type='submit' name='cancel' value = '�������'>    &nbsp &nbsp <input type='submit' name='ok' value = '��������'></td></tr></table> </div></form>
	


<?php
if(isset($_POST["ok"])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "columbus travel";
	// ���������� ��������
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// ������� ��������
	if (!$conn) {
	 die("���� ���� �����. � ������� �������!" . mysqli_connect_error());
	}
	mysqli_set_charset($conn, "utf8");

	$sql = "INSERT INTO reservations (destination, departure, arrival, tickets, email) VALUES ('$trip', '$checkin','$checkout', '$tickets', '$mail')";
	
					
	if(mysqli_query($conn, $sql))
	{
		echo '<script language="javascript">';
		echo 'window.location.href="tickets.php";alert("� ������� ��� ���������������� �� ��������!");';
		echo '</script>';
	}
	else 
	{
		echo '<script language="javascript">';
		echo 'alert("����� ������ �����!� ������� ��� ��� ����������������!")';
		echo '</script>';
	}
	mysqli_close($conn);
	
}
if (isset($_POST["cancel"]))
{
	echo '<script language="javascript">';
	echo 'window.location.href="tickets.php";alert("� ������� ��� ���������!");';
	echo '</script>';
}

?>
 

 <!--               /c o n t e n t                 -->
 </div>
<!--               s i d e b a r                 -->
<br><br><br><div class="column right">   
<p><ul>
<li><a href="berlin.php"><img src="sidebar\ber.jpg" class="sidebarpics"><br>��������</a></li><br>
<li><a href="morocco.php"><img src="sidebar\mor.jpg" class="sidebarpics"><br> ������</a></li><br>
<li><a href="newyork.php"><img src="sidebar\nyo.jpg" class="sidebarpics"><br>��� �����</a></li><br>
<li><a href="bahamas.php"><img src="sidebar\bah.jpg" class="sidebarpics"><br>��������</a></li><br>
<li><a href="milan.php"><img src="sidebar\mil.jpg" class="sidebarpics"><br>������</a></li><br>
<li><a href="london.php"><img src="sidebar\lon.jpg" class="sidebarpics"><br> �������</a></li>
</ul></p><br></div>
  <!--               /s i d e b a r                 -->
 </div>

 <br><br><br> 
 </div>
<div class="footer">
 <p style="text-align:right;">Copyright � 2017-2018 Erato Papaioannou | �11122</p>
</div>
 </body>
</html>