<?php header("content-type: text/html;charset=iso-8859-7") ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<title>Columbus travel | ������� | �������� | ��������</title>
<style>

input[type=submit] {float:right;}
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

 <div class="page">
  <!--               U S E R                 -->
<br><div>  
<?php
if(!isset($_SESSION['name']) && empty($_SESSION['name']))
{
	session_destroy();
	//header('Location: http://localhost/columbustravel/register.php');
	echo '<script language="javascript">';
	echo 'window.location.href="register.php";alert("��� ��������� ���������� �������!");';
	echo '</script>';
	
}
else 
{
	$user = $_SESSION['name'];
	$mail = $_SESSION['email'];
	echo "<div class ='login'> <h5>���� ���,<a href='profile.php'  title='�� ������ ���' >  $user </a> | <a href='logout.php'>����������</a></h5></div>";
}
?>
 <!--               /U S E R                 -->
</div>
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

 <td><a href="http://localhost/columbustravel/tickets.php" style="color:#3F61BF"> ���������</a></td><td style="border:none;"><a href="contact.php">�����������</a></td>
 </table>
<!--               /m a i n    m e n u                 --> 
 </div>
 <br><br>
 <div class="row">
 <div class="column left">
 <!--               c o n t e n t                 -->
 <br><br><br>

<!--               f o r m                 -->
<form method="post" action="confirm.php"  name="ticketsform" onsubmit=" return check()"><fieldset>
<h3 align="center"> ������� ���������� </h3>
<table class="form">
<tr><td>&nbsp </td></tr>
<tr>
 <td> <label for="trip">������� ����������</label></td>
  <td>
  <select id="trip" name="trip">
                            <option value="Berlin">��������</option>
                            <option value="Morocco">������</option>
                            <option value="New York">��� �����</option>
							<option value="Milan">������</option>
							<option value="Bahamas">��������</option>
							<option value="London">�������</option>
                        </select>
  </td>
</tr>
<tr><td>&nbsp </td></tr>
<tr>
 <td> <label for="checkin">�����*</label></td>
  <td>
  <input type="date" id="checkin" name="checkin" max="2018-12-31" min="tomorrow" required></td>

</tr>
<tr>
  <td><label for="checkout">���������*</label></td>
 <td>
  <input type="date" id="checkout" name="checkout" max="2018-12-31" min="tomorrow" required></td></td>

  </tr>
   <tr><td></td><td><a  style="font-size:8px;">*��������� �� ���������� �� ��� ���������� �� �������� browsers </a></td></tr>

  <tr>
 
</tr>

<tr><td>&nbsp </td></tr>
<tr>
  <td><label for="tickets">������� ���������� (�� ���������)*</label></td>
  <td><input type="text" id="tickets" name="tickets" size="10" required></td>

  </tr>

  

<tr><td>&nbsp </td></tr><tr><td>&nbsp </td></tr>
<tr>
 <td><input type="reset" value="����������"></td> 
 <td><input type="submit" id="submit" name="submit" value="�������" ></td>
 </tr>
</table>
</fieldset>
</form> <br><br><br>
<!--               /f o r m                 --> 
<!--               j s                 --> 
<script type="text/javascript">
function check(){

var checkin = document.getElementById("checkin").value;
var checkout = document.getElementById("checkout").value;
 var today = new Date();
 	var dd = today.getDate();
	var mm = today.getMonth()+1; 
	var yyyy = today.getFullYear();

	if(dd<10) {
		dd = '0'+dd
	} 
	if(mm<10) {
		mm = '0'+mm
	} 
	today = yyyy + '-' + mm + '-' + dd;

if(checkin < checkout && checkin>today ) return true;
else {  alert("�������� ������� �����������!");return false; }
}
</script>

<!--               /j s                 --> 

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