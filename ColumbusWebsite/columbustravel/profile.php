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


#profilepic
{
	  width: 100px;
        height: 100px;
      margin-left:20px;
        background-color: #ccc;     
		border-radius: 50%;
		 box-shadow: 0px 3px 7px ;
		<?php
$filename = 'users/'.$_SESSION["user"].'.jpg';
		if(file_exists($filename)) {$img = $filename;}  else{$img = "default.png";} ?>
		   background:url(<?php echo $img;?>) center no-repeat;
		   background-size:cover;
		  
}



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
	header('Location: http://localhost/columbustravel/index.php');
	
}
else 
{
	$user = $_SESSION['name'];
	$mail = $_SESSION['email'];

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
 <div>
 
 
 <!--               p h p                 -->
 <?php
	$name = $_SESSION["name"];
	$user = $_SESSION["user"];
	$surname = $_SESSION["surname"];
	$address = $_SESSION["address"];

	echo "<div style='padding-left:60px;'>";
	echo "<h2>Το Προφίλ μου</h2><hr><br><br>";
?>
	
<div id='profilepic' style='float:left'> </div>
	<form action='' method='POST' enctype='multipart/form-data' style='all:unset;'>
		<label for='file-input'><img src='edit.png' style='width:20px;padding-top:70px;cursor: pointer;'>
    <input id='file-input' name='file-input' type='file' style='display:none' onchange='this.form.submit()'/>
    </label><input type='submit' style='display:none'/></form>
   <br> <br> <br> 
   <?php
   
   if(isset($_FILES['file-input'])){

	// if(file_exists($_FILES['file-input']['tmp_name']) || is_uploaded_file($_FILES['file-input']['tmp_name'])){
						$file_name = $_FILES['file-input']['name'];
						      $file_tmp =$_FILES['file-input']['tmp_name'];

 move_uploaded_file($file_tmp,"C:/xampp/htdocs/columbustravel/users/".$user.".jpg");
 header('Location: http://localhost/columbustravel/profile.php');
   }
   //}
		
	echo "<h4 style='padding-left:20px;'>Όνομα χρήστη: <a>  $user</a></h4>";
	echo "<h4 style='padding-left:20px;'>Ονοματεπώνυμο:<a> $name $surname</a></h4>";
	echo "<h4 style='padding-left:20px;'>Διεύθυνση:<a> $address</a></h4>";
	echo "<h4 style='padding-left:20px;'>e-mail: <a>$mail</a></h4>";

?> 
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "columbus travel";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
	 die("Κάτι πήγε λάθος. Η σύνδεση απέτυχε!" . mysqli_connect_error());
	}
	mysqli_set_charset($conn, "utf8");

	$sql = "SELECT * FROM reservations WHERE email = '$mail'";
	$result = mysqli_query($conn, $sql);
	echo " <br><br><h2 style='padding-left:20px;'>Κρατήσεις </h2><br>";
	if (mysqli_num_rows($result) > 0) 
	{
		
		echo "<table style='float:left; box-shadow: 0px 3px 7px ;background-color:white' id='tbl' style='width:100%'>";
		echo
		"<tr><th>Προορισμός</th><th>Αφιξη</th><th>Αναχώρηση</th><th>Εισιτήρια</th></tr>";
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo "<tr><td>".$row['destination']."</td>".
			"<td>".$row['departure']."</td>".
			"<td>".$row['arrival']."</td>".
			"<td align='right'>".$row['tickets']."</td>"."</tr>";
		}
		echo "</table>" ;
	} 
	else echo "<h4 style='padding-left:20px;'><a>Δεν έχετε κάποια κράτηση</a></h4>";
		echo "</div> <br><br> <br><br> <br><br>";
	mysqli_close($conn);
?>
<!--               /p h p                 -->
</div>


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