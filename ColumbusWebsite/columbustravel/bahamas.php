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
 <h2 align="center">Μπαχάμες: Το αρχιπέλαγος με τα αμέτρητα νησιά</h2>
Οι Μπαχάμες είναι ένα αρχιπέλαγος που αποτελείται από περίπου 700 κοραλλιογενή νησιά, εκ των οποίων περίπου 30 είναι κατοικήσιμα και βρίσκονται κατά μήκος της Φλόριντα Τροπικό του Καρκίνου.
<img src="text\bahamas1.jpg" class="imr"> 
Φθάνοντας στα νησιά Μπαχάμες  θα αντιληφθείτε ότι βρίσκεστε όχι σε έναν, αλλά σε πολλούς προορισμούς. Μεταξύ των νησιών Grand Bahama και Μεγάλης Inagua απλώνονται 23 κατοικημένα νησιά και χιλιάδες ακατοίκητες νησίδες. ύφαλος του κόσμου - τότε θα συνειδητοποιήσετε ότι είσαστε στις Μπαχάμες!

Τη στιγμή που θα νιώσετε στα δάχτυλά σας την άμμο και αντικρίσετε τις παραλίες που δροσίζονται από τη θαλασσινή αύρα και τα σμαραγδένια κρυστάλλινα νερά - ιδανικά για θαλάσσια σπορ και καταδύσεις, αφού εδώ βρίσκεται ο 2ος μεγαλύτερος κοραλλιογενής
 <br><br>
<h3>Nassau</h3>
 
Η πρωτεύουσα Nassau βρίσκεται στο νησί New Providence. Η πόλη έχει μια ιδιαίτερη γοητεία που συνδυάζει την κομψότητα παλιότερων εποχών με μοντέρνα στοιχεία. Εδώ θα βρείτε καλοδιατηρημένα αποικιακά κτίρια, συναρπαστικές ατραξιόν, αφορολόγητα ψώνια, μία από τις μεγαλύτερες αγορές ψάθινων προϊόντων στην Καραϊβική, απολαυστική κουζίνα και μοναδικές πολιτιστικές δραστηριότητες. Και όλα αυτά σε απόσταση αναπνοής από την Cable Beach, μια απέραντη αμμουδερή έκταση, που φιλοξενεί μερικά από τα πιο πολυτελή ξενοδοχεία, καζίνο, γήπεδα γκολφ, εστιατόρια και nightclubs. Το New Providence είναι νησί στο αρχιπέλαγος Λουκάγιαν, το οποίο ανήκει στις Μπαχάμες. Στο νησί βρίσκεται η πρωτεύουσα των Μπαχαμών, το Νασσάου και αυτό καθιστά το νησί το πιο πυκνοκατοικημένο νησί στις Μπαχάμες, έχοντας πάνω από το 70% του συνολικού πληθυσμού της χώρας. Το νησί ήταν αρχικά υπό ισπανική κυριαρχία μετά την ανακάλυψή του Νέου Κόσμου από τον Χριστόφορο Κολόμβο, αλλά η ισπανική κυβέρνηση έδειξε λίγο ενδιαφέρον για την ανάπτυξη του νησιού (αλλά και για τις Μπαχάμες γενικότερα). Το Νασσάου, η μεγαλύτερη πόλη του νησιού, ήταν παλαιότερα γνωστή ως Charles-town, αλλά κάηκε ολοσχερώς από τους Ισπανούς το 1684. Έπειτα το 1695 ξαναχτίστηκε και μετονομάστηκε σε Νασσάου από τον Nicholas Trott, τον πιο επιτυχημένο Κυβερνήτη, προς τιμήν του πρίγκιπα του Οίκου της Οράγγης-Νασσάου, Γουλιέλμου Γ΄ της Αγγλίας. Το Νιου Πρόβιντενς λειτουργεί ως το κύριο εμπορικό κέντρο των Μπαχαμών και είναι επίσης η έδρα για πάνω από 400 τράπεζες. Από το λιμάνι και τα ξενοδοχεία της πόλης περνούν περισσότερα από τα δύο τρίτα των τεσσάρων εκατομμυρίων τουριστών που επισκέπτονται τις Μπαχάμες ετησίως.
 <br><br>
<h3>Grand Bahama</h3><img src="text\bahamas2.jpg" class="iml"> 
Το άλλο δημοφιλές νησί του αρχιπελάγους, το Grand Bahama, συνδυάζει τη γοητεία του παρελθόντος με τις σύγχρονες ατραξιόν, ενώ φιλοξενεί και μερικά οικολογικά θαύματα. Η Γκραντ Μπαχάμα είναι τo τέταρτο σε μέγεθος από τα νησιά Μπαχάμες. Η κύρια πόλη του νησιού, το Φρίπορτ, καθώς και το γειτονικό παραλιακό θέρετρο Λιούκαγια έχουν χαρακτηριστικό τους τις μεγάλες φαρδιές λεωφόρους με μεγάλα ξενοδοχεία, καζίνο, καμπαρέ καθώς και εμπορικά κέντρα και εστιατόρια. Το νούμερο ένα αξιοθέατο του νησιού είναι φυσικά οι πανέμορφες εξωτικές παραλίες με ολόλευκες αμμουδιές και πεντακάθαρα νερά. Η πιο φημισμένη παραλία είναι η Gold rock beach όπου γυρίστηκαν σκηνές από την ταινία του James Bond "Casino Royale". Εννοείται πως σε ένα τέτοιο μέρος υπάρχουν πολλά σημεία για οργανωμένες καταδύσεις ή για κολύμπι με δελφίνια.Χιλιόμετρα με ατέλειωτες παραλίες υπάρχουν σε όλο το νησί. Επίσης πολλά κέντρα για καταδύσεις σε υφάλους και ναυάγια σίγουρα αποτελούν μια μεγάλη πρόκληση.
 <br><br>
<h3>Paradise Island</h3>
Μια γέφυρα μόνο χωρίζει το Nassau από το διάσημο Paradise Island, με τις εξαιρετικές παραλίες, ένα παγκοσμίου κλάσης γήπεδο γκολφ, τα πιο πολυτελή θέρετρα στην Καραϊβική, γιγαντιαία καζίνο και, φυσικά, πρώτης τάξεως διασκέδαση.
 <br><br><h3>Graden of the Groves</h3>
Ανατολικά του Φρίπορτ βρίσκεται ο κήπος των Γκρόουβς. Ο Γουάλας Γκρόουβς (Wallace Groves) ήταν ο Αμερικάνος επιχειρηματίας που την εικοσαετία 1950-1970 μετέτρεψε το Γκραντ Μπαχάμα από πόλη ψαράδων σε τεράστιο τουριστικό θέρετρο. Ο κήπος των Γκρόουβς κατασκευάστηκε προς τιμή του Γουάλας Γκρόουβς και της συζύγου του. Τα εξωτικά λουλούδια και οι γραφικές λιμνούλες σε μια έκταση 50 στρεμμάτων αποτελούν ένα τουριστικό αξιοθέατο που πρέπει να επισκεφτείτε οπωσδήποτε. Στον κήπο βρίσκεται και το μουσείο της Γκραν Μπαχάμα. Θα θαυμάσετε αντικείμενα των αυτόχθονων Ινδιάνων που ζούσαν πριν ανακαλύψει ο Κολόμβος τις Μπαχάμες. Επίσης θα δείτε εντυπωσιακά εκθέματα από την εποχή των πειρατών. Η είσοδος στο μουσείο είναι δωρεάν επομένως μην αμελήσετε να το επισκεφτείτε. Πέρα από την διασκέδαση, τα μπάνια και τα ψώνια όταν ταξιδεύουμε σε ένα ξένο μέρος είναι ιδανικό να μαθαίνουμε τα βασικά στοιχεία της Ιστορίας και του Πολιτισμού του.
 
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