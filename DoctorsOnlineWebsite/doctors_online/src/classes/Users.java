package classes;

public class Users 
{	
	private String username;
	private String password; //type password?
	private String name;
	private String surname;
	
	static int usersCounter=0;
	
	//________CONSTRUCTOR________//
	public Users(String username, String password, String name, String surname)
	{
		setUsername(username);
		setPassword(password);
		setName(name); 
		setSurname(surname);
		usersCounter += usersCounter;
	}	
	//________GETTERS&SETTERS________//
	public String getUsername()
	{
		return username;
	}
	public void setUsername(String username)
	{
		this.username = username;
	}
	public String getPassword() //?
	{
		return password;
	}
	public void setPassword(String password) //??
	{
		this.password = password;
	}
	public String getName()
	{
		return name;
	}
	public void setName(String name)
	{
		this.name = name;
	}
	public String getSurname()
	{
		return surname;
	}
	public void setSurname(String surname)
	{
		this.surname = surname;
	}	
	//________METHODS________//
	public void login()
	{
		System.out.println("you have logged in successfully!!");

	}
	public void logout()
	{
		System.out.println("you have logged out!!");
	}
}
