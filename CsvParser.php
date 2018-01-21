<?php

/** 
 * @author ChunMing
 * 
 */
class CsvParser
{

    // TODO - Insert your code here
    
    /**
     */
    
    public $csv = "OpenData/resource.txt";
    
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
}
?>
