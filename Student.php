<?php

class Student {
    private $firstName;
    private $lastName;
    private $studentID;
    private $courses = array();

    function __construct($firstName, $lastName, $studentID, $courses) {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setStudentID($studentID);
        $this->setCourses($courses);
    }
 
     function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

     function getFirstName() {
        return $this->firstName;
    }

     function setLastName($lastName) {
        $this->lastName = $lastName;
    }

     function getLastName() {
        return $this->lastName;
    }

     function setStudentID($studentID) {
        $this->studentID = $studentID;
    }

     function getStudentID() {
        return $this->studentID;
    }

     function setCourses($courses) {
        $this->courses = $courses;
    }

     function getCourses() {
        return $this->courses;
    }
}


?>
