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


#tbl td, #tbl th {
    border: 1px solid #ddd;
    padding: 8px;
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
 <h2 align="center"> Προορισμοί</h2>
<h3>Βερολίνο</h3>
<p><img src="sidebar\ber.jpg" class="im">
Το Βερολίνο είναι η πόλη της Ευρώπης όπου τα πάντα συμβαίνουν στους δρόμους της. Είναι ο προορισμός της νεολαίας, των καλλιτεχνών , του κινηματογράφου, των εναλλακτικών, της δημιουργίας, των ιδεών, των ευκαιριών, των ανθρώπων που θέλουν να βρίσκονται μέσα σε ό,τι συμβαίνει στον κόσμο και σε ο,τι καινούργιο έρχεται. Εκείνων που αμφισβητούν τα καθιερωμένα και «διψούν» για νέες τάσεις και ρεύματα. Εκείνων που θέλουν να ζουν έντονα, μένοντας ξάγρυπνοι για να περπατήσουν σε φώτα και μουσικές, χωρίς να βιάζονται να πουν «καληνύχτα». Με άλλα λόγια το Βερολίνο είναι η πιο cool πρωτεύουσα της Ευρώπης. </p>
<a href="berlin.php" style="float:right;color:#4C80BC;">Συνέχεια...</a><br>
<h3>Μαρόκο</h3><p><img src="sidebar\mor.jpg" class="im">Ένας μεγάλος, κατακόκκινος ήλιος βουτά και χάνεται στην απεραντοσύνη του Ατλαντικού. Ένας γεμάτος αστέρια ουρανός απλώνεται πάνω από μερικές σκηνές που έχουν στηθεί γύρω από μια φωτιά που σιγοκαίει στη Σαχάρα. Μια εξωτική μελωδία πλανάται πάνω από την medina, την παλιά πόλη, του Μαρακές καθώς πέφτει το σκοτάδι. Και κάπου δίπλα, σαν σε παράλληλο σύμπαν, ζευγάρια κλείνουν τραπέζι στα μοδάτα εστιατόρια της Καζαμπλάνκα, παρέες ξενυχτούν τσουγκρίζοντας Μοχίτο στα μπαρ της Γκελίζ στο Μαρακές, και αστραφτερά κάμπριο ανεβοκατεβαίνουν την Κορνίς, την παραλιακή λεωφόρο που κινείται παράλληλα με τα κύματα του Ατλαντικού. Αυτό είναι το Μαρόκο: Τόσο Ανατολή και τόσο Δύση, τόσο Ευρώπη και τόσο Αφρική, τόσο κοντά και τόσο μακριά ταυτόχρονα. Δύο εβδομάδες δε σου φτάνουν για να το γνωρίσεις. Για να το καταλάβεις, δε σου φτάνουν ούτε δυο ζωές. 
</p>
<a href="morocco.php" style="float:right;color:#4C80BC;">Συνέχεια...</a><br>
<h3>Νέα Υόρκη</h3><p><img src="sidebar\nyo.jpg" class="im">Την αποκαλούν το «Μεγάλο Μήλο», το κέντρο του κόσμου και την Πόλη που δεν κοιμάται ποτέ (πως να κοιμηθεί με τέτοιο τζετ λαγκ) και προσέφερε εκτός από μια βδομάδα διακοπών και μια εμπειρία ζωής. 
</p><br><br><br><br>
<a href="newyork.php" style="float:right;color:#4C80BC;">Συνέχεια...</a><br>
<h3>Μπαχάμες</h3><p><img src="sidebar\bah.jpg" class="im">Με πάνω από 1400 παραλίες, απο τις οποίες κάποιες συγκαταλέγονται στις πιο εντυπωσιακές παραλίες της Καραιβικής, που "φιλοξενούνται" σε 700 εξωτικά νησιά, με ξενοδοχεία που συγκαταλέγονται στα καλύτερα της Υφηλίου και μια τεράστια επιλογή εκδρομών και δραστηριοτήτων όπως καταδύσεις (που ενδείκνυνται ακόμα και για αρχάριους) στα πιο ήσυχα νερά της Καραϊβικής και το κολύμπι με ελεύθερα δελφίνια οι Μπαχάμες δικαίως ανήκουν στους πιο δημοφιλείς προορισμούς της Καραϊβικής.      
</p>
<a href="bahamas.php" style="float:right;color:#4C80BC;">Συνέχεια...</a><br>
<h3>Μιλάνο</h3><p><img src="sidebar\mil.jpg" class="im">Το Μιλάνο είναι η πρωτεύουσα της επαρχίας της Λομβαρδίας και το σπουδαιότερο εμπορικό κέντρο της Ιταλίας. Στο Μιλανο θα βρείτε πολλές ευκαιρίες για αγορές αλλά και πολλά μουσεία, πινακοθήκες, παλάτια και εκκλησίες με θαυμάσια έργα τέχνης, με σημαντικότερα τον καθεδρικό ναό Ντουόμο και το φημισμένο Μέγαρο Όπερας την Λα Σκάλα. Επίσης αποτελεί ένα πολύ καλό ορμητήριο για την επίσκεψη σε άλλες περιοχές της βόρεια Ιταλίας όπως το Κόμο και η Gardaland αλλά και στην Ελβετία, που βρίσκεται σε πολύ κοντινή απόσταση.
</p>
<a href="milan.php" style="float:right;color:#4C80BC;">Συνέχεια...</a><br>
<h3>Λονδίνο</h3><p><img src="sidebar\lon.jpg" class="im">Το Λονδίνο του θεάτρου και των τεχνών. Το Λονδίνο των πλατειών και των γεφυρών. Το Λονδίνο της πρωτοποριακής αρχιτεκτονικής, του shopping και της νυχτερινής ζωής. Το Λονδίνο των 230 γλωσσών, της Ιστορίας και της αξιοθαύμαστης πολυσυλλεκτικότητας. Η βρετανική πρωτεύουσα έχει πολλά πρόσωπα γι αυτό ακριβώς είναι τόσο γοητευτική. Ιδιαίτερα για τους «πρωτάρηδες» της πόλης, αυτούς που για πρώτη φορά αποβιβάζονται σε αγγλικό έδαφος και βρίσκονται μπροστά στο χαώδες καλειδοσκόπιο του «κέντρου της Ευρώπης» - αν όχι του κόσμου. 
</p>
<a href="london.php" style="float:right;color:#4C80BC;">Συνέχεια...</a><br><br><br>
 <h2 align="center">Τιμές ανά άτομο</h2><br><br>
 <table id="tbl" style="width:100%">
  <tr><th>Προορισμός</th><th>Τιμή σε ευρώ</th></tr>
 <tr><td>Βερολίνο</td><td>300</td></tr>
 <tr><td>Μαρόκο</td><td>400</td></tr>
  <tr><td>Νέα Υόρκη</td><td>700</td></tr>
 <tr><td>Μπαχάμες</td><td>400</td></tr>
  <tr><td>Μιλάνο</td><td>50</td></tr>
 <tr><td>Λονδίνο</td><td>90</td></tr>
 </table>
 
 
 
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