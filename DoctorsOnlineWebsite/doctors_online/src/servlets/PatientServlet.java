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
    public PatientServlet() {
        super();
    }
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
    }
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
	// ��������� ��� �� ���������� post ��� servlet
		
		response.setContentType("text/html; charset=UTF-8");
		request.setCharacterEncoding("UTF-8");
		response.setCharacterEncoding("UTF-8");

		String keep = (String)request.getSession().getAttribute("user");//�������� �������� ������ ��� �� session
	
		String menu = request.getParameter("chose"); 
		//menu: ������� ��� ������ (��� ��� �� ������� ����� submit �� ����� chose)
		//������� �� �� ������ ��� ������ � ������� �������� ������ ��������� ��� �� 
		//����������� � ��������
        if ("�������� �� ������ �����������".equals(menu))
        {
			appointment(keep,"specialty",request,response);			
		}
        else if ("�������� �� ������".equals(menu))
        {        	
        	appointment(keep,"name",request,response);
		}

        else if  ("������� ��������".equals(menu))
        {
        	appointment(keep,"delete",request,response);
		}
        else if ("�� �������� ���".equals(menu)){
        	showAppointments(keep,request,response);
		}
        else if ("�� �������� ���".equals(menu))
        {
        	showInfo(keep,response);
        }
        else //�� ���� ������� �� ������ ��� logout
        {
			request.getSession().removeAttribute("user");
			request.getSession().invalidate();
			response.sendRedirect("index.html");
        }
	}
	private void createDynamicPage(String message, HttpServletResponse response) throws IOException 
	{// ���������� dynamic web page � ����� ��������� ������ ������
		
		response.setContentType("text/html; charset=UTF-8");
		response.setCharacterEncoding("UTF-8");
		PrintWriter out = response.getWriter();
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");

		//�������� ���������
		out.println("<html>");
		out.println("<head><title>Message</title></head>");
		out.println("<body>");
		out.println("<p>" + message + "</p>");
		
		response.setHeader("Cache-Control","no-cache"); //HTTP 1.1
		response.setHeader("Pragma","no-cache"); //HTTP 1.0
		response.setDateHeader ("Expires", 0); //prevents caching at the proxy server	
		out.println("<br><br><br><a href=\"/doctors_online/patient.jsp\">����</a>");
		out.println("</body></html>");	
	}
	private void showAppointments(String username, HttpServletRequest request, HttpServletResponse response) throws IOException 
	{// ���������� dynamic web page � ����� ��������� �� �������� ��� ������������ ������
		
		response.setContentType("text/html; charset=UTF-8");
		response.setCharacterEncoding("UTF-8");
		response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate"); // HTTP 1.1.
		response.setHeader("Pragma", "no-cache"); // HTTP 1.0.
		if (username == null) {response.sendRedirect("index.html");}
				
		PrintWriter out = response.getWriter();
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");//css
		
		try
		{//������� �� �� ����
			
			Connection con = datasource.getConnection();
			Patient p = new Patient(0,"","","","");		
		  	PreparedStatement ps = con.prepareStatement(p.showAppointments());
		  	ps.setString(1, username);
			ResultSet rs =ps.executeQuery();
		
			if (rs.next()) 
			{
				//��������� ���� ������� �� �� �������� ��� ������
			    out.print("<table><tr><th>ID</th><th>�������</th><th>����������</th><th>���</th></tr>");
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
				out.print("��� ����� ������ ��������");
			}
		    //hyperlinks ��� ����������� ���� ������������ �������
		    out.println("<br><br><br><a href=\"/doctors_online/patient.jsp\">����</a>");
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
		if (username == null) {response.sendRedirect("index.html");}
		
		PrintWriter out = response.getWriter();
		out.print("<div><h1>DOCTORS ONLINE</h1></div>");
		out.println("<link rel='stylesheet' type='text/css' href='/doctors_online/css.css' />");//css
		try
		{//������� �� �� ����
			
			Connection con1 = datasource.getConnection();
			
			//���������� instance ��� ������ patient
			Patient p = new Patient(0,"","","","");		
			
			//�������� ��� statement ��� ��������� ���� ��������� showPatientInfo()
			//��� ������ patient
		  	PreparedStatement ps1 = con1.prepareStatement(p.showPatientInfo());
		  	ps1.setString(1, username);
			ResultSet rs1 =ps1.executeQuery();
			
			if (rs1.next()) 
			{//������������ �� ������ �� �������� ��� ������
			    out.print("<table><tr><th>����</th><th>����� ������</th><th>�������</th><th>�����</th><th>�������</th></tr>");
	
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
			    out.println("<a href=\"/doctors_online/patient.jsp\">����</a>");//link
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
	{//��������� ��� ������� � ��������� �������� ������� �� ��� ���� ��� action (specialty,name,delete)
	
		if(action=="specialty"||action=="name")
		{
			String apsel1="";
			if (action == "specialty" )//��� �������� �� ���������� - ���������� ��� select
			{
				 apsel1 = request.getParameter("appointselect");				
			}
			else if (action == "name")//��� �������� �� ������-���������� ��� select
			{
				 apsel1 = request.getParameter("appointselect1");
			}	
			try
			{//������� �� �� ����
				
				Connection con = datasource.getConnection();
				
				Patient p1 = new Patient(0,"","","","");
				
				//�������� statement ��� ������� ��� ��������� ��� ������
				//patient, appointment(), ��� �� �������� ��� �������� �� �� ������
			
				PreparedStatement s = con.prepareStatement(p1.appointment());
				
				s.setString(1,username);
				s.setInt(2,Integer.parseInt(apsel1));
					    
			    int exe = s.executeUpdate();
			    if(exe>0)
			    {//�� �� statement ����������� �����
			    	createDynamicPage("�������� �������� �� ��������",response);
			    }
			    else 
			    {//�� ���� ���� ������
			    	createDynamicPage("����������, ���� ���� ������!",response);
			    }			    
			    s.close();	
				con.close();
			}
			catch(SQLException sqle) 
			{
				sqle.printStackTrace();
			}
		}
		else//action=delete/�������� �������� �� id ��� �������� � ������� ��� txt input
		{
			String apid = request.getParameter("apid");			
			int iex1 = 0;
			try //������� ��� integer ��� ����� amka
			{
				iex1 = Integer.parseInt(apid);
			}
			catch(Exception e)
			{
				e.printStackTrace();
			}			
			try
			{//������� �� �� ����
				
				Connection con = datasource.getConnection();
				
				Patient p1 = new Patient(0,"","","","");
				
				//�������� statement ��� ������� ��� ��������� ��� ������
				//patient, cancelAppointment(), ��� �������� ��� ��������
				PreparedStatement s = con.prepareStatement(p1.cancelAppointment());
				
				s.setString(1,username);
				s.setInt(2,iex1);
					    
			    int exe = s.executeUpdate();
			    if(exe>0)
			    {//�� �� statement ����������� �����
			    	createDynamicPage("�� �������� ��������� ��������",response);
			    }
			    else 
			    {//�� ���� ���� ������
			    	createDynamicPage("����������, ���� ���� ������!",response);
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
	

