package classes;

public class Admin extends Users
{		
	//________CONSTRUCTOR________//
	public Admin(String username, String password, String name, String surname)	
	{
		super(username, password, name, surname);	
	}
	//________METHODS________//
	public String newDoctor() // eisagwgi neu giatru sto systima
	{

		String insertDoctorStatement = "INSERT INTO doctors (specialty, username, password, name, surname) VALUES (?,?,?,?,?)";
		return(insertDoctorStatement);
	}
	public String removeDoctor() // diagrafi giatru apo to systima
	{
		String deleteDoctorStatement ="delete from doctors where username = ?";
		return(deleteDoctorStatement);
	}
	public String showAdminInfo() //emfanisi stoixeiwn admin
	{
		String showAdminStatement = "SELECT * FROM admins WHERE username = ?";
		return(showAdminStatement);
	}
}





