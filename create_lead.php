<?php
$accessKey = 'u$r96b684379b7747fd7c6fa410b529564d';
$secretKey = 'c7cfc417bf94629420ba492e4de7f258d653d09c';
$api_url_base = 'https://api.leadsquared.com/v2/LeadManagement.svc';
$url = $api_url_base . '/Lead.Create?accessKey=' . $accessKey . '&secretKey=' . $secretKey;	
/*
	Lead values that you would save in LeadSquared
*/
$FirstName = "John";
$LastName = "Smith";
$email = "john.smith@yopmail.com";
$data_string = '[
					{"Attribute":"FirstName", "Value": "'.$FirstName.'"},
					{"Attribute":"LastName", "Value": "'.$LastName.'"},
					{"Attribute":"EmailAddress", "Value": "'.$email.'"}
				]';
try
{
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
												'Content-Type:application/json',
												'Content-Length:'.strlen($data_string)
												));
	$json_response = curl_exec($curl);
	curl_close($curl);
} catch (Exception $ex) { 
	curl_close($curl);
}
?>
