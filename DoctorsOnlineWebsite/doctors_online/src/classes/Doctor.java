package classes;

public class Doctor extends Users
{
	private String specialty;
	
	//________CONSTRUCTOR________//
	public Doctor(String specialty, String username, String password, String name, String surname)
	{
		super(username, password, name, surname);
		setSpecialty(specialty);
	}	
	//________GETTERS&SETTERS________//
	public String getSpecialty()
	{
		return specialty;
	}	
	public void setSpecialty(String specialty)
	{
		this.specialty = specialty;
	}
	//________METHODS________//	
	public String setAvailability() // kataxwrisi diathesimotitas iatru ana mina
	{
		String availStm = "INSERT INTO appointments (doctor,patient,date,time) VALUES (?,'null',?,?)";
		return(availStm);
	}
	public String showAgenda() //provoli programmatos radevu
	{
		String showApStatement = "SELECT * FROM appointments WHERE doctor = ? and patient != 'null'";
		return(showApStatement);
	}
	public String cancelAppointment() //akyrwsi radevu
	{
		String cancelStm;

			cancelStm ="delete from appointments where doctor= ? and id = ?";

		return(cancelStm);
	}
	public String showDoctorInfo() //emfanisi stoixeiwn giatrou
	{
		String showStatement = "SELECT * FROM doctors WHERE username = ?";
		return(showStatement);
	}
}
