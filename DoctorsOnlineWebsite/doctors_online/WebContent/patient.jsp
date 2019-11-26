<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="java.sql.*" %>
<%@ page import=" javax.naming.InitialContext" %>
<%@ page  import=" javax.sql.DataSource" %>

<% 
 DataSource datasource = null;
try 
{	
	InitialContext ctx = new InitialContext();
	datasource = (DataSource)ctx.lookup("java:comp/env/jdbc/LiveDataSource");
} 
catch(Exception e) 
{
	throw new ServletException(e.toString());
}
String keep = (String)request.getSession().getAttribute("user");



response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate"); // HTTP 1.1.
response.setHeader("Pragma", "no-cache"); // HTTP 1.0.
if (keep == null) {response.sendRedirect("index.html");}
%>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="css.css" type="text/css">
<title>Patient Home</title>
</head>
<body>
<div>
<h1>DOCTORS ONLINE</h1>
</div>

<a>Welcome <%=keep %>!</a>
<h2>ΜΕΝΟΥ</h2>
<table>
<%
try
{
Connection con = datasource.getConnection();
String sql = "SELECT MIN(specialty) as specialty FROM doctors  group by specialty";
PreparedStatement ps = con.prepareStatement(sql);
ResultSet rs = ps.executeQuery(); 
%>
<form method="get" action = "#"> <!-- ----------------------FIRST FORM------------------------------ -->
<tr>
<td>Ειδικότητα:</td><td> 
<select name="specialtyselect">
<%
while(rs.next())
{
String fname = rs.getString("specialty"); 
%>
<option value="<%=fname %>"><%=fname %></option>
<%
}
%>
</select>
</td>

<%
rs.close();			
con.close();
}
catch(SQLException sqe)
{ 
out.println(sqe);
}
%>
<td>
<input type="submit" name="submitspecialty" value="Επιλογή ειδικότητας"></td></tr>
</form>
<form action="/doctors_online/PatientServlet" method="Post"><!-- ----------SECOND FORM------------- -->

<% 
String s=request.getParameter("specialtyselect");
try
{
Connection con1 = datasource.getConnection();
String sql1 = "SELECT a.id,a.doctor,a.date,a.time FROM appointments a inner join doctors d on a.doctor=d.username where d.specialty = ? and a.patient='null' ";
PreparedStatement ps1 = con1.prepareStatement(sql1);

ps1.setString(1, s);
ResultSet rs1 = ps1.executeQuery();
if(rs1.next()){
	rs1.previous();
%><tr><td>
Διαλέξτε ώρα:</td><td>
<select name="appointselect">
<%

while(rs1.next())
{
String id = rs1.getString("id"); 
String doctor = rs1.getString("doctor"); 
String date = rs1.getString("date"); 
String time = rs1.getString("time"); 
%>
<option value="<%=id %>"> Νο <%=id %>: <%=date %> και ώρα <%=time %>, με τον/την <%=doctor %> </option>
<%
}
%>
</select></td></tr><tr><td>
<input type="submit" name="chose" value="Ραντεβού με γιατρό ειδικότητας"></td>
<%
}
else
{
	if(s==null)
	{
		
%>
<td>Δεν έχετε επιλέξει<br> ειδικότητα</td>
<%}else{ %>
<td>Δεν υπάρχουν διαθέσιμα<br> ραντεβού με <%=s %></td>
<%}
}
rs1.close();			
con1.close();
}
catch(SQLException sqe)
{ 
out.println(sqe);
}
%>
</tr>

<tr>
    <td>&nbsp;</td>
 
</tr>
</form>

<form method="get" action = "#"><!-- --------------------THIRD FORM------------------------------ -->
<tr><td>Όνομα Χρήστη Γιατρού:</td><td> <input type="text" name="byname"/></td>
<td>
<input type="submit" name="submitdoctor" value="Επιλογή γιατρού"></td></tr>
</form>
<form  action="/doctors_online/PatientServlet" method="Post"><!-- ------------FOURTH FORM---------- -->

<% 
String n=request.getParameter("byname");
try
{
Connection con2 = datasource.getConnection();
String sql2 = "SELECT id,date,time FROM appointments where doctor = ? and patient='null' ";
PreparedStatement ps2 = con2.prepareStatement(sql2);

ps2.setString(1, n);
ResultSet rs2 = ps2.executeQuery();
if(rs2.next()){
	rs2.previous();
%>
<tr><td>
Διαλέξτε ώρα:</td><td>
<select name="appointselect1">
<%

while(rs2.next())
{
String id = rs2.getString("id"); 
String date = rs2.getString("date"); 
String time = rs2.getString("time"); 
%>
<option value="<%=id %>"> Νο <%=id %>: <%=date %> και ώρα <%=time %></option>
<%
}
%>
</select></td></tr><tr><td>
<input type="submit" name="chose" value="Ραντεβού με γιατρό"></td>
<%
}
else
{
	if(n==""|| n==null)
	{		
%>
<td>Δεν έχετε εισάγει<br> όνομα γιατρού</td>
<%}else{ %>
<td>Δεν υπάρχουν διαθέσιμα<br> ραντεβού με τον/την <%=n %></td>
<%}
}
rs2.close();			
con2.close();
}
catch(SQLException sqe)
{ 
out.println(sqe);
}
%>
<tr>
    <td>&nbsp;</td>
 
</tr>

<tr><td>ID ραντεβού: </td><td><input type="text" name="apid"/> </td></tr>
<tr>
<td><input type="submit" name="chose" value="Ακύρωση ραντεβού"></td></tr>

<tr>
    <td>&nbsp;</td>
    
</tr>
<tr><td><input type="submit" name="chose" value="Τα ραντεβού μου"></td></tr>
<tr><td><input type="submit" name="chose" value="Τα στοιχεία μου"></td></tr>
<tr><td></td><td></td><td><input type = "submit" name = "chose" value="Αποσύνδεση" style="float:right;"></td></tr>
</form>
</table>
</body>
</html>