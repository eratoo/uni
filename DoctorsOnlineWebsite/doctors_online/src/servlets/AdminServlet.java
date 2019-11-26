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
		try //���������� ��� ��������� ��� �� ����
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
		
		String keep = (String)request.getSession().getAttribute("user");//�������� �������� ������ ��� �� session
		String menu = request.getParameter("admin"); //� ������� ��� ����������� �� String
        //������� �� ��� ������� ���������� ��� ����������� ������� ������
        if ("�������� ���� ������ ��� �������".equals(menu)){
			response.sendRedirect("insert_doctor.html"); //������� ��� ������ ��� register �������
		}
        else if ("�������� ������ ��� �� �������".equals(menu))
        {        	
    		String doc = request.getParameter("doctor");		
			if(doc!= "") //�� �� ����� ��� ����� ���� �������� ��� ������� ��� �������� � ������������
			{
    			try
    			{//������� �� �� ����    				
    				Connection con = datasource.getConnection();    				
    				Admin a = new Admin("","","","");
    				//�������� statement �� �� ������� ��� ���������� removeDoctor() 
    				//��� ������ Admin
    			  	PreparedStatement DeleteDoctor = con.prepareStatement(a.removeDoctor());
    			    DeleteDoctor.setString(1, doc);      					    
    			    int exe = DeleteDoctor.executeUpdate();
    			    if(exe>0)
    			    {//�� �� statement ����������� ����� ������ ��������� 
    			    	createDynamicPage("� ������ ���������� ��������!",response);
    			    	response.sendRedirect("admin.jsp");
    			    }
    			    else 
    			    {//�� ���� ���� ������ ������ ��������� 
    			    	createDynamicPage("����������, ���� ���� ������!",response);
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
				createDynamicPage("��� ������� ������ �� ���� �� ����� ������",response);
			}			
		}
        else if ("�� �������� ���".equals(menu))//�� ���� �������� � �������� ��� ��������� ��� �����������
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
	{// ���������� dynamic web page � ����� ��������� �� �������� ��� ������������ ������
		response.setContentType("text/html; charset=UTF-8");
		response.setCharacterEncoding("UTF-8");
		response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate"); // HTTP 1.1.
		response.setHeader("Pragma", "no-cache"); // HTTP 1.0.
		
		PrintWriter out = response.getWriter();
		if (username == null) {response.sendRedirect("index.html");}
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");//css
		try
		{//������� �� �� ����
			
			Connection con1 = datasource.getConnection();			
			//���������� instance ��� ������ patient
			Admin a1 = new Admin("","","","");		
			
			//�������� ��� statement ��� ��������� ���� ��������� showPatientInfo()
			//��� ������ patient
		  	PreparedStatement ps1 = con1.prepareStatement(a1.showAdminInfo());
		  	ps1.setString(1, username);
			ResultSet rs1 =ps1.executeQuery();
			
			if (rs1.next()) {//������������ �� ������ �� �������� ��� �����������
			    out.print("<table><tr><th>����� ������</th><th>�������</th><th>�����</th><th>�������</th></tr>");
			    do {
			        out.print("<tr>");
			        out.print(new StringBuilder("<td>").append(rs1.getObject("username")).append("</td>").toString());
			        out.print(new StringBuilder("<td>").append(rs1.getObject("password")).append("</td>").toString());
			        out.print(new StringBuilder("<td>").append(rs1.getObject("name")).append("</td>").toString());
			        out.print(new StringBuilder("<td>").append(rs1.getObject("surname")).append("</td>").toString());			        
			        out.print("</tr>");
			    } while (rs1.next());
			    out.print("</table>");
			    out.println("<a href=\"/doctors_online/admin.jsp\">����</a>");//link
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
	{// ���������� dynamic web page � ����� ��������� ������ ������
		response.setContentType("text/html; charset=UTF-8");
		response.setCharacterEncoding("UTF-8");
		response.setHeader("Cache-Control","no-cache"); //HTTP 1.1
		response.setHeader("Pragma","no-cache"); //HTTP 1.0
		response.setDateHeader ("Expires", 0); //prevents caching at the proxy server
		
		PrintWriter out = response.getWriter();
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");

		//�������� ���������
		out.println("<html>");
		out.println("<head><title>Message</title></head>");
		out.println("<body>");
		out.println("<p>" + message + "</p>");
		
		//hyperlink
		out.println("<a href=\"/doctors_online/admin.jsp\">����</a><br>");
		out.println("</body></html>");	
	}
}
