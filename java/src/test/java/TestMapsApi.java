
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
		
		try 
		{
			StringBuilder sb = new StringBuilder();
			sb.append("?origin=");
			sb.append(URLEncoder.encode("Disneyland Park", "UTF-8"));
			sb.append("&destination=");
			sb.append(URLEncoder.encode("Fisherman's Wharf, San Francisco, CA", "UTF-8"));
			URL url = new URL("http://localhost:" + port + path + sb.toString());
			HttpURLConnection con = (HttpURLConnection) url.openConnection();
			con.setRequestMethod("GET");
	
			BufferedReader reader = new BufferedReader(new InputStreamReader(con.getInputStream()));
			String line = reader.readLine();
			assertTrue("Output from the server was null", line != null);
			assertTrue("Output was not a number", isDouble(line));
			Long num = Math.round(Double.parseDouble(line));
			assertTrue("Addresses provided caused an issue", num != -1);
			System.out.println("Miles were: " + num);
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
			Double.parseDouble(num);
			return true;
		}
		catch(NumberFormatException ex)
		{
			return false;
		}
	}
}