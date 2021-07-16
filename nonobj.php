<?php
$roger = array("fullname" => "Roger Gerber",
    'room' => '4429NQ');
$young = array("familyname" => "Tam Briz",
 'givenname' => 'Young', 'room' => '3439NQ');

 function get_person_name($person){
     if( isset($person['fullname'])) return $person['fullname'];
     if (isset($person['familyname']) && isset($person['givenname']) ){
         return $person['givenname'].' '.$person['familyname'];
     }
     return false;
    }
    print get_person_name($roger). "\n";
    print get_person_name($young). "\n";