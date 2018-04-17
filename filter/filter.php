<?php
include 'Client.php';

interface Criteria {
    public function getClient();
    public function favAddress();
}

class Favorites implements Criteria {
    
    private $vars = array();
    
    public function getClient()
    {
        $name = getName();
        $addr = getAddressId();
        $addr_array = array();
        array_push($addr_array, $addr);
        
        return addr_array;
        
    };
    
    public function favAddress()
    {
        $fav_list = array();
        $addr_array = getClient();
        
        for ($addr in $addr_array):
        {
            if count($addr > 5):
            {
              array_push($fav_list, $addr)  
            };
        };
        
        return $fav_list;
        
    };
    
    
};

?>