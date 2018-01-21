<?php

/** 
 * @author Chun2Ming
 * 
 */
class CsvParser
{
    public function __construct()
    {
    }
        
    //returns a 2D array with all the information in the CSV file. Probably O(n^2)
    function parseFile($fileName){
        $twoDArray = array();
        if (($file = fopen($fileName, "r")) != FALSE){
            while(($data = fgetcsv($file, 0, ",")) != FALSE){ //data is indexed array containing fields read
                array_push($twoDArray, $data); //pushes it as if array is a stack tho
            }
        }
        return $twoDArray;
    }
    
    function parseFileTest($fileName){
    	$twoDArray = array();
    	if (($file = fopen($fileName, "r")) != FALSE){
    		for($i = 0; $i<5 ; $i++){
	    		if(($data = fgetcsv($file, 0, ",")) != FALSE){ //data is indexed array containing fields read
	    			array_push($twoDArray, $data); //pushes it as if array is a stack tho
	    		}
    		}
    	}
    	return $twoDArray;
    }
    
    function parseFileToMapItem($fileName){
    	$array = array();
    	if (($file = fopen($fileName, "r")) != FALSE){
    		fgetcsv($file, 0, ",");
    		
	    	while(($data = fgetcsv($file, 0, ",")) != FALSE){ //data is indexed array containing fields read
	                
	                $item = new MapItem($data[0], $data[1], $data[5], $data[6], $data[12], $data[18], $data[19]);
	                array_push($array, $item); //pushes it as if array is a stack tho
	            }
    	}
    	return $array;
    }
}
?>
