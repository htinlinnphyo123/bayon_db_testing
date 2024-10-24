<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MysqlScriptConverter extends Controller
{
    public string $path;
    public function __construct($path)
    {
        $this->path = $path;
    }
    public function generate()
    {
        // Path to your NDJSON file
        $path = resource_path($this->path);

        $datas = $this->getDecodedArrayAfterFileReading($path);
        $arrays = [];
        foreach($datas as $data){
            // dd($data);
            $result = $this->convertKeyAndValue($data);
            // $keys = array_keys($result);
            $arrays[] = $result;
        }   
        return $arrays;
    }

    protected function getDecodedArrayAfterFileReading($inputFile)
    {
        $array = [];
        // Open the file for reading
        $fileHandle = fopen($inputFile, 'r');

        if ($fileHandle) {
            // Loop through each line of the file
            while (($line = fgets($fileHandle)) !== false) {
                // Preprocess the line to fix BSON types
                $fixedLine = $this->fixBsonTypes($line);
                
                // Decode the JSON line
                $decodedData = json_decode($fixedLine, true);
                $array[] = $decodedData;
            }

            // Close the file when done
            fclose($fileHandle);

            return $array;
        } else {
            // Error opening the file
            echo "Unable to open the file.";
        }
    }
    
    protected function fixBsonTypes($json) 
    {
        // Replace "$oid" with "id"
        $json = preg_replace('/"id"\s*:/', '"other_id":', $json);
        $json = preg_replace('/"_id"\s*:\s*"(.*?)"/', '"id": "$1"', $json);
    
        $json = preg_replace('/"createdUser"\s*:/', '"created_by":', $json);
        $json = preg_replace('/"updatedUser"\s*:/', '"updated_by":', $json);
        $json = preg_replace('/"createdAt"\s*:/', '"created_at":', $json);
        $json = preg_replace('/"updatedAt"\s*:/', '"updated_at":', $json);
        // Replace "$date" with a standard datetime format
        // Match "$date": {"$numberLong": "1234567890"} and convert it
        $json = preg_replace_callback(
            '/\{\s*"\$date"\s*:\s*\{\s*"\$numberLong"\s*:\s*"(.*?)"\s*\}\s*\}/',
            function($matches) {
                // Convert the timestamp (in milliseconds) to a valid datetime format
                $timestamp = $matches[1] / 1000;
                return '"' . date('Y-m-d H:i:s', $timestamp) . '"';
            },
            $json
        );
    
        return $json;
    }

    function camelToSnakeCase($camelCase) { 
        $result = ''; 
        for ($i = 0; $i < strlen($camelCase); $i++) { 
            $char = $camelCase[$i]; 
    
            if (ctype_upper($char)) { 
                $result .= '_' . strtolower($char); 
            } else { 
                $result .= $char; 
            } 
        } 
    
        return ltrim($result, '_'); 
    }

    protected function convertKeyAndValue(array $array)
    {
        $convertedArray = [];

        foreach ($array as $key => $value) {
            // Convert key from camel case to snake case
            // dd($key);
            $newKey = $this->camelToSnakeCase($key);
            if ($key === 'position') {
                // Specifically handle the 'position' field
                $convertedArray[$key] = $this->cleanPosition($value);
            } elseif($key==='geolocation') {
                $convertedArray[$key] = $this->cleanGeolocation($value);
            } elseif (is_array($value)) {
                // Recursively clean any nested arrays
                $convertedArray[$newKey] = $this->cleanMongoDBTypes($value);
            } else {
                // Add non-array values directly
                if($value===true){
                    $value = 1;
                }else if($value===false){
                    $value = 0;
                }
                $convertedArray[$newKey] = $value;
            }
        }

        return $convertedArray;
    }

    protected function cleanMongoDBTypes($data)
    {
        $test = [];
        foreach ($data as $key => &$value) {
            if ($key==='$numberDouble' || $key==='$numberInt') {
                $test = $value;
            } else {
                $test[] = $value;
            }
        }
        return $test;
    }

    protected function cleanPosition($data)
    {
        if (isset($data['lat']['$numberDouble']) && isset($data['lng']['$numberDouble'])) {
            return [
                'lat' => (string) $data['lat']['$numberDouble'],
                'lng' => (string) $data['lng']['$numberDouble']
            ];
        }
        return $data;  // Return as-is if structure is different
    }

    protected function cleanGeolocation($data)
    {
        if (isset($data['coordinates'][0]['$numberDouble']) && isset($data['coordinates'][1]['$numberDouble'])) {
            return [
                'lat' => (float) $data['coordinates'][0]['$numberDouble'],  // Longitude
                'lon' => (float) $data['coordinates'][1]['$numberDouble']   // Latitude
            ];
        }
        return $data;  // Return as-is if structure is different
    }

}
