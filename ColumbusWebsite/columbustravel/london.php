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
 <tr><td><a href="index.php">������ ������</a></td><td><a href="trips.php" style="color:#3F61BF">����������</a></td>

 <td><a href="http://localhost/columbustravel/tickets.php"> ���������</a></td><td style="border:none;"><a href="contact.php">�����������</a></td>
 </table>
<!--               /m a i n    m e n u                 --> 
 </div>
 <br><br>
 <div class="row">
 <div class="column left">
 <!--               c o n t e n t                 -->
 <div  style="padding:60px 0px 0px 60px;">
 <h2 align="center">�������</h2>
<img src="text\l1.jpg" class="imr"> �� ������� ��� ������� ��� ��� ������. �� ������� ��� �������� ��� ��� �������. �� ������� ��� ������������� ��������������, ��� shopping ��� ��� ���������� ����. �� ������� ��� 230 �������, ��� �������� ��� ��� ������������� �������������������. � ��������� ���������� ���� ����� ������� - ��' ���� ������� ����� ���� ����������. ��������� ��� ���� ����������� ��� �����, ������ ��� ��� ����� ���� ������������� �� ������� ������ ��� ���������� ������� ��� ������ ������������� ��� �������� ��� ������� - �� ��� ��� ������. 
<br><br>
��� ������ ���� ���������� ����������, ����������� ��� ����� ������������� ����� ���� ��� ������������� ������ ��� ��������� ��� �����, ���� ��� 10 ������� ������� ���������� �� ������� ���� �� ���������� ��������� �������, ������� ������� ��� ��������� ��� �������� ������� ��� ������� �������, ��������� �mind the gap� ��� �������������� ��� ��� �������, ��� ������� ��� ��������� ��� ������ ��� �� ���������� ���������. Shall we? 
<br><br>

<br><br>
<h3>�� SOS ��������� </h3>

���� ������ ��� �����, ���� ����� ��� ������, ������������� �� ��� ������ ��������� ��� �� ����� �������� ������� �� ����������� ������. �� �������� ���� ��� �� Big Ben, �� ������ ��� ������� ��� Westminster ��� ���� ��������� ��� ��� St. Paul, �� ����������� ����� �� ������ ��� ���������, ���� ����� ��������� ��������������� ��� �� ��������������� ��� ������ ��� ������� - ��� ����� ������ �� ���������� �����, �� ��������� ����� ���� ��� �� ������ �� ���� ������ �������� ��� ��������� ���������� ����� �� ��������� ��� ���������� �������� ��� ��� ��������� ��������. 


<br><br>
����������� ��������� ���� ����� ��� ������, �� ����������� �� London Eye, ��� ��� ��� �� ���������� ����� ����� ��� ������, � ����� ��� ��������� ���� ��������� ���������� ��� ��� �������� �� ����� ��� ��� �����. ���������� �� ������������ ��� ������� ��� ������ ������� ���: �� ������� ��� Westminster ��� ��� Waterloo ������� ��������� ������ ���� ����� ����, � ������������� Millennium Bridge ������ ������������ ����� ������, � London Bridge ����� ��� ���� ��� ��������� ���� ���� ������������ ������������� ���, ��� � Tower Bridge ������ ��� Tower of London, �� ������ ������ ��� ���������� ��� ������������� ��� �� 1066. 
<br><br>
<h3>�� �������� ��� �� ����� </h3><img src="text\l2.jpg" class="iml"> 
�� ����������� ��� �� �������� ������ ��� �������� ���������� ��������� ������� ��� ������ ���. �� ������� ����� ��� �� ��� ������������: 
<br>
-���� Leicester Square �� ��������� ����� ���� ������� pubs ��� �� ����������� ��� ���������� Hall of Fame, �� �� ����������� ��� stars ��� ��� �� ��� �� ������ ��������������� venues, ��� �������������� �� ���� ��� �������. 
-���� Trafalgar Square �� ������������� ���� ��� ��� ��������� ���� National Gallery, �� ��������� ��� ����� ��� ������� �� �� �������� ��������� ��� ��� ������������� ��� �� ����������� ����������� ��� �������� ��� ������� �� �����. 
-��� Piccadilly Circus, �� ������������ �� ������ �-��-Times-Square ����������� ������ ��� �� ������� ��� Oxford Circus, ��� ���� ������ � ������������ ���������� ��������� ������, �� ������ ��� �� ��� �������� �������� ������ ����������. 
-��� (����) �������� ����� ��� ��������, ��� ��������� �������� ������ �� �������, �� ���������� ��� ������ ���� ������������ ������ ����������� ��� �������� �������, �� ������� ���� �������������� ���������� ��� �� ���������� ��� ������������ ��� �������� ��� ��������������� ���� ��� �������� ��� ��������� �������, �� ������ ���������� ���� ��� �� ���������� ������ ����. ������� �������� ��� �����. ��� Royal Parks ��������������� ������ ����� �� Green Park, St. James Park, Hyde Park, Kensington Gardens, Regent's Park ��� Greenwich Park. 


<br><br>
<h3>�� ������</h3>
� �������� ����� ��� �������� ����� ���������� ������ ��� ��� �������� ��� �� ��������� ��� ��������� ���. ��������� �������� ����� �� musicals ��� ���������� ���� ������ ��� West ��� ��� off-West End - ���� ��� ������� ��� ���������� ������ ������ �� ��������� ������ ��� ��� ����������� ��������� ���� �� "We will rock you", "Matilda", "Thriller live", "The Lion King", "Phantom of the Opera" ��� "Billy Elliot". ������ ����������� ��� ��� �������� ����� ��� ����� ���.  

<br><br>

<h3>�� ������� ��� �� ����� ������ </h3>
-British Museum: �� ���������� ������� ��� ����� ���������� ������������� �������� ��� ���� ������ ��� ������� ��������� ��� ������������, ��� ���� ������ ��� ������, ��� ������ �� ������ ��� ���������, ������ ��� ��� ������� ��� ��������� �������� ���� ������� ����������� ����, ���� ��� ���������. 
-National Gallery: � ������������������ ������ ���������� ��� ������� ���� Trafalgar Square ��������� ������� 2.300 ������� ���������� ��� ������� ���������� ������, �� �������� ��� �� 1250 �� �� 1900. �� ����������� �������� ��� ����� �� �������� ����������� ��� ��� �����, � ��������� ��� � ���� ��� ���������� ���� ��� ���� ��� ������, ����, ����� ��� �������. 
-Tate Modern: ���� ���� ��� Millennium Bridge, � ����������� Tate ���������� ��� �������� ����� �� ���������� �������� ������� - ���� ��� ������� �� �������� ������ ��� Paul Klee.  
-������� ������� ��������: �� ������ �� ��������� ��������� �� ������������ ������ ��� Natural History Museum, ����� ����������� ��������� ��� ��� ������ ������, ���� ���� ���������� ����������� � ��������� �������� ���� �����������, ���� ��� ��� ���� �������. ������, ���������� ����� ����������� ��������� ��� ��� ��� ���� ������� ���. ��������. 
-Shakespeare's Globe: �� ������������ ������� ��� ����� ��� �������� ���� ������, ��� ����������������� ���� ���� � ������� ������� ������� ��� ��������� ����������� ���. � ����� ����� ����������� ��� ����������������� ���������� ��� ���� ���. 
-Madame Tussauds: �. ������ ���� ��� �������� ������� ���������� ��������� ��� ��� ��� ����� ��� ���������� �� �������� �� ��������, ��� ��� ������� ������� ����� ��� Lady Gaga ��� ��� �� ���������� ������� ��� ������� ����� ��� Usain Bolt ��� ��� Brad Pitt. 

<br><br>

<h3>�� ����������� ��������� </h3>
����������� ����� ��� ����� ��� �������, �� ������� ��� ����� ������� ��������. �������, ��������, ������� ��� �������� �� �������� �� ��������� ��� ��� �������� ����� ��� Borough, ��� ������ �� ����� �������� ��� ����������. �������������� ���� �� West End, �� �������� ���� ������ ��� ������������ ���� ��� �����, ������� �� ������� ������ ��� ���������������, ��� ���� ���� ��� West End, �� Covent Garden - ���� � �������� ��� ��������� ������, ��� ��������� ��� ���������� ��� shopping therapy ��� �� Soho ��� ���� �� hip ��������. 
<br><br>
����� ��� ������ ����� ��� �����, ������ �� ���������� ����� �� Notting Hill �� �� vintage ��������� ��� Portobello Market ��� ��� ����� ���������, ��� ���� ��� �������� ���������� ��� �����, �� Greenwich Park ������������ �� ������ ������������� ��� ��������, ����� ��� �� ������ ��� ���� ������� � ��������� �������� �����������, ��� ��� ����� ������ � ����������� ��� ������� �� ������ ����. �� ��� ����������� ���� ����� � ������������ ��������� �� ��� ����������� ��� ��� ����, �������� ���������� ��� �� ������ ��� ��������. 
 </div>
 
 
  <br><br><br>
 <br><a href="#top" class="top">Back to top</a><br><br><br><br><br><br>
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