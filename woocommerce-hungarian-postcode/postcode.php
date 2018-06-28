<?php 
header('Content-type: application/json');

$result = array();
$postCodes = json_decode(file_get_contents("./postcode.json"), true);

if( isset($_POST['postcode']) ) {
  $postcodeInput = $_POST['postcode'];
  
  if (array_key_exists($postcodeInput, $postCodes)) {
    $result[$postcodeInput] = $postCodes[$postcodeInput];
  }
}

echo json_encode($result);
?>