package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.naming.InitialContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.sql.DataSource;
import classes.Admin;

@WebServlet("/AdminServlet")
public class AdminServlet extends HttpServlet {
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
    public AdminServlet() {
        super();
    }
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.setContentType("text/html; charset=UTF-8");
		request.setCharacterEncoding("UTF-8");
		response.setCharacterEncoding("UTF-8");
		
		String keep = (String)request.getSession().getAttribute("user");//ανάκτηση ονόματος χρήστη από το session
		String menu = request.getParameter("admin"); //η επιλογή του διαχειριστή σε String
        //ανάλογα με την επιλογή εκτελείται και διαφορετικό κομμάτι κώδικα
        if ("Εισαγωγή νέου ιατρού στο σύστημα".equals(menu)){
			response.sendRedirect("insert_doctor.html"); //οδήγηση στη σελίδα για register γιατρού
		}
        else if ("Διαγραφή ιατρού από το σύστημα".equals(menu))
        {        	
    		String doc = request.getParameter("doctor");		
			if(doc!= "") //αν το πεδίο δεν είναι κενό διαγραφή του γιατρού που εισήγαγε ο διαχειριστής
			{
    			try
    			{//σύνδεση με τη βάση    				
    				Connection con = datasource.getConnection();    				
    				Admin a = new Admin("","","","");
    				//εκτέλεση statement με τη βοήθεια της συνάρτησης removeDoctor() 
    				//της κλάσης Admin
    			  	PreparedStatement DeleteDoctor = con.prepareStatement(a.removeDoctor());
    			    DeleteDoctor.setString(1, doc);      					    
    			    int exe = DeleteDoctor.executeUpdate();
    			    if(exe>0)
    			    {//αν το statement εκτελέστηκε σωστά τύπωση μηνύματος 
    			    	createDynamicPage("Ο ιατρός διαγράφηκε επιτυχώς!",response);
    			    	response.sendRedirect("admin.jsp");
    			    }
    			    else 
    			    {//αν κάτι πήγε στραβά τύπωση μηνύματος 
    			    	createDynamicPage("Λυπούμαστε, κάτι πήγε στραβά!",response);
    			    }	    			    		
    				con.close();
    			}
    			catch(SQLException sqle) 
    			{
    				sqle.printStackTrace();
    			}
			}
			else 
			{
				createDynamicPage("Δεν υπάρχει ιατρός με αυτό το όνομα χρήστη",response);
			}			
		}
        else if ("Τα στοιχεία μου".equals(menu))//αν έχει επιλεγεί η εμφάνιση των στοιχείων του διαχειριστή
        {
        	showInfo(keep, response);
        }
        else
        {
        	request.getSession().removeAttribute("user");
			request.getSession().invalidate();
			response.sendRedirect("index.html");
        }		
	}
	private void showInfo(String username, HttpServletResponse response) throws IOException 
	{// δημιουργία dynamic web page η οποία εμφανίζει τα στοιχεία του συνδεδεμένου χρήστη
		response.setContentType("text/html; charset=UTF-8");
		response.setCharacterEncoding("UTF-8");
		response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate"); // HTTP 1.1.
		response.setHeader("Pragma", "no-cache"); // HTTP 1.0.
		
		PrintWriter out = response.getWriter();
		if (username == null) {response.sendRedirect("index.html");}
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");//css
		try
		{//σύνδεση με τη βάση
			
			Connection con1 = datasource.getConnection();			
			//δημιουργία instance της κλάσης patient
			Admin a1 = new Admin("","","","");		
			
			//εκτέλεση του statement που βρίσκεται στην συνάρτηση showPatientInfo()
			//της κλάσης patient
		  	PreparedStatement ps1 = con1.prepareStatement(a1.showAdminInfo());
		  	ps1.setString(1, username);
			ResultSet rs1 =ps1.executeQuery();
			
			if (rs1.next()) {//εκτυπώνονται σε πίνακα τα στοιχεία του διαχειριστή
			    out.print("<table><tr><th>Όνομα Χρήστη</th><th>Κωδικός</th><th>Όνομα</th><th>Επώνυμο</th></tr>");
			    do {
			        out.print("<tr>");
			        out.print(new StringBuilder("<td>").append(rs1.getObject("username")).append("</td>").toString());
			        out.print(new StringBuilder("<td>").append(rs1.getObject("password")).append("</td>").toString());
			        out.print(new StringBuilder("<td>").append(rs1.getObject("name")).append("</td>").toString());
			        out.print(new StringBuilder("<td>").append(rs1.getObject("surname")).append("</td>").toString());			        
			        out.print("</tr>");
			    } while (rs1.next());
			    out.print("</table>");
			    out.println("<a href=\"/doctors_online/admin.jsp\">Πίσω</a>");//link
			    ps1.close();			
				con1.close();
			}
		}
		catch(SQLException sqle) //exception
		{
			sqle.printStackTrace();
		}
	}
	private void createDynamicPage(String message, HttpServletResponse response) throws IOException 
	{// δημιουργία dynamic web page η οποία εμφανίζει κάποιο μήνυμα
		response.setContentType("text/html; charset=UTF-8");
		response.setCharacterEncoding("UTF-8");
		response.setHeader("Cache-Control","no-cache"); //HTTP 1.1
		response.setHeader("Pragma","no-cache"); //HTTP 1.0
		response.setDateHeader ("Expires", 0); //prevents caching at the proxy server
		
		PrintWriter out = response.getWriter();
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");

		//εμφάνιση μηνύματος
		out.println("<html>");
		out.println("<head><title>Message</title></head>");
		out.println("<body>");
		out.println("<p>" + message + "</p>");
		
		//hyperlink
		out.println("<a href=\"/doctors_online/admin.jsp\">Πίσω</a><br>");
		out.println("</body></html>");	
	}
}
