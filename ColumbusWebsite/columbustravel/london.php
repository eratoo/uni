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
 <h2 align="center">Λονδίνο</h2>
<img src="text\l1.jpg" class="imr"> Το Λονδίνο του θεάτρου και των τεχνών. Το Λονδίνο των πλατειών και των γεφυρών. Το Λονδίνο της πρωτοποριακής αρχιτεκτονικής, του shopping και της νυχτερινής ζωής. Το Λονδίνο των 230 γλωσσών, της Ιστορίας και της αξιοθαύμαστης πολυσυλλεκτικότητας. Η βρετανική πρωτεύουσα έχει πολλά πρόσωπα - γι' αυτό ακριβώς είναι τόσο γοητευτική. Ιδιαίτερα για τους «πρωτάρηδες» της πόλης, αυτούς που για πρώτη φορά αποβιβάζονται σε αγγλικό έδαφος και βρίσκονται μπροστά στο χαώδες καλειδοσκόπιο του «κέντρου της Ευρώπης» - αν όχι του κόσμου. 
<br><br>
Για αυτούς τους «αρχάριους» λονδρέζους, επιχειρούμε μία μεστή αναγνωριστική βόλτα στις πιο ενδιαφέρουσες γωνιές και γειτονιές της πόλης, μέσα από 10 στάσεις γεμάτες περιπάτους σε δρόμους όπου τα αυτοκίνητα πηγαίνουν ανάποδα, γεμάτες Ιστορία και πολιτισμό στα καλύτερα μουσεία της Γηραιάς Ηπείρου, πινακίδες «mind the gap» και μαυροσκούφηδες έξω από παλάτια, και γέφυρες που ατενίζουν τον Τάμεση και το λονδρέζικο «μωσαϊκό». Shall we? 
<br><br>

<br><br>
<h3>Τα SOS αξιοθέατα </h3>

Στην καρδιά της πόλης, στις όχθες του Τάμεση, παρατάσσονται τα πιο γνωστά αξιοθέατα από τα οποία ξεκινούν συνήθως οι λονδρέζικες βόλτες. Θα περάσετε κάτω από το Big Ben, θα μπείτε στο Αββαείο του Westminster και στον Καθερδικό Ναό του St. Paul, θα προχωρήσετε μέχρι το παλάτι του Μπάκιγχαμ, όπου πλήθη τουριστών συγκεντρώνονται για να παρακολουθήσουν την αλλαγή της φρουράς - για όσους μισούν τα τουριστικά κλισέ, οι τεράστιοι κήποι γύρω από το παλάτι θα τους δώσουν ευκαιρία για πράσινους περιπάτους παρέα με σκίουρους που τριγυρνούν απτόητοι από την ανθρώπινη παρουσία. 


<br><br>
Προχωρώντας ανατολικά κατά μήκος του Τάμεση, θα συναντήσετε το London Eye, που δεν σας το συνιστούμε καθώς εκτός από ακριβή, η «ρόδα» δεν προσφέρει παρά στιγμιαία πανοραμική θέα που μπορείτε να δείτε και από αλλού. Προτιμήστε να εξερευνήσετε τις γέφυρες του Τάμεση τριγύρω της: Οι γέφυρες του Westminster και του Waterloo κρύβουν υπαίθριες αγορές στις άκρες τους, η φουτουριστική Millennium Bridge ανήκει αποκλειστικά στους πεζούς, η London Bridge είναι από μόνη της αξιοθέατο χάρη στην «παραμυθένια» προσωπικότητά της, ενώ η Tower Bridge οδηγεί στο Tower of London, το μυθικό Κάστρο της Βασίλισσας που χρονολογείται από το 1066. 
<br><br>
<h3>Οι πλατείες και τα πάρκα </h3><img src="text\l2.jpg" class="iml"> 
Τα πλακόστρωτα και οι πράσινες οάσεις του Λονδίνου διεκδικούν σημαντικό μερίδιο του χρόνου σας. Να μερικές ιδέες για να τον «σπαταλήσετε»: 
<br>
-Στην Leicester Square θα χορτάσετε μπύρα στις τοπικές pubs και θα περπατήσετε στο λονδρέζικο Hall of Fame, με τα αποτυπώματα των stars έξω από τα όλα τα διεθνή κινηματογραφικά venues, που εκπροσωπούνται σε αυτή την πλατεία. 
-Στην Trafalgar Square θα ξεκουραστείτε μετά από την περιήγηση στην National Gallery, θα θαυμάσετε την στήλη του Νέλσονα με τα περίφημα λιοντάρια που τον «προστατεύουν» και τα εντυπωσιακά σιντριβάνια που φωτίζουν την πλατεία το βράδυ. 
-Στο Piccadilly Circus, θα ακολουθήσετε το μεγάλο α-λα-Times-Square ηλεκτρονικό ταμπλό και θα φτάσετε στο Oxford Circus, από όπου ξεκινά ο διασημότερος ευρωπαϊκός εμπορικός δρόμος, με μερικά από τα πιο ονομαστά εμπορικά κέντρα παγκοσμίως. 
-Στα (οκτώ) Βασιλικά Πάρκα του Λονδίνου, που καλύπτουν τεράστια έκταση με πράσινο, θα απολαύσετε τις μικρές αλλά απολαυστικές δόσεις ηλιοφάνειας του αγγλικού ουρανού, θα αράξετε στις ενοικιαζόμενες ξαπλώστρες και θα απολαύσετε την ιεροτελεστία των εγγλέζων που συγκεντρώνονται γύρω από «κήρυκες» και δημόσιους ρήτορες, οι οποίοι συνεχίζουν αυτό που θα συναντούσε κανείς στην. κλασική Εκκλησία του Δήμου. Στα Royal Parks περιλαμβάνονται μεταξύ άλλων τα Green Park, St. James Park, Hyde Park, Kensington Gardens, Regent's Park και Greenwich Park. 


<br><br>
<h3>Τα θέατρα</h3>
Η θεατρική σκηνή του Λονδίνου είναι παγκοσμίως γνωστή για την ποιότητα και το υπερθέαμα των παραγωγών της. Ιδιαίτερα ονομαστά είναι τα musicals που ανεβαίνουν στις σκηνές του West και του off-West End - αυτή την περίοδο για παράδειγμα μπορεί κανείς να απολαύσει κάποια από τις διαχρονικές επιτυχίες όπως τα "We will rock you", "Matilda", "Thriller live", "The Lion King", "Phantom of the Opera" και "Billy Elliot". Μάθετε περισσότερα για την θεατρική σκηνή της πόλης εδώ.  

<br><br>

<h3>Τα Μουσεία και οι χώροι τέχνης </h3>
-British Museum: Το μεγαλύτερο μουσείο της χώρας περικλείει σημαντικότατα ευρήματα από κάθε γνωστό και άγνωστο πολιτισμό της ανθρωπότητας, από κάθε ήπειρο του κόσμου, και φυσικά τα Γλυπτά του Παρθενώνα, εκείνα που στο Μουσείο της Ακρόπολης βλέπουμε στις γύψινες απομιμήσεις τους, πλάι στα αυθεντικά. 
-National Gallery: Η αρχαιοελληνικότατη Εθνική Πινακοθήκη της Αγγλίας στην Trafalgar Square φιλοξενεί περίπου 2.300 πίνακες εκπροσώπων της δυτικής ζωγραφικής τέχνης, με δείγματα από το 1250 ως το 1900. Τα διασημότερα εκθέματά της είναι τα περίφημα «Ηλιοτρόπια» του Βαν Γκογκ, η «Αφροδίτη και ο Άρης» του Μποτιτσέλι αλλά και έργα των Τέρνερ, Μονέ, Σεζάν και Ρενουάρ. 
-Tate Modern: Στην άκρη της Millennium Bridge, η εντυπωσιακή Tate αγκαλιάζει την μοντέρνα τέχνη με περιοδικές εκθέσεις «αιχμής» - αυτή την περίοδο θα πετύχετε έκθεση του Paul Klee.  
-Μουσείο Φυσικής Ιστορίας: Τα παιδιά θα αγαπήσουν ιδιαίτερα το μεγαλοπρεπές κτίριο του Natural History Museum, καθώς επιφυλάσσει εκπλήξεις από την είσοδο κιόλας, όπου τους επισκέπτες καλωσορίζει ο τεράστιος σκελετός ενός δεινόσαυρου, αλλά και μία μπλε φάλαινα. Φυσικά, ακολουθούν ακόμη περισσότερα «δείγματα» από την ζωή στον πλανήτη στα. ενδότερα. 
-Shakespeare's Globe: Το ελισαβετιανό Λονδίνο ζει ακόμη στο σφαιρικό αυτό κτίριο, που ανακατασκευάστηκε εκεί όπου ο Ουίλιαμ Σαίξπηρ ανέβαζε τις περίφημες παραστάσεις του. Ο χώρος είναι επισκέψιμος και πραγματοποιούνται ξεναγήσεις ανά μισή ώρα. 
-Madame Tussauds: Η. μητέρα όλων των μουσείων κέρινων ομοιωμάτων βρίσκεται εδώ και σας δίνει την δυνατότητα να ποζάρετε με φιγούρες, από τον Ουίλιαμ Σαίξπηρ μέχρι την Lady Gaga και από το πριγκιπικό ζευγάρι της Αγγλίας μέχρι τον Usain Bolt και τον Brad Pitt. 

<br><br>

<h3>Οι λονδρέζικες γειτονιές </h3>
Προχωρώντας εκτός των ορίων του κέντρου, τα πρόσωπα της πόλης συνεχώς αλλάζουν. Εικόνες, μυρωδιές, γεύσεις και μουσικές θα αρχίσετε να συλλέγετε από την υπαίθρια αγορά του Borough, ένα παζάρι με έθνικ προϊόντα και ατμόσφαιρα. Ξεμακραίνοντας προς το West End, θα βρεθείτε στην καρδιά της πολιτιστικής ζωής της πόλης, ανάμεσα σε δεκάδες θέατρα και κινηματογράφους, ενώ στην άκρη του West End, το Covent Garden - ήτοι η γειτονιά της Βασιλικής Όπερας, σας περιμένει για περιπάτους και shopping therapy και το Soho για ποτό σε hip μπαράκια. 
<br><br>
Εκτός των στενών ορίων της πόλης, αξίζει να «εκδράμετε» μέχρι το Notting Hill με τα vintage μαγαζάκια στο Portobello Market και τις μποέμ γειτονιές, ενώ προς την αντίθετη κατεύθυνση της πόλης, το Greenwich Park περιλαμβάνει το μεγάλο Αστεροσκοπείο του Λονδίνου, καθώς και το σημείο από όπου περνάει ο περίφημος ομώνυμος μεσημβρινός, από τον οποίο ξεκινά ο διαχωρισμός του πλανήτη σε «ζώνες» ώρας. Το πιο εντυπωσιακό όμως είναι ο καταπράσινος περίβολος με την απεριόριστο θέα στη φύση, ελάχιστα χιλιόμετρα από το κέντρο του Λονδίνου. 
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