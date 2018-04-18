import static org.junit.Assert.assertTrue;

import java.io.File;

import org.junit.Test;

import com.github.theotteraaron.cst438groupproject.config.Configuration;

public class TestConfiguration {

	/*These tests should be updated in the future for coverage if more
	  of the configuration library is used.
	*/
	@Test
	public void testConfig()
	{
		Configuration config = Configuration.load(new File("test.yml"));
		//Load the configuration
		assertTrue(config.hasPath("string"));
		//Checking to see if the path string exists
		assertTrue(!config.hasPath("doesnotexist"));
		//Check to see if the path "doesnotexists" does not exist
		assertTrue(config.getString("string").equals("somestring"));
		//Check to see if the string key is "somestring"
		assertTrue(config.getInt("int") == 999);
		//Check if the int key is 999
	}
}