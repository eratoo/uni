package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

import javax.naming.InitialContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.sql.DataSource;

import classes.Admin;

@WebServlet("/RegisterDoctorServlet")
public class RegisterDoctorServlet extends HttpServlet {
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
   
    public RegisterDoctorServlet() {
        super();
    }

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.setContentType("text/html; charset=UTF-8");
		request.setCharacterEncoding("UTF-8");
		response.setCharacterEncoding("UTF-8");
		
		//��������� �� String ��� ��������� ��� �������� � �������
		String specialty = request.getParameter("specialty");
		String username = request.getParameter("username");
		String password = request.getParameter("password");
		String name = request.getParameter("name");
		String surname = request.getParameter("surname");
		
		if(specialty!="" && username!="" && password!="" && name!="" && surname !="")
		{//�� ��� �� ����� ����� ������������
			try
			{//������� �� �� ����
				
				Connection con = datasource.getConnection();
				
				Admin a = new Admin("","","","");
				
				//�������� statement ��� ������� ��� ��������� ��� ������
				//Admin, newDoctor(), ��� �������� ��� ������ ��� ����
			  	PreparedStatement insertDoctor = con.prepareStatement(a.newDoctor());
			  	insertDoctor.setString(1,specialty);
			  	insertDoctor.setString(2, username);
			  	insertDoctor.setString(3, password);
			  	insertDoctor.setString(4, name);
			  	insertDoctor.setString(5, surname);
				   
					    
			    int exe = insertDoctor.executeUpdate();
			    if(exe>0)
			    {//�� �� statement ����������� �����
			    	createDynamicPage("������������, � ������� ������� �������� ��� ������� !",response);
			    }
			    else 
			    {//�� ���� ���� ������
			    	createDynamicPage("����������, ���� ���� ������!",response);
			    }			    
			    insertDoctor.close();			
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
		out.println("<p>" + message + "</p>");//�������� ���������
		out.println("<a href=\"/doctors_online/admin.jsp\">����</a><br>");
		out.println("</body></html>");	
	}

}
