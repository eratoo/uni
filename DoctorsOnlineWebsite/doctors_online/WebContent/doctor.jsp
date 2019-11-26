<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    
    
    
    
    
    <% 
    String keep = (String)request.getSession().getAttribute("user");//ανάκτηση ονόματος χρήστη από το session

    

response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate"); // HTTP 1.1.
response.setHeader("Pragma", "no-cache"); // HTTP 1.0.
if (keep == null) {response.sendRedirect("index.html");}

%>
    
    
    
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css.css" type="text/css">
<title>Doctor HomePage</title>
</head>
<body>
<div>
<h1>DOCTORS ONLINE</h1>
</div>
<h2>ΜΕΝΟΥ</h2>
<table>

<form action="/doctors_online/DoctorServlet" method="Post">

<tr><td>Ημερομηνία:</td><td><input type="text" name="Ημερομηνία"/></td></tr>
<tr><td>Ώρα:</td><td><input type="text" name="Ώρα"/></td></tr>
<tr><td><input type="submit" name="doctor" value="Δήλωση διαθεσιμότητας"></td>
<tr>
    <td>&nbsp;</td>
    
</tr>
<tr><td>ID ραντεβού:</td><td><input type="text" name="IDραντεβού"/></td></tr>
<tr><td>
<input type="submit" name="doctor" value="Ακύρωση ραντεβού"></td></tr>

<tr>
    <td>&nbsp;</td>
    
</tr>
<tr><td>
<input type="submit" name="doctor" value="Τα ραντεβού μου"></td></tr>
<tr><td>
<input type="submit" name="doctor" value="Τα στοιχεία μου"></td></tr>

<tr>
    <td>&nbsp;</td>
    
</tr>
<tr><td></td><td><input type = "submit" name = "doctor" value="Αποσύνδεση" style="float:right;"></td>
</form>
</table>

</body>
</html>