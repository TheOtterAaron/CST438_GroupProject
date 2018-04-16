package com.github.theotteraaron.cst438groupproject.config;

import java.io.File;
import java.nio.file.Path;

import lombok.NonNull;
import lombok.SneakyThrows;

import ninja.leaping.configurate.ConfigurationNode;
import ninja.leaping.configurate.loader.ConfigurationLoader;
import ninja.leaping.configurate.yaml.YAMLConfigurationLoader;

public class Configuration extends ConfigurationSection {

	@SneakyThrows(Exception.class)
	public static Configuration load(@NonNull File file)
	{
		Configuration config = new Configuration();
		ConfigurationNode node = null;
		String name = file.getName().toLowerCase();
		
		if(name.endsWith(".yml"))
		{
			ConfigurationLoader<ConfigurationNode> loader = YAMLConfigurationLoader.builder().setFile(file).build();
			node = loader.load();
		}
		else
		{
			throw new UnknownFileTypeException(file);
		}
		
		config.node = node;
		return config;
	}
	
	public static Configuration load(@NonNull Path path)
	{
		return load(path.toFile());
	}
}