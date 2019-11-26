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
    public DoctorServlet() {
        super();
    }
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.setContentType("text/html; charset=UTF-8");
		request.setCharacterEncoding("UTF-8");
		response.setCharacterEncoding("UTF-8");

		String keep = (String)request.getSession().getAttribute("user");//�������� �������� ������ ��� session

		String menu = request.getParameter("doctor"); //������� ��� ������ �� String
        //������� �� ��� ������� ���������� ����������� ������� ������
        if ("������ ��������������".equals(menu)){
			availability(keep, request,response);
		}
        else if ("������� ��������".equals(menu))
        {
        	cancel(keep,request,response);
		}
        else if ("�� �������� ���".equals(menu)){
        	showAppointments(keep,response);
		}
        else if ("�� �������� ���".equals(menu))
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
	{ //��������� ��� ������� �� ��������� ���������� ��� ��� ��� �������� � ������� 
		//���� ������ appointments ��  ������ = "null" ( �������� � ������� �� ����� �������� ���
		//� ���� "null" �� �������������� ��� �� ����� ������ ��� ������)
		
		String date = request.getParameter("����������");//��/��� ��� ��� ��� �������� � �������
		String time = request.getParameter("���");
		try
		{//������� �� �� ����
			
			Connection con = datasource.getConnection();
			Doctor d = new Doctor("","","","","");
			
			//�������� statement ��� ������� ��� ��������� ��� ������
			//doctor, setAvailability(), ��� �������� ��� ���������� ���� ��� ����
		
			PreparedStatement norcStm = con.prepareStatement(d.setAvailability());
			norcStm.setString(1,user);
			norcStm.setString(2, date);
			norcStm.setString(3, time);
		    int exe = norcStm.executeUpdate();
		    if(exe>0)
		    {//�� �� statement ����������� �����
		    	createDynamicPage("� ��������� ��� ������� ��������",response);
		    }
		    else 
		    {//�� ���� ���� ������
		    	createDynamicPage("����������, ���� ���� ������ �� �� ������� ���!",response);
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
	{ //��������� � ����� ��������������� ��� ������� ��������
		response.setHeader("Cache-Control","no-cache"); //HTTP 1.1
		response.setHeader("Pragma","no-cache"); //HTTP 1.0
		response.setDateHeader ("Expires", 0); //prevents caching at the proxy server
		
		String idr = request.getParameter("ID��������"); //�������� ����� ��� �������� � ������� 
		try
		{//������� �� �� ����			
			Connection con = datasource.getConnection();
			Doctor d = new Doctor("","","","","");
			
			//�������� statement ��� ������� ��� ��������� ��� ������
			//doctor, cancelAppointment(), ��� �������� ��� ��������
			PreparedStatement norcStm = con.prepareStatement(d.cancelAppointment());
			norcStm.setString(1,user);
			norcStm.setString(2, idr);
		    int exe = norcStm.executeUpdate();
		    if(exe>0)
		    {//�� �� statement ����������� �����
		    	createDynamicPage("�� �������� ��������� ��������",response);
		    }
		    else 
		    {//�� ���� ���� ������
		    	createDynamicPage("����������, ���� ���� ������ �� �� ������� ���!",response);
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
		out.println("<p>" + message + "</p>"); //�������� ��������� 
		out.println("<a href=\"/doctors_online/doctor.jsp\">����</a>");
		out.println("</body></html>");	
	}
	private void showAppointments(String username, HttpServletResponse response) throws IOException 
	{// ���������� dynamic web page � ����� ��������� �� �������� ��� ������������ ������
		
		response.setContentType("text/html; charset=UTF-8");
		response.setCharacterEncoding("UTF-8");
		response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate"); // HTTP 1.1.
		response.setHeader("Pragma", "no-cache"); // HTTP 1.0.
		
		if (username == null) {response.sendRedirect("index.html");}
		PrintWriter out = response.getWriter();
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");
		try
		{//������� �� �� ����
			Connection con = datasource.getConnection();
			Doctor d = new Doctor("","","","","");		
			//sql statement ��� ������������ �� String ��� ������ Doctor ��� ���������� showAgenda()
			//��� �������� ��� �������� 
		  	PreparedStatement ps = con.prepareStatement(d.showAgenda());
		  	ps.setString(1, username);
			ResultSet rs =ps.executeQuery();			
			if (rs.next()) {
				//�� �������� �������� ���������� �� ��� ������
			    out.print("<table><tr><th>ID</th><th>�������</th><th>����������</th><th>���</th></tr>");
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
			{//�� ��� �������� �������� ��������� ������
				out.print("��� ����� ���������������� ��������");
			}
		    //hyperlinks ��� ����������� ���� ������������ �������
		    out.println("<br><br><a href=\"/doctors_online/doctor.jsp\">����</a>");
		    ps.close();			
			con.close();//����������� �������� �� �� ����
		}
		catch(SQLException sqle) //�� ��� ����� ����� � ������� �� �� ����
		{
			sqle.printStackTrace();
		}
	}
	private void showInfo(String username, HttpServletResponse response) throws IOException 
	{// ���������� dynamic web page � ����� ��������� �� �������� ��� ������������ ������
		
		response.setContentType("text/html; charset=UTF-8");
		response.setCharacterEncoding("UTF-8");		
		response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate"); // HTTP 1.1.
		response.setHeader("Pragma", "no-cache"); // HTTP 1.0.
		
		if (username == null) {response.sendRedirect("index.html");} //�� �� username ����� null
		//� ������� ��� ����� ������������ ��� ��������� ��� index.html
		PrintWriter out = response.getWriter();
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");//css
		try
		{//������� �� �� ����
			Connection con1 = datasource.getConnection();			
			//���������� instance ��� ������ doctor
			Doctor d1 = new Doctor("","","","","");		
			
			//�������� ��� statement ��� ��������� ���� ��������� showDoctorInfo()
			//��� ������ Doctor
		  	PreparedStatement ps1 = con1.prepareStatement(d1.showDoctorInfo());
		  	ps1.setString(1, username);
			ResultSet rs1 =ps1.executeQuery();
			if (rs1.next()) {//������������ �� ������ �� �������� ��� �������
			    out.print("<table><tr><th>����������</th><th>����� ������</th><th>�������</th><th>�����</th><th>�������</th></tr>");
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
			    out.println("<a href=\"/doctors_online/doctor.jsp\">����</a>");//link
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


