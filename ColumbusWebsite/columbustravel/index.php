<?php header("content-type: text/html;charset=iso-8859-7") ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
 <head>
 
 <title>Columbus travel | Ταξίδια | Διακοπές | Εκδρομές</title>
 
 <style>

 .gallery{width:120px;}
 

 </style>
  <link rel="stylesheet" type="text/css" href="style.css" >
 </head>
 
 <body >

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
	echo "<div class ='login'> <h5>Γειά σου,<a href='profile.php' title='Το προφίλ μου'  >  $user </a> | <a href='logout.php'>Αποσύνδεση</a></h5></div>";
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
 <tr><td><a href="index.php" style="color:#3F61BF">Αρχική σελίδα</a></td><td><a href="trips.php">Προορισμοί</a></td>

 <td><a href="http://localhost/columbustravel/tickets.php"> Εισιτήρια</a></td><td style="border:none;"><a href="contact.php">Επικοινωνία</a></td>
 </table>
<!--               /m a i n    m e n u                 --> 
 </div>
 <br><br>
 <div class="row">
 <div class="column left">
 <!--               c o n t e n t                 -->
 <p><h2>Καλωσήρθατε στην Columbus Travel!</h2><br>
 <h3>Επισκεφθείτε αγαπημένους προορισμούς!</h3>
<a href="morocco.php">
 <img src="morocco1.jpg" style="width:230px" title="Μαρόκο">
</a>
<a href="berlin.php">	
 <img src="berlin1.jpg" style="width:230px" title="Βερολίνο">
</a>
<a href="bahamas.php">
 <img src="bahamas1.jpg" style="width:230px" title="Μπαχάμες">
</a>	 
 <br><br><br><h3>10 συμβουλές για το πρώτο ταξίδι σας στη Νέα Υόρκη!</h3>
 <p>Ο σχεδιασμός του πρώτου ταξιδιού σας στη Νέα Υόρκη μπορεί να είναι δύσκολος. Με τόσα πολλά πράγματα να δει κανείς είναι δύσκολο να ξέρει από πού να αρχίσει. Σε μια πόλη που ισχυρίζεται ότι έχει 90.000 δωμάτια ξενοδοχείων , απλά επιλέγοντας το πού θα μείνετε μπορεί να είναι μια αποθαρρυντική προοπτική από μόνη της . Αν είστε στην πόλη μόνο για λίγες μέρες, εδώ είναι μερικές συμβουλές για να σας βοηθήσουν να αξιοποιήσετε στο έπακρο το ταξίδι σας .</p>
<a href="http://www.aerotickets.gr/top-10-συμβουλές-για-το-πρώτο-ταξίδι-σας-στη/" style="float:right;color:#4C80BC;">Διαβάστε περισσότερα</a>
  <br><br><br><h3>Το Λονδίνο μέσα από 11 εκπληκτικές φωτογραφίες</h3>
<p>Από το περίφημο <strong>Big Ben</strong>, μέχρι τον <strong>καθεδρικό ναό</strong> της αγγλικής πρωτεύουσας και από μια βόλτα στον <strong>Τάμεση</strong> μέχρι το <strong>Βρετανικό Μουσείο</strong>, ο φωτογράφος Nick Jackson μάς ταξιδεύει στα πιο γνωστά αξιοθέατα του Λονδίνου, μέσα από τη δική του ιδιαίτερη ματιά.</p>

<p>Οι δρόμοι, οι πλατείες, τα μουσεία και τα κτίρια-ορόσημο της αγγλικής πρωτεύουσας «ζωντανεύουν» μπροστά στα μάτια μας με τα έντονα χρώματα και την τεχνική που χρησιμοποιεί ο Jackson.</p>

<p>Κι αν δεν έχετε πειστεί ακόμη να κάνετε ένα ταξίδι στο Λονδίνο, αφού δείτε <em>αυτές</em> τις φωτογραφίες μπορεί να αλλάξετε γνώμη.</p>
 <a target="_self" href="london\1.jpg">
  <img src="london\1.jpg" class="gallery">
</a>
 <a target="_self" href="london\2.jpg">
  <img src="london\2.jpg" class="gallery">
</a>
 <a target="_self" href="london\3.jpg">
  <img src="london\3.jpg" class="gallery">
</a>
 <a target="_self" href="london\4.jpg">
  <img src="london\4.jpg" class="gallery">
</a> <a target="_self" href="london\5.jpg">
  <img src="london\5.jpg" class="gallery">
</a>
 <a target="_self" href="london\6.jpg">
  <img src="london\6.jpg" class="gallery">
</a> <a target="_self" href="london\7.jpg">
  <img src="london\7.jpg" class="gallery">
</a>
 <a target="_self" href="london\8.jpg">
  <img src="london\8.jpg" class="gallery">
</a> <a target="_self" href="london\9.jpg">
  <img src="london\9.jpg" class="gallery">
</a>
 <a target="_self" href="london\10.jpg">
  <img src="london\10.jpg" class="gallery">
</a> <a target="_self" href="london\11.jpg">
  <img src="london\11.jpg" class="gallery">
</a>



  <br><br><br><h3>Ένα tour στο Βερολίνο!</h3>
<iframe width="100%" height="480" src="https://www.youtube.com/embed/hVfBQNENS9s" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>






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

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d56578355.9170184!2d17.202675633558304!3d30.057828823488837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sel!2sgr!4v1513715023551" width="100%" height="400" float="left"></iframe>
 </div>

 <br><br><br> 
 </div>
<div class="footer">
 <p style="text-align:right;">Copyright © 2017-2018 Erato Papaioannou | Π11122</p>
</div>
 </body>
</html>