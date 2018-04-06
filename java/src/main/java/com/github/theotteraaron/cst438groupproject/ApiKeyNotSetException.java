package com.github.theotteraaron.cst438groupproject;

public class ApiKeyNotSetException extends Exception {

	/**
	 * 
	 */
	private static final long serialVersionUID = -7063196174180422687L;


	public ApiKeyNotSetException()
	{
		super("Api key is not set for SparkBuilder, exiting...");
	}
}