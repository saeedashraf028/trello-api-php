<?php 
/*
	** get custom fields in cards
*/

	$api_key = ''; //paste your API Key here https://trello.com/app-key
	$outh_token = ''; //Outh Toekn 
	
	$card_id = ''; //enter card ID here ..

	$url = 'https://api.trello.com/1/cards/'.$card_id.'/?customFields=true&customFieldItems=true&';
	$url = $url.'key='.$api_key.'&token='.$outh_token;

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

	$headers = array();
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);
	
	$result = json_decode($result);
	
	echo "<pre>"; print_r($result); echo "</pre>";