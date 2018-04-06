package com.github.theotteraaron.cst438groupproject;

import java.io.IOException;

import com.google.maps.DirectionsApi;
import com.google.maps.DirectionsApiRequest;
import com.google.maps.GeoApiContext;
import com.google.maps.errors.ApiException;
import com.google.maps.model.DirectionsLeg;
import com.google.maps.model.DirectionsResult;
import com.google.maps.model.DirectionsRoute;

import spark.Spark;

public class SparkBuilder {

	private String path = null;
	private Integer port = null;
	private String apiKey = null;
	
	public SparkBuilder path(String path)
	{
		this.path = path;
		return this;
	}
	
	public SparkBuilder port(int port)
	{
		this.port = port;
		return this;
	}
	
	public SparkBuilder apiKey(String apiKey)
	{
		this.apiKey = apiKey;
		return this;
	}

	public void build() throws ApiKeyNotSetException
	{
		if(this.apiKey == null)
		{
			throw new ApiKeyNotSetException();
		}

		if(this.port != null)
		{
			Spark.port(this.port);
		}

		if(this.path == null)
		{
			this.path = "/mapsapi";
		}

		String apiKey = this.apiKey;
		this.apiKey = null; //Set local api key to null
		Spark.get(this.path, (req, res) -> 
		{
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