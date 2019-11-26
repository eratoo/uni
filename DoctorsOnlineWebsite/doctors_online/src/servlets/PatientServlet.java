package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.PreparedStatement;
import javax.naming.InitialContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.sql.DataSource;
import classes.Patient;

@WebServlet({ "/PatientServlet"})
public class PatientServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
    
	private DataSource datasource = null;

	public void init() throws ServletException
	{		
		try //καθορισμός των στοιχείων για τη βάση
		{	
			InitialContext ctx = new InitialContext();
			datasource = (DataSource)ctx.lookup("java:comp/env/jdbc/LiveDataSource");
		} 
		catch(Exception e) 
		{
			throw new ServletException(e.toString());
		}
	}
    public PatientServlet() {
        super();
    }
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
    }
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
	// συνάρτηση για τη λειτουργία post του servlet
		
		response.setContentType("text/html; charset=UTF-8");
		request.setCharacterEncoding("UTF-8");
		response.setCharacterEncoding("UTF-8");

		String keep = (String)request.getSession().getAttribute("user");//ανάκτηση ονόματος χρήστη από το session
	
		String menu = request.getParameter("chose"); 
		//menu: επιλογή του χρήστη (ένα από τα κουμπιά τύπου submit με όνομα chose)
		//ανάλογα με το κουμπί που πάτησε ο ασθενής καλείται κάποια συνάρτηση για να 
		//ολοκληρωθεί η ενέργεια
        if ("Ραντεβού με γιατρό ειδικότητας".equals(menu))
        {
			appointment(keep,"specialty",request,response);			
		}
        else if ("Ραντεβού με γιατρό".equals(menu))
        {        	
        	appointment(keep,"name",request,response);
		}

        else if  ("Ακύρωση ραντεβού".equals(menu))
        {
        	appointment(keep,"delete",request,response);
		}
        else if ("Τα ραντεβού μου".equals(menu)){
        	showAppointments(keep,request,response);
		}
        else if ("Τα στοιχεία μου".equals(menu))
        {
        	showInfo(keep,response);
        }
        else //αν έχει πατηθεί το κουμπί για logout
        {
			request.getSession().removeAttribute("user");
			request.getSession().invalidate();
			response.sendRedirect("index.html");
        }
	}
	private void createDynamicPage(String message, HttpServletResponse response) throws IOException 
	{// δημιουργία dynamic web page η οποία εμφανίζει κάποιο μήνυμα
		
		response.setContentType("text/html; charset=UTF-8");
		response.setCharacterEncoding("UTF-8");
		PrintWriter out = response.getWriter();
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");

		//εμφάνιση μηνύματος
		out.println("<html>");
		out.println("<head><title>Message</title></head>");
		out.println("<body>");
		out.println("<p>" + message + "</p>");
		
		response.setHeader("Cache-Control","no-cache"); //HTTP 1.1
		response.setHeader("Pragma","no-cache"); //HTTP 1.0
		response.setDateHeader ("Expires", 0); //prevents caching at the proxy server	
		out.println("<br><br><br><a href=\"/doctors_online/patient.jsp\">Πίσω</a>");
		out.println("</body></html>");	
	}
	private void showAppointments(String username, HttpServletRequest request, HttpServletResponse response) throws IOException 
	{// δημιουργία dynamic web page η οποία εμφανίζει τα ραντεβού του συνδεδεμένου χρήστη
		
		response.setContentType("text/html; charset=UTF-8");
		response.setCharacterEncoding("UTF-8");
		response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate"); // HTTP 1.1.
		response.setHeader("Pragma", "no-cache"); // HTTP 1.0.
		if (username == null) {response.sendRedirect("index.html");}
				
		PrintWriter out = response.getWriter();
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");//css
		
		try
		{//σύνδεση με τη βάση
			
			Connection con = datasource.getConnection();
			Patient p = new Patient(0,"","","","");		
		  	PreparedStatement ps = con.prepareStatement(p.showAppointments());
		  	ps.setString(1, username);
			ResultSet rs =ps.executeQuery();
		
			if (rs.next()) 
			{
				//τυπώνεται ένας πίνακας με τα ραντεβού του ασθενή
			    out.print("<table><tr><th>ID</th><th>Γιατρός</th><th>Ημερομηνία</th><th>Ώρα</th></tr>");
			    do {
	
			        out.print("<tr>");
			        out.print(new StringBuilder("<td>").append(rs.getObject("id")).append("</td>").toString());
			 
			        out.print(new StringBuilder("<td>").append(rs.getObject("doctor")).append("</td>").toString());
			     
			        out.print(new StringBuilder("<td>").append(rs.getObject("date")).append("</td>").toString());
			        
			        out.print(new StringBuilder("<td>").append(rs.getObject("time")).append("</td>").toString());
				        
			        out.print("</tr>");
			    } while (rs.next());
	
			    out.print("</table>");
		    }
			else
			{
				out.print("Δεν έχετε κανένα ραντεβού");
			}
		    //hyperlinks που επιστρέφουν στις προηγούμενες σελίδες
		    out.println("<br><br><br><a href=\"/doctors_online/patient.jsp\">Πίσω</a>");
		    ps.close();			
			con.close();//τερματισμός σύνδεσης με τη βάση	
		}
		catch(SQLException sqle) //αν δεν γίνει σωστά η σύνδεση με τη βάση
		{
			sqle.printStackTrace();
		}
		
	}
	private void showInfo(String username, HttpServletResponse response) throws IOException 
	{// δημιουργία dynamic web page η οποία εμφανίζει τα στοιχεία του συνδεδεμένου χρήστη
				
		response.setContentType("text/html; charset=UTF-8");
		response.setCharacterEncoding("UTF-8");
		response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate"); // HTTP 1.1.
		response.setHeader("Pragma", "no-cache"); // HTTP 1.0.
		if (username == null) {response.sendRedirect("index.html");}
		
		PrintWriter out = response.getWriter();
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");//css
		try
		{//σύνδεση με τη βάση
			
			Connection con1 = datasource.getConnection();
			
			//δημιουργία instance της κλάσης patient
			Patient p = new Patient(0,"","","","");		
			
			//εκτέλεση του statement που βρίσκεται στην συνάρτηση showPatientInfo()
			//της κλάσης patient
		  	PreparedStatement ps1 = con1.prepareStatement(p.showPatientInfo());
		  	ps1.setString(1, username);
			ResultSet rs1 =ps1.executeQuery();
			
			if (rs1.next()) 
			{//εκτυπώνονται σε πίνακα τα στοιχεία του ασθενή
			    out.print("<table><tr><th>ΑΜΚΑ</th><th>Όνομα Χρήστη</th><th>Κωδικός</th><th>Όνομα</th><th>Επώνυμο</th></tr>");
	
			    do {
			        out.print("<tr>");
			        out.print(new StringBuilder("<td>").append(rs1.getObject("amka")).append("</td>").toString());
			 
			        out.print(new StringBuilder("<td>").append(rs1.getObject("username")).append("</td>").toString());
			     
			        out.print(new StringBuilder("<td>").append(rs1.getObject("password")).append("</td>").toString());
			       
			        out.print(new StringBuilder("<td>").append(rs1.getObject("name")).append("</td>").toString());
			       
			        out.print(new StringBuilder("<td>").append(rs1.getObject("surname")).append("</td>").toString());			        
			        out.print("</tr>");
			    } while (rs1.next());
	
			    out.print("</table>");
			    out.println("<a href=\"/doctors_online/patient.jsp\">Πίσω</a>");//link
			    ps1.close();			
				con1.close();
			}
		}
		catch(SQLException sqle) //exception
		{
			sqle.printStackTrace();
		}
	}
	private void appointment(String username, String action,HttpServletRequest request, HttpServletResponse response) throws IOException 
	{//συνάρτηση που εισάγει ή διαγράφει ραντεβού ανάλογα με την τιμή του action (specialty,name,delete)
	
		if(action=="specialty"||action=="name")
		{
			String apsel1="";
			if (action == "specialty" )//νέο ραντεβού με ειδικότητα - επιλέχθηκε στο select
			{
				 apsel1 = request.getParameter("appointselect");				
			}
			else if (action == "name")//νέο ραντεβού με γιατρό-επιλέχθηκε στο select
			{
				 apsel1 = request.getParameter("appointselect1");
			}	
			try
			{//σύνδεση με τη βάση
				
				Connection con = datasource.getConnection();
				
				Patient p1 = new Patient(0,"","","","");
				
				//εκτέλεση statement που υπάρχει στη συνάρτηση της κλάσης
				//patient, appointment(), για το κλείσιμο του ραντεβού με το γιατρό
			
				PreparedStatement s = con.prepareStatement(p1.appointment());
				
				s.setString(1,username);
				s.setInt(2,Integer.parseInt(apsel1));
					    
			    int exe = s.executeUpdate();
			    if(exe>0)
			    {//αν το statement εκτελέστηκε σωστά
			    	createDynamicPage("Κλείσατε επιτυχώς το ραντεβού",response);
			    }
			    else 
			    {//αν κάτι πήγε στραβά
			    	createDynamicPage("Λυπούμαστε, κάτι πήγε στραβά!",response);
			    }			    
			    s.close();	
				con.close();
			}
			catch(SQLException sqle) 
			{
				sqle.printStackTrace();
			}
		}
		else//action=delete/διαγραφή ραντεβού με id που εισήγαγε ο ασθενής στο txt input
		{
			String apid = request.getParameter("apid");			
			int iex1 = 0;
			try //έλεγχος για integer στο πεδίο amka
			{
				iex1 = Integer.parseInt(apid);
			}
			catch(Exception e)
			{
				e.printStackTrace();
			}			
			try
			{//σύνδεση με τη βάση
				
				Connection con = datasource.getConnection();
				
				Patient p1 = new Patient(0,"","","","");
				
				//εκτέλεση statement που υπάρχει στη συνάρτηση της κλάσης
				//patient, cancelAppointment(), για διαγραφή του ραντεβού
				PreparedStatement s = con.prepareStatement(p1.cancelAppointment());
				
				s.setString(1,username);
				s.setInt(2,iex1);
					    
			    int exe = s.executeUpdate();
			    if(exe>0)
			    {//αν το statement εκτελέστηκε σωστά
			    	createDynamicPage("Το ραντεβού ακυρώθηκε επιτυχώς",response);
			    }
			    else 
			    {//αν κάτι πήγε στραβά
			    	createDynamicPage("Λυπούμαστε, κάτι πήγε στραβά!",response);
			    }			    
			    s.close();	
				con.close();
			}
			catch(SQLException sqle) 
			{
				sqle.printStackTrace();
			}
		}
	}
}
	

