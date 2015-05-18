<?php
//extract data from the post
extract($_POST);

//set POST variables
$url = "http://hidroweb.ana.gov.br/Estacao.asp?Codigo=".$_GET['codigo']."&CriaArq=true&TipoArq=1";
$fields = array(
						'cboTipoReg' => 10
				);

$fields_string='';
//url-ify the data for the POST
foreach($fields as $key=>$value) {
	$fields_string .= $key.'='.$value.'&'; 
}
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);
echo var_dump($_REQUEST);

?>