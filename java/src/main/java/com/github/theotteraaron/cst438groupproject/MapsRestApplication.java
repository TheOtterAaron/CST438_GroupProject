package com.github.theotteraaron.cst438groupproject;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;

import com.google.maps.DirectionsApi;
import com.google.maps.DirectionsApiRequest;
import com.google.maps.GeoApiContext;
import com.google.maps.errors.ApiException;
import com.google.maps.model.DirectionsLeg;
import com.google.maps.model.DirectionsResult;
import com.google.maps.model.DirectionsRoute;

import spark.Spark;

public class MapsRestApplication  {
	
	public static void main(String[] args)
	{
		createSparkInstance();
	}
	
	private static String getApiKey()
	{
		File apiKeyFile = new File("apikey.txt");
		if(!apiKeyFile.exists())
		{
			try 
			{
				apiKeyFile.createNewFile();
				System.out.println("Put your api key in the apikey.txt file");
				System.exit(0);
				return null;
			} 
			catch (IOException e) 
			{
				e.printStackTrace();
			}
		}
		try 
		{
			BufferedReader reader = new BufferedReader(new FileReader(apiKeyFile));
			String apiKey = reader.readLine();
			reader.close();
			if(apiKey == null)
			{
				System.out.println("Put your api key in the apikey.txt file");
				System.exit(0);
			}
			return apiKey;
		} 
		catch (IOException e) 
		{
			e.printStackTrace();
		}
		return null;
	}
	
	public static void createSparkInstance()
	{
			final String apiKey = MapsRestApplication.getApiKey();
			Spark.get("/mapsapi", (req, res) -> {
			String origin = req.queryParams("origin");
			String destination = req.queryParams("destination");
			GeoApiContext context = new GeoApiContext.Builder()
					.apiKey(apiKey)
					.build();
			try 
			{
				DirectionsApiRequest request = DirectionsApi.getDirections(context, origin, destination);
				DirectionsResult result = request.await();
				if(result.routes.length == 0)
				{
					return -1;
				}
				DirectionsRoute route = result.routes[0];
				Long meters = 0L;
				for(DirectionsLeg leg : route.legs)
				{
					meters += leg.distance.inMeters;
				}
				return meters / 1609.34; //Return distance in miles
			} 
			catch (ApiException | InterruptedException | IOException e) 
			{
				e.printStackTrace();
			}
			return -1;
		});
	}
}