package classes;

public class Patient extends Users
{
	private int AMKA; //didetai 1 fora !!// ...
	
	//________CONSTRUCTOR________//
	public Patient(int amka, String username, String password, String name, String surname)
	{
		super(username, password, name, surname);
		setAMKA(amka);		
	}
	
	//________GETTERS&SETTERS________//
	public int getAMKA()
	{
		return AMKA;
	}	
	public void setAMKA(int AMKA)
	{
		this.AMKA = AMKA;
	}
	//________METHODS________//
	public String register() //eggrafi asthenus
	{
		
		String insertPatientStatement = "INSERT INTO patients (amka, username, password, name, surname) VALUES (?,?,?,?,?)";
		return(insertPatientStatement);
		
		
	}
	public String appointment() //neo radevu
	{		
		String appStm = "update appointments set patient =  ? where id = ?";
		return(appStm);
	}
	public String cancelAppointment() //akyrwsi radevu
	{
		String docAppStm = "update appointments set patient= 'null' where patient= ? and id = ?";
		return(docAppStm);
	}
	public String showAppointments() //provoli radevu
	{
		String showAoointmentsStatement = "SELECT * FROM appointments WHERE patient = ?";
		return(showAoointmentsStatement);
	}
	public void showTreatmentHistory()//provoli istoriku radevu
	{
		System.out.println("you have no appointment history yet!\n");
	}
	public String showPatientInfo()//provoli stoixeiwn asthenus
	{
		String showPatientStatement = "SELECT * FROM patients WHERE username = ?";
		return(showPatientStatement);
	}
	
}
