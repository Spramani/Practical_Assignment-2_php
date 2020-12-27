<?php

/** create XML file */ 
$mysqli = new mysqli("localhost", "root", "root", "phppract");

/* check connection */
if ($mysqli->connect_errno) {

   echo "Connect failed ".$mysqli->connect_error;

   exit();
}

$query = "SELECT sid, name, standard, address FROM student";

$studentArray = array();

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {

       array_push($studentArray, $row);
    }
  
    if(count($studentArray)){

         createXMLfile($studentArray);

     }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();

function createXMLfile($studentArray){
  
   $filePath = 'Student1.xml';

   $dom     = new DOMDocument('1.0', 'utf-8'); 

   $root      = $dom->createElement('books'); 

   for($i=0; $i<count($studentArray); $i++){
     
     $studentId        =  $studentArray[$i]['sid'];  

     $studentName = htmlspecialchars($studentArray[$i]['name']);

     $studentStandard    =  $studentArray[$i]['standard']; 

     $studentAddress     =  $studentArray[$i]['address']; 

     $student = $dom->createElement('student');

     $student->setAttribute('id', $studentId);

     $name     = $dom->createElement('name', $studentName); 

     $student->appendChild($name); 

     $standard   = $dom->createElement('standard', $studentStandard); 

     $student->appendChild($standard); 

     $address    = $dom->createElement('address', $studentAddress); 

     $student->appendChild($address); 

   }

   $dom->appendChild($root); 

   $dom->save($filePath); 

 } 