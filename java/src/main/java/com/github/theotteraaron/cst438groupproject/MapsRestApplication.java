package com.github.theotteraaron.cst438groupproject;

import java.io.File;

import com.github.theotteraaron.cst438groupproject.config.Configuration;

public class MapsRestApplication  {
	
	public static File configFile = new File("config.yml");
	public static void main(String[] args)
	{
		try 
		{
			MapsRestApplication.createFromConfig().build();
		} 
		catch (ApiKeyNotSetException e) 
		{
			e.printStackTrace();
		}
	}
	
	public static SparkBuilder createFromConfig()
	{
		if(!configFile.exists())
		{
			System.out.println("Please make a config.yml, see the github repo for documentation");
			System.exit(1);
		}
		
		Configuration config = Configuration.load(configFile);
		String apiKey = null;
		if(config.hasPath("api-key"))
		{
			apiKey = config.getString("api-key");
		}
		
		Integer port = 4567;
		if(config.hasPath("port"))
		{
			port = config.getInt("port");
		}
		
		String path = "/mapsapi";
		if(config.hasPath("path"))
		{
			path = config.getString("path");
		}
		
		return new SparkBuilder().apiKey(apiKey)
			.path(path)
			.port(port);
	}
}