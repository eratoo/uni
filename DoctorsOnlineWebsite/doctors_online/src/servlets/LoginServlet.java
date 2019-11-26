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
import javax.servlet.http.HttpSession;
import javax.sql.DataSource;

import classes.Patient;

@WebServlet({ "/LoginServlet", "/doctors_online/WebContent/patient.jsp" })
public class LoginServlet extends HttpServlet {
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
    public LoginServlet() {
        super();
    }
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
    }
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException 
	{
		//η συνάρτηση που εκτελείται με την κλήση του servlet
		response.setContentType("text/html; charset=UTF-8");
		request.setCharacterEncoding("UTF-8");
		response.setCharacterEncoding("UTF-8");
		
		//μετατροπή σε String των στοιχείων που εισήγαγε ο χρήστης για είσοδο
		String username = request.getParameter("NameField");
		String password = request.getParameter("PasswordField");
		
		//createNullUser();
	
		//ανάλογα με ποιο κουμπί έχει πατήσει ο χρήστης κάνει :
		String submit = request.getParameter("submit");
        String usertype,link;
        if ("Είσοδος Ασθενή".equals(submit)){ //είσοδο ως ασθενής
			usertype = "p";
			link = "<a href='/doctors_online/patient.jsp'>Πήγαινε στο Home σου!</a><br>";
		}
        else if ("Είσοδος Ιατρού".equals(submit)){ //είσοδο ως γιατρός
        	usertype = "d";
        	link = "<a href='/doctors_online/doctor.jsp'>Πήγαινε στο Home σου!</a><br>";
		}
        else { //είσοδο ως διαχειριστής
        	usertype = "a";
        	link = "<a href='/doctors_online/admin.jsp'>Πήγαινε στο Home σου!</a><br>";
        }	
		if(checkUser(username,password,usertype,request)) //αν ο χρήστης υπάρχει στη βάση 
		{				
			//δημιουργία http session
			HttpSession session = request.getSession();
			String name = request.getParameter("NameField");
			session.setAttribute("user", name); //δημιουργία attribute που συγκρατεί 
			//το όνομα χρήστη που συνδέθηκε
			
			String keep = (String) session.getAttribute("user");//attribute to String			
			createDynamicPage("Καλωσήρθες " +keep,link, response);//εμφάνιση χαιρετισμού			
		}//αν ο χρήστης πληκτρολόγησε λάθος στοιχεία για σύνδεση
		else { createDynamicPage("Τα στοιχεία δεν είναι σωστά!","<a href=\"/doctors_online/index.html\">Πήγαινε στο Home!</a><br>", response); }
	}
	private void createDynamicPage(String message,String link, HttpServletResponse response) throws IOException 
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
		out.println(link);
		out.println("</body></html>");	
	}
	private boolean checkUser(String username,String password,String usertype,HttpServletRequest request) 
    {//συνάρτηση τύπου String που ελέγχει αν τα στοιχεία που εισήγαγε ο χρήστης είναι σωστά
		//και υπάρχει στη βάση
	    
		 boolean st =false;
	     try{//σύνδεση με τη βάση και εκτέλεση statement
	        Connection con= datasource.getConnection();
	        String query=null;
	        //ανάλογα με τον τύπο χρήστη το query αλλάζει
	        if (usertype == "p"){
				query ="select * from patients where username=? and password=?";
			}
	        else if (usertype == "d"){
	        	query ="select * from doctors where username=? and password=?";
			}
	        else { 
	        	query ="select * from admins where username=? and password=?";
	        }
	        PreparedStatement ps =con.prepareStatement(query);
	        ps.setString(1, username);
	        ps.setString(2, password);
	        ResultSet rs =ps.executeQuery();//εκτέλεση query
	        st = rs.next();	       
	     }catch(Exception e)
	     {
	         e.printStackTrace();
	     }
	        return st;  //επιστροφή αν υπάρχει ή οχι ο χρήστης (true , false)               
    }
	
	void createNullUser()
	{
		try
		{//σύνδεση με τη βάση
			
			Connection c = datasource.getConnection();
			
			 String query = "INSERT INTO patients (amka,username,password,name,surname)"
					 +" VALUES (0, 'null', 'null', 'null', 'null')" 
					+ "WHERE NOT EXISTS (SELECT username FROM patients WHERE username='null');";
		  	PreparedStatement s = c.prepareStatement(query);
				    
		    int exe = s.executeUpdate();
		    		    
		    s.close();			
			c.close();
		}
		catch(SQLException sqle) 
		{
			sqle.printStackTrace();
		}			
	}
}
