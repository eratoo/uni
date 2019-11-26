<?php header("content-type: text/html;charset=iso-8859-7") ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<title>Columbus travel | Ταξίδια | Διακοπές | Εκδρομές</title>
<style>

button[type=submit] {float:right;}
input[type=date] {width:238px}

table.form, table.form tr, table.form td {
border:0px;
background-color:transparent;}
table{align:center;}

 form {
 margin:0px auto;
width: 500px;
    min-width: 0;
    max-width: none;
 background-color:#B6D2C9;
          padding: 15px;
          border: 1px solid #CCC;
          border-radius: 0.5em;
		 align:center;}
 
 fieldset{width: auto;
    min-width: 0;
    max-width: none;}
	
	
select{
width:243px}

 </style>
  <link rel="stylesheet" type="text/css" href="style.css" >
 </head>
 
 <body>

  <a name="top"></a>

 <div class="page">  <!--               U S E R                 -->
<br><div>  
<?php
if(!isset($_SESSION['name']) && empty($_SESSION['name']))
{
	session_destroy();
	echo "<div class='login'><h5><a href='register.php#reg'>Σύνδεση/Εγγραφή  </a></h5></div>";
	
}
else 
{
	$user = $_SESSION['name'];
	echo "<div class ='login'> <h5>Γειά σου,<a href='profile.php'  title='Το προφίλ μου' >  $user </a> | <a href='logout.php'>Αποσύνδεση</a></h5></div>";
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
	  <div class="text">Βερολίνο</div>
	</div>
	<div class="mySlides">
	  <img src="morocco.jpg" style="width:100%">
	  <div class="text">Μαρόκο</div>
	</div>
	<div class="mySlides">
	  <img src="ny.jpg" style="width:100%">
	  <div class="text">Νέα Υόρκη</div>
	</div>
	<div class="mySlides">
	  <img src="pig.jpg" style="width:100%">
	  <div class="text">Μπαχάμες</div>
	</div>
	<div class="mySlides">
	  <img src="milan.jpg" style="width:100%">
	  <div class="text">Μιλάνο</div>
	</div>
	<div class="mySlides">
	  <img src="london.jpg" style="width:100%">
	  <div class="text">Λονδίνο</div>
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
 <tr><td><a href="index.php">Αρχική σελίδα</a></td><td><a href="trips.php">Προορισμοί</a></td>

 <td><a href="http://localhost/columbustravel/tickets.php"> Εισιτήρια</a></td><td style="border:none;"><a href="contact.php">Επικοινωνία</a></td>
 </table>
<!--               /m a i n    m e n u                 --> 
 </div>
 <br><br>
 <div class="row">
 <div class="column left">
 <!--               c o n t e n t                 -->
 <br><br><br>
 
 <!--               p h p                 -->
<?php
if(isset($_POST['enter'])){
	$uname =  $_POST['username'];
	$pass =  $_POST['password'];
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "columbus travel";
	// Δημιουργία σύνδεσης
	$conn1 = mysqli_connect($servername, $username, $password, $dbname);
	// Έλεγχος σύνδεσης
	if (!$conn1) {
	 die("Κάτι πήγε λάθος. Η σύνδεση απέτυχε!" . mysqli_connect_error());
	}
	mysqli_set_charset($conn1, "utf8");

	$sql = "SELECT * FROM users WHERE username = '$uname' AND password='$pass'";
	if($result = mysqli_query($conn1, $sql)){
	
	if (mysqli_num_rows($result) > 0) 
	{
		$row = mysqli_fetch_assoc($result);
		
		$user = $row['username'];
		$email = $row['email'];
		$name = $row['name'];
		$surname = $row['surname'];
		$address = $row['address'];
		session_start();
		$_SESSION['name'] = $name;
		$_SESSION['surname'] = $surname;
		$_SESSION['email'] = $email;
		$_SESSION['user'] = $user;
		$_SESSION['address'] = $address;
		header('Location: http://localhost/columbustravel/profile.php');
		
	}
	else 
	{
		echo '<script language="javascript">';
		echo 'alert("Ο χρήστης δεν βρέθηκε!")';
		echo '</script>';
	}}
	
	mysqli_close($conn1);
}	
	
?>
<!--               /p h p                 -->
 
 <a name="in"></a>
<!--               f o r m                 -->
<form method="post" action=""  name="loginform"><fieldset>
<h3 align="center"> Είσοδος </h3>
<table class="form">


<tr><td>&nbsp </td></tr>
<tr>
  <td><label for="username">Όνομα χρήστη</label></td>
  <td><input type="text" id="username" name="username" size="30" required></td>

  </tr>

  
  <tr>
  <td><label for="password">Κωδικός πρόσβασης</label></td>
  <td><input type="password" id="password" name="password" size="30" required></td>

  </tr>








<tr><td>&nbsp </td></tr><tr><td>&nbsp </td></tr>
<tr>
 <td><input type="reset" name="reset" value="Καθαρισμός" style="float:left"></td> 
 <td><input type="submit" name="enter" value="Είσοδος" style="float:right"></td>
 </tr>
</table>
</fieldset>
</form> <br><br><br>
<!--               /f o r m                 --> 


 <!--               /c o n t e n t                 -->
 </div>
<!--               s i d e b a r                 -->
<br><br><br><div class="column right">   
<p><ul>
<li><a href="berlin.php"><img src="sidebar\ber.jpg" class="sidebarpics"><br>Βερολίνο</a></li><br>
<li><a href="morocco.php"><img src="sidebar\mor.jpg" class="sidebarpics"><br> Μαρόκο</a></li><br>
<li><a href="newyork.php"><img src="sidebar\nyo.jpg" class="sidebarpics"><br>Νέα Υόρκη</a></li><br>
<li><a href="bahamas.php"><img src="sidebar\bah.jpg" class="sidebarpics"><br>Μπαχάμες</a></li><br>
<li><a href="milan.php"><img src="sidebar\mil.jpg" class="sidebarpics"><br>Μιλάνο</a></li><br>
<li><a href="london.php"><img src="sidebar\lon.jpg" class="sidebarpics"><br> Λονδίνο</a></li>
</ul></p><br></div>
  <!--               /s i d e b a r                 -->
 </div>

 <br><br><br> 
 </div>
<div class="footer">
 <p style="text-align:right;">Copyright © 2017-2018 Erato Papaioannou | Π11122</p>
</div>
 </body>
</html>