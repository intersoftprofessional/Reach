<?php
// Load the class
require_once('../USPSCityStateLookup.php');

// Initiate and set the username provided from usps
$verify = new USPSCityStateLookup('272REACH6842');

// During test mode this seems not to always work as expected
//$verify->setTestMode(true);

// Add the zip code we want to lookup the city and state
$verify->addZipCode('91730');
echo '<pre>';

// Perform the call and print out the results
print_r($verify->lookup());
echo '--<br>';
print_r($verify->getArrayResponse());
echo '--<br>';
// Check if it was completed
if($verify->isSuccess()) {
  echo 'Done';
} else {
  echo 'Error: ' . $verify->getErrorMessage();
}
