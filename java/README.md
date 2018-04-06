# Usage
Create a file named `config.yml` in the same directory as the jar file.

Example config.yml
```
api-key: "key" #Google maps api key
port: 9999 #Port to run spark server on
path: "/mapsapi" #Path of api
````

Configure the configuration file, above is an example. 

All fields besides `api-key` are optional.

Then run the appropriate run file for your platform.

Windows should run `run.bat` and OSX and Linux should run the `run.sh`.

The server should run on `localhost` and bind to port `4567`.

Here is an example run `http://localhost:4567/mapsapi?origin=%22Disneyland%20Park%22&destination=%22Fisherman%27s%20Wharf,%20San%20Francisco,%20CA%22`
