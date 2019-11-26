<?php header("content-type: text/html;charset=iso-8859-7") ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<title>Columbus travel | Ταξίδια | Διακοπές | Εκδρομές</title>
<style>
 
input[type=submit] {float:right;}
 
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
	
b {color:#4C80BC}




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
	echo "<div class='login'><h5><a href='register.php#reg'>Σύνδεση/Εγγραφή  </a></h5></div>";
	
}
else 
{
	$user = $_SESSION['name'];
	echo "<div class ='login'> <h5>Γειά σου,<a href='profile.php' title='Το προφίλ μου' >  $user </a> | <a href='logout.php'>Αποσύνδεση</a></h5></div>";
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

 <td><a href="http://localhost/columbustravel/tickets.php"> Εισιτήρια</a></td><td style="border:none;"><a href="contact.php" style="color:#3F61BF">Επικοινωνία</a></td>
 </table>
<!--               /m a i n    m e n u                 --> 
 </div>
 <br><br>
 <div class="row">
 <div class="column left">
 <!--               c o n t e n t                 -->
<br><br><br>

<!--               f o r m                 -->
<form><fieldset>

<h2 align="center">Επικοινωνήστε μαζί μας</h2>
<table class="form"><tr><td>&nbsp </td></tr>
<tr>
 <td>
<b>Columbus Travel</b> Ταξιδιωτικό Πρακτορείο</td></tr><tr><td>&nbsp </td></tr>
<tr><td><b>Διεύθυνση:</b> Μητροπόλεως 26-28, Αθήνα </td></tr><tr>
<td><b>Τηλέφωνα:</b> 2103246590, 2103232923, 2108923756<br> </td></tr>
<td><b>E-mail:</b> columbustragency@gmail.com </td></tr><tr><td>&nbsp </td></tr>
<td><b>Ώρες γραφείου:</b> Δευτέρα, Τετάρτη, Σάββατο: 09:00-17:30 | Τρίτη, Πέμπτη, Παρασκευή: 09:00-21:00</td></tr>

<tr><td>&nbsp </td></tr><tr><td>&nbsp </td></tr>
 <tr><td><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3145.077715680094!2d23.729377814855752!3d37.97531560836994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a1bd3c4ab1729d%3A0xb73215d65e23a6d1!2zzpzOt8-Ez4HOv8-Az4zOu861z4nPgiAyNi0yOCwgzpHOuM6uzr3OsSAxMDUgNjM!5e0!3m2!1sel!2sgr!4v1513874404238" width="440" height="400" frameborder="0" style="border:0" allowfullscreen></iframe></td></tr>

</table>



<hr><br>
Για αποστολή e-mail συμπληρώστε τη φόρμα που ακολουθεί και πατήστε αποστολή<br><br>
<table class="form">
<tr>
 <td> <label for="name">Ονοματεπώνυμο*</label></td>
  <td><input type="text" id="name" name="name" size="30"></td>
  <br>
</tr>
<tr>
  <td><label for="tel">Τηλέφωνο</label></td>
 <td> <input type="text" id="tel" name="tel" size="30"></td>

  </tr>
<tr>
  <td><label for="mail">E-mail*</label></td>
  <td><input type="email" id="mail" name="mail" size="30"></td>

  </tr>
<tr>
  <td valign="top"><label for="msg">Μήνυμα</label></td>
  <td><textarea id="msg" name="msg" placeholder="Πληκτρολογήστε το μήνυμά σας εδώ.."  rows="6" cols="35" ></textarea></td>
  </tr>

<tr><td>&nbsp </td></tr>
<tr>
 <td><input type="reset" value="Καθαρισμός"></td> 
 <td><input type="submit" id="submit" value="Αποστολή"></td>
 </tr>
</table>
</form> 
<!--               /f o r m                 --> 

<!--               js                 --> 
<script>

function check (name,mail,msg)
{
	if (name.length>2 && mail.length>5 && msg.length>5) 
	{
		return true;
	}
	else
	{
		alert("Συμπληρώστε όλα τα απαραίτητα πεδία");
		return false;
	}
}

function submit_button ()
{
	var name = document.getElementById('name').value, 
	tel = document.getElementById('tel').value,
	mail = document.getElementById('mail').value,
	msg = document.getElementById('msg').value;
		
	if(check(name,mail,msg))
	{
		var answer=confirm("Είστε σίγουροι ότι θέλετε να αποστείλετε το παρακάτω e-mail;\n\n Ονοματεπώνυμο*:  " +name+"\nΤηλέφωνο:  "+tel+"\nE-mail*:  "+mail+"\n\nΑίτημα, ερώτημα*:  "+msg)
		if (answer) 
		{
			window.open('mailto:columbustragency@gmail.com?subject=μήνυμα&body=Ονοματεπώνυμο:  ' +name+'%0D%0AΤηλέφωνο:  '+tel+'%0D%0A%0D%0A'+msg);
		}
	} 
	else  event.preventDefault();
}

document.getElementById('submit').onclick=submit_button;

</script>
<!--               /js                 --> 
 
 
 
 
 
 
 </fieldset>
 
  <br><br><br>
 <br><a href="#top" class="top">Back to top</a><br><br><br><br><br><br>

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