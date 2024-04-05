<?php

function calculateLetterGrade($numericGrade) {
    if ($numericGrade >= 90) {
        return 'A';
    } elseif ($numericGrade >= 80) {
        return 'B';
    } elseif ($numericGrade >= 70) {
        return 'C';
    } elseif ($numericGrade >= 60) {
        return 'D';
    } else {
        return 'F';
    }
}

?>
