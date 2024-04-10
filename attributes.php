<?php

error_reporting(E_ALL);

ini_set('display_errors', 1);

require_once('student.php');
require_once('letter_grade.php');

// Create students array
$students = array();

// Create student objects and add them to the array
$students[] = new Student("John", "Doe", "1234", array("CPSC-130" => 85, "CPSC-140" => 92, "CPSC-231" => 78));
$students[] = new Student("Jamer", "Whacton", "6543", array("CPSC-130" => 34, "CPSC-121" => 2, "CPSC-222" => 91));
$students[] = new Student("Bob", "Johnson", "9876", array("CPSC-205" => 75, "CPSC-322" => 82, "CPSC-333" => 79));

// Print the HTML header
echo "<!DOCTYPE html>\n";
echo "<html>\n";
echo "<head>\n";
echo "<h1>Chapters 5-6</h1>\n";
echo "<style>";
echo "</style>";
echo "</head>\n";
echo "<body>\n";

// Print student details
foreach ($students as $student) {
    echo "<table border='1'>";
    echo "<tr><td><b><center>Name:</center </b></td><td>" . $student->getLastName() . ", " . $student->getFirstName() . "</td></tr>";
    echo "<tr><td><b><center>Student ID:</center></b></td><td>" . $student->getStudentID() . "</td></tr>";
    echo "<tr><td><b><center>Grades:</center></b></td><td>";

    echo "<ul>";
    foreach ($student->getCourses() as $course => $grade) {
        echo "<li>$course - $grade% " . calculateLetterGrade($grade) . "</li>";
    }
    echo "</ul>";

    echo "</td></tr>";
    echo "</table>";
    echo "<br>";
}

echo "</body>\n"; echo "</html>";
?>
