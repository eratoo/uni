<?php header("content-type: text/html;charset=iso-8859-7") ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<title>Columbus travel | Ταξίδια | Διακοπές | Εκδρομές</title>
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
 <tr><td><a href="index.php">Αρχική σελίδα</a></td><td><a href="trips.php" style="color:#3F61BF">Προορισμοί</a></td>

 <td><a href="http://localhost/columbustravel/tickets.php"> Εισιτήρια</a></td><td style="border:none;"><a href="contact.php">Επικοινωνία</a></td>
 </table>
<!--               /m a i n    m e n u                 --> 
 </div>
 <br><br>
 <div class="row">
 <div class="column left">
 <!--               c o n t e n t                 -->

 <div  style="padding:60px 0px 0px 60px;">
 <h2 align="center">Μιλάνο</h2><img src="text\m2.jpg" class="imr"> 
 Το Μιλάνο είναι η πρωτεύουσα της επαρχίας της Λομβαρδίας και το σπουδαιότερο εμπορικό κέντρο της Ιταλίας. Στο Μιλανο θα βρείτε πολλές ευκαιρίες για αγορές αλλά και πολλά μουσεία, πινακοθήκες, παλάτια και εκκλησίες με θαυμάσια έργα τέχνης, με σημαντικότερα τον καθεδρικό ναό Ντουόμο και το φημισμένο Μέγαρο Όπερας την Λα Σκάλα. Επίσης αποτελεί ένα πολύ καλό ορμητήριο για την επίσκεψη σε άλλες περιοχές της βόρεια Ιταλίας όπως το Κόμο και η Gardaland αλλά και στην Ελβετία, που βρίσκεται σε πολύ κοντινή απόσταση.
 <br><br>
Αρχίστε τη βόλτα σας από το κέντρο της πόλης και τον καθεδρικό ναό Ντουόμο, το μνημείο σύμβολο του Μιλάνο, με το χρυσό άγαλμα της Παναγίας τη "La Madonnina". Στη συνέχεια κατευθυνθείτε στο εμπορικό κέντρο Galleria Vittorio Emanuele II, για μια πρώτη ματιά στις βιτρίνες των καταστημάτων και συνεχίστε προς την έξοδο που οδηγεί στην Piazza della Scala. Θα βρεθείτε ακριβώς μπροστά από τη διάσημη Σκάλα, το σημαντικότερο ίσως θέατρο όπερας στον κόσμο.
 <br><br>


Μπορείτε να κάνετε μια περιήγηση περιοχή, από τη Via Manzoni στη Via della Spiga και τη Via Montenapoleone, στην καρδιά της μόδας. Όταν φτάσετε στη Brera, τον τόπο των καλλιτεχνών, γεμάτη από ντόπιους και παμπ, επισκεφθείτε την πινακοθήκη. Δίπλα, στη Via Manzoni υπάρχει επίσης το Poldi Pezzoli, ένα άλλο πολύ σημαντικό μουσείο του Μιλάνου.
 <br><br>
Προς την Piazza Sant'Ambrogio, <img src="text\m1.jpg" class="iml"> ένα από τα πιο συναρπαστικά μέρη σε όλη την πόλη, μπορείτε να θαυμάσετε τη Βασιλική di Sant'Ambrogio με το ρωμανικό στυλ, αφιερωμένη στον πολιούχο του Μιλάνου, τον άγιο Ambrogio. Κοντά υπάρχει το Καθολικό Πανεπιστήμιο, πρώην μοναστήρι. Από εδώ μπορείτε να ξεκινήσετε ένα περίπατο κατά μήκος της Via San Vittore. Στα αριστερά του δρόμου, θα βρείτε το Μουσείο επιστημών και τεχνών - Leonardo Da Vinci, ένα σημαντικό μουσείο που συγκεντρώνει τα θεμελιώδη σημεία της τεχνολογικής προόδου της ανθρωπότητας και η οποία είναι αφιερωμένη στην ιδιοφυία του Λεονάρντο Ντα Βίντσι.

 <br><br>

Δεν απέχει πολύ από εδώ η εκκλησία της Santa Maria delle Grazie, όπου θα βρείτε την τέχνη του Bramante. Στην τραπεζαρία, η περίφημη τοιχογραφία Cenacolo (Μυστικός Δείπνος) που ζωγράφισε ο Ντα Βίντσι εμφανίζεται σε όλο της το μεγαλείο.
 <br><br>
Ίσως ο καλύτερος τρόπος για να γνωρίσετε το Μιλάνο είναι απλά να κάνετε ένα περίπατο και να θαυμάσετε όλα τα όμορφα κτίρια και αξιοθέατα που μπορείτε να βρείτε παντού. Εναλλακτικά πάρτε απλά ένα δημόσιο λεωφορείο και να ρεμβάστε από το παράθυρο.
 
 </div>
 
 
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