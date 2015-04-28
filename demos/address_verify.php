<?php

// Load the class
require_once('../USPSAddressVerify.php');
// Initiate and set the username provided from usps
$verify = new USPSAddressVerify('272REACH6842');

// During test mode this seems not to always work as expected
//$verify->setTestMode(true);

// Create new address object and assign the properties
// apartently the order you assign them is important so make sure
// to set them as the example below
$address = new USPSAddress;
$address->setFirmName('Apartment');
$address->setApt('');
$address->setAddress('3909 Witmer Road');
$address->setCity('Niagara Falls');
$address->setState('NY');
$address->setZip5(12305);
$address->setZip4('');

// Add the address object to the address verify class
$verify->addAddress($address);
echo '<pre>';
// Perform the request and return result
print_r($verify->verify());
echo '--<br>';
print_r($verify->getArrayResponse());
echo '--<br>';
var_dump($verify->isError());
echo '--<br>';
// See if it was successful
if($verify->isSuccess()) {
  echo 'Done';
} else {
  echo 'Error: ' . $verify->getErrorMessage();
}
