<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    
 <% 
 String keep = (String)request.getSession().getAttribute("user");//ανάκτηση ονόματος χρήστη από το session
response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate"); // HTTP 1.1.
response.setHeader("Pragma", "no-cache"); // HTTP 1.0.
if (keep == null) {response.sendRedirect("index.html");}

%>
    
    
    
    
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin HomePage</title>
</head><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css.css" type="text/css">
<title>Home</title>
</head>
<body>
<div>
<h1>DOCTORS ONLINE</h1>
</div>
<a style="text-align:left;">Welcome <%=keep %>!</a>
<table>
<h2>ΜΕΝΟΥ</h2>
<form action="/doctors_online/AdminServlet" method="Post">
<input type="hidden" name="requestType" value="type" />
<tr><td>
<input type="submit" name="admin" value="Εισαγωγή νέου ιατρού στο σύστημα"></td></tr>
<tr>
    <td>&nbsp;</td>
    
</tr>
<tr><td>Όνομα χρήστη: <input type="text" name="doctor"/></td></tr>
<tr><td><input type="submit" name="admin" value="Διαγραφή ιατρού από το σύστημα">
</td></tr>




<tr><td>
<input type="submit" name="admin" value="Τα στοιχεία μου"></td></tr>


<tr>
    <td>&nbsp;</td>
    
</tr>
<tr><td></td><td>
<input type = "submit" name = "admin" value="Αποσύνδεση" style="float:right;"></td></tr>
</form>

</table>
</body>
</html>