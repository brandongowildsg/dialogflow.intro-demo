<?php

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == "POST"){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {
		case 'learning':
			$speech = "Consists of Speech-Language Pathology and Speech and Drama";
			break;

		case 'pre-schoolers':
			$speech = "Consists of Language and Literacy, Numeracy and Chinese Language";
			break;

		default:
			$speech = "Sorry, I didn't get that. Please ask me something else";
			break;
	}

	$response = new \stdClass();
	$response->speech = "";
	$response->displayText = "";
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>