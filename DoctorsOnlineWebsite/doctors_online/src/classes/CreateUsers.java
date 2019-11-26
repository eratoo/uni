package classes;

import java.io.*;
//import java.io.Console;
import java.util.*;

import classes.Admin;

public class CreateUsers 
{
	//________CONSTRUCTOR________//
	public CreateUsers()
	{
		
	}	
	//________SCANNER DECLARATION________//
	private static Scanner input = new Scanner(System.in);	
		
	//________MAIN________//
	public static void main(String[] args)
	{
		
		
		
		//________CLASS OBJECTS________//

		
		
		//________IMPORT FROM FILE(patient.txt)________// 		
		System.out.println("--------- IMPORT FROM FILE(patient.txt) ---------");
		try
		{
			FileInputStream fstream = new FileInputStream("patient.txt");
			DataInputStream in = new DataInputStream(fstream);
			BufferedReader br = new BufferedReader(new InputStreamReader(in));
			String strLine;
			while ((strLine = br.readLine()) != null)   
			{
				String[] tokens = strLine.split(" ");
				Patient txtPatient= new Patient(Integer.parseInt(tokens[0]), tokens[1], tokens[2], tokens[3], tokens[4]);//process record , etc
				System.out.println("... reading from patient.txt file ...");
				
			}
			br.close();
			in.close();			
			fstream.close();
		}catch (Exception e)
		{
			System.err.println("Error: " + e.getMessage());
		}	
				
		//________SCANNER:NEW PATIENT________// 
		boolean Error = true;
		  do {
		        try {
		    		System.out.println("--------- SCANNER:NEW PATIENT ---------");
		        	System.out.println("Give AMKA");
		    		int pamka = input.nextInt();
		    		input.nextLine();
		    		System.out.println("Give Username");
		    		String puser = input.nextLine();
		    		System.out.println("Give Password");
		    		String ppass = input.nextLine();
		    		System.out.println("Give Name");
		    		String pname = input.nextLine();
		    		System.out.println("Give Surname");
		    		String psur = input.nextLine();
		    		Patient pinput = new Patient(pamka,puser,ppass,pname,psur);
		    		
		    		System.out.println("--------- SCANNER:NEW DOCTOR ---------");
		    		System.out.println("Scanner for Doctor");
		    		System.out.println("Give specialty");
		    		String dspec = input.nextLine();
		    		System.out.println("Give Username");
		    		String duser = input.nextLine();
		    		System.out.println("Give Password");
		    		String dpass = input.nextLine();
		    		System.out.println("Give Name");
		    		String dname = input.nextLine();
		    		System.out.println("Give Surname \n\n");
		    		String dsur = input.nextLine();
		    		Doctor dinput = new Doctor(dspec,duser,dpass,dname,dsur);
		    		
		    		
		            Error = false;
		        } 
		        catch (Exception e) {
		            System.out.println("Error! Wrong input!");
		            input.reset();
		            input.next();
		        }
		    } while (Error);
	}	
}
