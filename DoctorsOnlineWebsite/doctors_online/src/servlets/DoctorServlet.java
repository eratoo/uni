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

import classes.Doctor;

@WebServlet("/DoctorServlet")
public class DoctorServlet extends HttpServlet {
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
    public DoctorServlet() {
        super();
    }
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.setContentType("text/html; charset=UTF-8");
		request.setCharacterEncoding("UTF-8");
		response.setCharacterEncoding("UTF-8");

		String keep = (String)request.getSession().getAttribute("user");//ανάκτηση ονόματος χρήστη του session

		String menu = request.getParameter("doctor"); //επιλογή του χρήστη σε String
        //ανάλογα με την επιλογή εκτελείται διαφορετικό κομμάτι κώδικα
        if ("Δήλωση διαθεσιμότητας".equals(menu)){
			availability(keep, request,response);
		}
        else if ("Ακύρωση ραντεβού".equals(menu))
        {
        	cancel(keep,request,response);
		}
        else if ("Τα ραντεβού μου".equals(menu)){
        	showAppointments(keep,response);
		}
        else if ("Τα στοιχεία μου".equals(menu))
        {
        	showInfo(keep,response);
        }
        else
        {
			request.getSession().removeAttribute("user");
			request.getSession().invalidate();
			response.sendRedirect("index.html");
        }
	}
	void availability (String user, HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException
	{ //συνάρτηση που εισάγει τη διαθέσιμη ημερομηνία και ώρα που εισήγαγε ο γιατρός 
		//στον πίνακα appointments με  ασθενή = "null" ( αργότερα η εγγραφή θα γίνει ραντεβού και
		//η τιμή "null" θα αντικατασταθεί από το όνομα χρήστη του ασθενή)
		
		String date = request.getParameter("Ημερομηνία");//ημ/νία και ώρα που εισήγαγε ο γιατρός
		String time = request.getParameter("Ώρα");
		try
		{//σύνδεση με τη βάση
			
			Connection con = datasource.getConnection();
			Doctor d = new Doctor("","","","","");
			
			//εκτέλεση statement που υπάρχει στη συνάρτηση της κλάσης
			//doctor, setAvailability(), για εισαγωγή της διαθέσιμης ώρας στη βάση
		
			PreparedStatement norcStm = con.prepareStatement(d.setAvailability());
			norcStm.setString(1,user);
			norcStm.setString(2, date);
			norcStm.setString(3, time);
		    int exe = norcStm.executeUpdate();
		    if(exe>0)
		    {//αν το statement εκτελέστηκε σωστά
		    	createDynamicPage("Η διαθέσιμη ώρα εισήχθη επιτυχώς",response);
		    }
		    else 
		    {//αν κάτι πήγε στραβά
		    	createDynamicPage("Λυπούμαστε, κάτι πήγε στραβά με τη σύνδεσή σας!",response);
		    }			    
		    norcStm.close();
			con.close();
		}
		catch(SQLException sqle) 
		{
			sqle.printStackTrace();
		}
	}	
	void cancel (String user, HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException
	{ //συνάρτηση η οποία χρησιμοποιείται για ακύρωση ραντεβού
		response.setHeader("Cache-Control","no-cache"); //HTTP 1.1
		response.setHeader("Pragma","no-cache"); //HTTP 1.0
		response.setDateHeader ("Expires", 0); //prevents caching at the proxy server
		
		String idr = request.getParameter("IDραντεβού"); //ανάκτηση τιμής που εισήγαγε ο χρήστης 
		try
		{//σύνδεση με τη βάση			
			Connection con = datasource.getConnection();
			Doctor d = new Doctor("","","","","");
			
			//εκτέλεση statement που υπάρχει στη συνάρτηση της κλάσης
			//doctor, cancelAppointment(), για διαγραφή του ραντεβού
			PreparedStatement norcStm = con.prepareStatement(d.cancelAppointment());
			norcStm.setString(1,user);
			norcStm.setString(2, idr);
		    int exe = norcStm.executeUpdate();
		    if(exe>0)
		    {//αν το statement εκτελέστηκε σωστά
		    	createDynamicPage("Το ραντεβού ακυρώθηκε επιτυχώς",response);
		    }
		    else 
		    {//αν κάτι πήγε στραβά
		    	createDynamicPage("Λυπούμαστε, κάτι πήγε στραβά με τη σύνδεσή σας!",response);
		    }			    
		    norcStm.close();
			con.close();
		}
		catch(SQLException sqle) 
		{
			sqle.printStackTrace();
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
		out.println("<p>" + message + "</p>"); //εμφάνιση μηνύματος 
		out.println("<a href=\"/doctors_online/doctor.jsp\">Πίσω</a>");
		out.println("</body></html>");	
	}
	private void showAppointments(String username, HttpServletResponse response) throws IOException 
	{// δημιουργία dynamic web page η οποία εμφανίζει τα ραντεβού του συνδεδεμένου χρήστη
		
		response.setContentType("text/html; charset=UTF-8");
		response.setCharacterEncoding("UTF-8");
		response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate"); // HTTP 1.1.
		response.setHeader("Pragma", "no-cache"); // HTTP 1.0.
		
		if (username == null) {response.sendRedirect("index.html");}
		PrintWriter out = response.getWriter();
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");
		try
		{//σύνδεση με τη βάση
			Connection con = datasource.getConnection();
			Doctor d = new Doctor("","","","","");		
			//sql statement που χρησιμοποιεί το String της κλάσης Doctor της συνάρτησης showAgenda()
			//για εμφάνιση των ραντεβού 
		  	PreparedStatement ps = con.prepareStatement(d.showAgenda());
		  	ps.setString(1, username);
			ResultSet rs =ps.executeQuery();			
			if (rs.next()) {
				//αν υπάρχουν ραντεβού τυπώνονται σε ένα πίνακα
			    out.print("<table><tr><th>ID</th><th>Ασθενής</th><th>Ημερομηνία</th><th>Ώρα</th></tr>");
			    do {
			        out.print("<tr>");
			        out.print(new StringBuilder("<td>").append(rs.getObject("id")).append("</td>").toString());
			        out.print(new StringBuilder("<td>").append(rs.getObject("patient")).append("</td>").toString());
			        out.print(new StringBuilder("<td>").append(rs.getObject("date")).append("</td>").toString());
			        out.print(new StringBuilder("<td>").append(rs.getObject("time")).append("</td>").toString());
			        out.print("</tr>");
			    } while (rs.next());
			    out.print("</table>");
			}
			else
			{//αν δεν υπάρχουν ραντεβού τυπώνεται μήνυμα
				out.print("Δεν έχετε προγραμματισμένα ραντεβού");
			}
		    //hyperlinks που επιστρέφουν στις προηγούμενες σελίδες
		    out.println("<br><br><a href=\"/doctors_online/doctor.jsp\">Πίσω</a>");
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
		
		if (username == null) {response.sendRedirect("index.html");} //αν το username ειναι null
		//ο χρήστης δεν είναι συνδεδεμένος άρα οδηγείται στο index.html
		PrintWriter out = response.getWriter();
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");//css
		try
		{//σύνδεση με τη βάση
			Connection con1 = datasource.getConnection();			
			//δημιουργία instance της κλάσης doctor
			Doctor d1 = new Doctor("","","","","");		
			
			//εκτέλεση του statement που βρίσκεται στην συνάρτηση showDoctorInfo()
			//της κλάσης Doctor
		  	PreparedStatement ps1 = con1.prepareStatement(d1.showDoctorInfo());
		  	ps1.setString(1, username);
			ResultSet rs1 =ps1.executeQuery();
			if (rs1.next()) {//εκτυπώνονται σε πίνακα τα στοιχεία του γιατρού
			    out.print("<table><tr><th>Ειδικότητα</th><th>Όνομα Χρήστη</th><th>Κωδικός</th><th>Όνομα</th><th>Επώνυμο</th></tr>");
			    do {
			        out.print("<tr>");
			        out.print(new StringBuilder("<td>").append(rs1.getObject("specialty")).append("</td>").toString());
			        out.print(new StringBuilder("<td>").append(rs1.getObject("username")).append("</td>").toString());
 			        out.print(new StringBuilder("<td>").append(rs1.getObject("password")).append("</td>").toString());
 			        out.print(new StringBuilder("<td>").append(rs1.getObject("name")).append("</td>").toString());
 			        out.print(new StringBuilder("<td>").append(rs1.getObject("surname")).append("</td>").toString());			        
			        out.print("</tr>");
			    } while (rs1.next());
			    out.print("</table>");
			    out.println("<a href=\"/doctors_online/doctor.jsp\">Πίσω</a>");//link
			    ps1.close();			
				con1.close();
			}
		}
		catch(SQLException sqle) //exception
		{
			sqle.printStackTrace();
		}
	}
}


