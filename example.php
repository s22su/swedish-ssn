<?php
require 'SwedishSSN.php';

$SSN = new SwedishSSN();

$generatedSSN = $SSN->generate();
$isValid = $SSN->validate($generatedSSN);

echo '<b>Generated SSN:</b> '.$generatedSSN;
echo '<br><br>';
echo '<b>Generated SSN is:</b> ';
if($isValid) {
  echo '<span style="color: green">valid</span>';
}
else {
  echo '<span style="color: red">invalid</span>';
}
