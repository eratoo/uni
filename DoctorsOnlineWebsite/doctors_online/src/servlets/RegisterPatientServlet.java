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
		try //���������� ��������� ��� �� ����
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
		
		//��������� �� String �� ��������� ��� �������� � �������
		String amka = request.getParameter("amka");
		String username = request.getParameter("username");
		String password = request.getParameter("password");
		String name = request.getParameter("name");
		String surname = request.getParameter("surname");
		
		if(amka!="" && username!="" && password!="" && name!="" && surname !="")
		{//�� ��� �� ����� ����� ������������
			
			int iex1 = 0;
			try //������� ��� integer ��� ����� amka
			{
				iex1 = Integer.parseInt(amka);
			}
			catch(Exception e)
			{
				e.printStackTrace();
			}
			try
			{//������� �� �� ����
				
				Connection con = datasource.getConnection();
				
				Patient p = new Patient(iex1,username,password,name,surname);
				
				//�������� statement ��� ������� ��� ��������� ��� ������
				//patient, register(), ��� �������� ��� ������ ��� ����
			  	PreparedStatement insertPatient = con.prepareStatement(p.register());
			  	insertPatient.setInt(1,Integer.parseInt(amka));
			  	insertPatient.setString(2, username);
			  	insertPatient.setString(3, password);
			  	insertPatient.setString(4, name);
			    insertPatient.setString(5, surname);
				   
					    
			    int exe = insertPatient.executeUpdate();
			    if(exe>0)
			    {//�� �� statement ����������� �����
			    	createDynamicPage("������������, ����������� ��������!",response);
			    }
			    else 
			    {//�� ���� ���� ������
			    	createDynamicPage("����������, ���� ���� ������ �� �� ������� ���!",response);
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
		{//�� ��� ����� ����������� ��� �� ����� 
			createDynamicPage("��� ������������ ��� �� �����",response);
		}
	}
	private void createDynamicPage(String message, HttpServletResponse response) throws IOException 
	{//��������� ����������� dynamic web page � ����� �������� �� ������� ������ ��� ������ 
		//��� ��� �������� ��� ���������� ��������� ���� ����
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
		out.println("<a href=\"/doctors_online/index.html\">��������� ���� ������ ������</a>");
		out.println("</body></html>");	
	}


}