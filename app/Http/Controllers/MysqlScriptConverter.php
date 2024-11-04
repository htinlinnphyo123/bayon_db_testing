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
        for($i=0;$i<=count($datas)-1;$i++){
            $result = $this->convertKeyAndValue($datas[$i]);
            $arrays[] = $result;
        } 
        return $arrays;
    }

    public function limit($number=100)
    {
        // Path to your NDJSON file
        $path = resource_path($this->path);

        $datas = $this->getDecodedArrayAfterFileReading($path);
        $datas = array_reverse($datas);
        $arrays = [];
        for($i=0;$i<=$number;$i++){
            $result = $this->convertKeyAndValue($datas[$i]);
            $arrays[] = $result;
        } 
        return $arrays;
    }

    public function findById(string $id)
    {
        $path = resource_path($this->path);
        $datas = $this->getDecodedArrayAfterFileReading($path);
        foreach($datas as $key=>$data){
            if(isset($data['_id']) && $data['_id']===$id){
                // return $data;
                return $key;
            }
            $result = $this->convertKeyAndValue($data);
            if($result['id']==$id){
                return $result;
            };
        } 
    }

    public function getFirst()
    {
        $path = resource_path($this->path);

        $datas = $this->getDecodedArrayAfterFileReading($path);
        foreach($datas as $data){
            $result = $this->convertKeyAndValue($data);
            return $result;
        }   
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

    public function camelToSnakeCase($camelCase) { 
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

    public function convertKeyAndValue(array $array)
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
                $convertedArray[$newKey] = $this->cleanGeolocation($value);
            } elseif($key==='latLng') {
                $convertedArray[$newKey] = $this->cleanLatLanininMeasuringArea($value);              
            } elseif($key==='initialCameraPosition') {
                $convertedArray[$newKey] = $this->cleanInitialCameraPosition($value);
            } elseif($key==='_id' && is_array($value)) {
                $convertedArray[$newKey] = $value['$oid'];
            }elseif (is_array($value)) {
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
        if(array_key_exists('$old',$data)){
            return $data['$old'];
        }
        foreach ($data as $key => &$value) {
            if ($key==='$numberInt') {
                $test = (int) $value;
            } elseif ($key==='$numberDouble') {
                $test = (float) $value;
            } else {
                $test[] = $value;
            }
        }
        return json_encode($test);
    }

    protected function cleanPosition($data)
    {
        $array = [];
        if (isset($data['lat']['$numberDouble']) && isset($data['lng']['$numberDouble'])) {
            $array = [
                'lat' => (string) $data['lat']['$numberDouble'],
                'lng' => (string) $data['lng']['$numberDouble']
            ];
        }
        return json_encode($array);  // Return as-is if structure is different
    }

    protected function cleanGeolocation($data)
    {
        $array = [];
        if (isset($data['coordinates'][0]['$numberDouble']) && isset($data['coordinates'][1]['$numberDouble'])) {
            $array = [
                'lng' => (float) $data['coordinates'][0]['$numberDouble'], 
                'lat' => (float) $data['coordinates'][1]['$numberDouble'] 
            ];
        }
        return json_encode($array);  // Return as-is if structure is different
    }

    protected function cleanLatLanininMeasuringArea($data)
    {
        $array = [];
        foreach($data as $d){
            if (isset($d['lat']['$numberDouble']) && isset($d['lng']['$numberDouble'])) {
                $array[] = [
                    'lat' => (float) $d['lat']['$numberDouble'],  // Longitude
                    'lng' => (float) $d['lng']['$numberDouble']   // Latitude
                ];
            }
        }
        
        return json_encode($array);  // Return as-is if structure is different
    }

    protected function cleanInitialCameraPosition($data)
    {
        $array = [];
        if (isset($data[0]['lat']['$numberDouble']) && isset($data[0]['lng']['$numberDouble'])) {
            $array = [
                'lat' => (string) $data[0]['lat']['$numberDouble'],
                'lng' => (string) $data[0]['lng']['$numberDouble']
            ];
        }
        return json_encode($array);  
    }

}
