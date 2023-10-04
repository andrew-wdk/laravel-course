<?php
function separateStringToLetters($inputString) {
    return str_split($inputString);
}

// Example usage:
$inputString = "Hello";
$lettersArray = separateStringToLetters($inputString);

print_r($lettersArray);