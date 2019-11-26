package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
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


@WebServlet({"/RegisterPatientServlet", "/doctors_online/WebContent/insert_patient.html" })
public class RegisterPatientServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
	private DataSource datasource = null;
	public void init() throws ServletException
	{		
		try //καθορισμός στοιχείων για τη βάση
		{	
			InitialContext ctx = new InitialContext();
			datasource = (DataSource)ctx.lookup("java:comp/env/jdbc/LiveDataSource");
		} 
		catch(Exception e) 
		{
			throw new ServletException(e.toString());
		}
	}
    public RegisterPatientServlet() 
    {
    	super();
    }
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException 
	{	
		response.setContentType("text/html; charset=UTF-8");
		request.setCharacterEncoding("UTF-8");
		response.setCharacterEncoding("UTF-8");
		
		//μετατροπή σε String τω στοιχείων που εισήγαγε ο χρήστης
		String amka = request.getParameter("amka");
		String username = request.getParameter("username");
		String password = request.getParameter("password");
		String name = request.getParameter("name");
		String surname = request.getParameter("surname");
		
		if(amka!="" && username!="" && password!="" && name!="" && surname !="")
		{//αν όλα τα πεδία είναι συμπληρωμένα
			
			int iex1 = 0;
			try //έλεγχος για integer στο πεδίο amka
			{
				iex1 = Integer.parseInt(amka);
			}
			catch(Exception e)
			{
				e.printStackTrace();
			}
			try
			{//σύνδεση με τη βάση
				
				Connection con = datasource.getConnection();
				
				Patient p = new Patient(iex1,username,password,name,surname);
				
				//εκτέλεση statement που υπάρχει στη συνάρτηση της κλάσης
				//patient, register(), για εισαγωγή του χρήστη στη βάση
			  	PreparedStatement insertPatient = con.prepareStatement(p.register());
			  	insertPatient.setInt(1,Integer.parseInt(amka));
			  	insertPatient.setString(2, username);
			  	insertPatient.setString(3, password);
			  	insertPatient.setString(4, name);
			    insertPatient.setString(5, surname);
				   
					    
			    int exe = insertPatient.executeUpdate();
			    if(exe>0)
			    {//αν το statement εκτελέστηκε σωστά
			    	createDynamicPage("Συγχαρητήρια, συνδεθήκατε επιτυχώς!",response);
			    }
			    else 
			    {//αν κάτι πήγε στραβά
			    	createDynamicPage("Λυπούμαστε, κάτι πήγε στραβά με τη σύνδεσή σας!",response);
			    }			    
			    insertPatient.close();			
				con.close();
			}
			catch(SQLException sqle) 
			{
				sqle.printStackTrace();
			}			
		}		
		else
		{//αν δεν έχουν συμπληρωθεί όλα τα πεδία 
			createDynamicPage("Δεν συμπληρώσατε όλα τα πεδία",response);
		}
	}
	private void createDynamicPage(String message, HttpServletResponse response) throws IOException 
	{//συνάρτηση δημιουργίας dynamic web page η οποία καλείται σε διάφορα σημεία του κώδικα 
		//για την εμφάνιση του κατάλληλου μηνύματος κάθε φορά
		response.setHeader("Cache-Control","no-cache"); //HTTP 1.1
		response.setHeader("Pragma","no-cache"); //HTTP 1.0
		response.setDateHeader ("Expires", 0); //prevents caching at the proxy server		
		response.setContentType("text/html; charset=UTF-8");
		response.setCharacterEncoding("UTF-8");		
		
		PrintWriter out = response.getWriter();
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");

		out.println("<html>");
		out.println("<head><title>Register</title></head>");
		out.println("<body>");
		out.println("<p>" + message + "</p>");
		out.println("<a href=\"/doctors_online/index.html\">Επιστροφή στην αρχική σελίδα</a>");
		out.println("</body></html>");	
	}


}