<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://us-weather-by-zip-code.p.rapidapi.com/getweatherzipcode?zip=94111",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: us-weather-by-zip-code.p.rapidapi.com",
		"x-rapidapi-key: b55100ff12mshd3092d2c7d30d5cp19d9bajsn6d2159fcf6b4"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
