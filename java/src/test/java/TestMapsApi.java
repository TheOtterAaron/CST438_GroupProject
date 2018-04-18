
import static org.junit.Assert.assertTrue;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;

import org.junit.Test;

import com.github.theotteraaron.cst438groupproject.ApiKeyNotSetException;
import com.github.theotteraaron.cst438groupproject.MapsRestApplication;
import com.github.theotteraaron.cst438groupproject.config.Configuration;

public class TestMapsApi {

	/*
	 	User needs to provide configuration file
	 */
	
	@Test
	public void testRestApi()
	{
		//https://www.mkyong.com/webservices/jax-rs/restfull-java-client-with-java-net-url/
		try 
		{
			MapsRestApplication
			.createFromConfig()
			.build();
		} 
		catch (ApiKeyNotSetException ex) 
		{
			ex.printStackTrace();
		}
		
		//Load configuration from file
		Configuration config = Configuration.load(MapsRestApplication.configFile);
		Integer port = 4567;
		String path = "/mapsapi";
		
		if(config.hasPath("port"))
		{
			port = config.getInt("port");
		}
		
		if(config.hasPath("path"))
		{
			path = config.getString("path");
		}
		
		//Check config for values, if they exist set them
		
		try 
		{
			StringBuilder sb = new StringBuilder();
			sb.append("?origin=");
			sb.append(URLEncoder.encode("Disneyland Park", "UTF-8"));
			sb.append("&destination=");
			sb.append(URLEncoder.encode("Fisherman's Wharf, San Francisco, CA", "UTF-8"));
			//Build our query arguments
			//URL's have to be encoded to account for spaces etc
			URL url = new URL("http://localhost:" + port + path + sb.toString());
			HttpURLConnection con = (HttpURLConnection) url.openConnection();
			con.setRequestMethod("GET");
			//We will be sending a get request
			
			BufferedReader reader = new BufferedReader(new InputStreamReader(con.getInputStream()));
			String line = reader.readLine();
			assertTrue("Output from the server was null", line != null);
			//If line is null something happened when requesting
			assertTrue("Output was not a number", isDouble(line));
			//Check if the number is a double if not we can assume its not a number
			
			Long num = Math.round(Double.parseDouble(line));
			//Round the number to not have to account for floating point
			assertTrue("Addresses provided caused an issue", num != -1);
			//If number is -1 then the input was not correct
			System.out.println("Miles were: " + num);
			//Output of miles for debugging purposes, incase tests start failing unexpectedly
			//If this test fails it may be due to route changes
			assertTrue("Output was not 409 miles", num == 409); //Subject to change, check manually with google maps
		} 
		catch (IOException e) 
		{
			e.printStackTrace();
		}
		System.out.println("Tests passed");
	}

	public boolean isDouble(String num)
	{
		try
		{
			//Try to parse as a double
			Double.parseDouble(num);
			return true;
		}
		catch(NumberFormatException ex)
		{
			/*If a number format exception is thrown then
			  the input is likely not a number
			*/
			return false;
		}
	}
}