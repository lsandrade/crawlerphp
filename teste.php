<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

include_once('simple_html_dom.php');
//FUNCÇÕES DO CURL
include_once('functions_curl.php');
//FUNÇÕES DO ARQUIVO ZIP
include_once('functions_zip.php');


//URL DA PÁGINA
$url = "http://hidroweb.ana.gov.br/Estacao.asp?Codigo=".$_GET['codigo']."&CriaArq=true&TipoArq=1";

//CAMPO QUE SELECIONA O REGISTRO DE CHUVA
$fields = array(
						'cboTipoReg' => 10
				);

//FAZ UM POST CURL NA PÁGINA
$pagina= curl_post($url, $fields);

//DOM
$html = new simple_html_dom();
//PEGA O HTML VIA STRING $PAGINA
$html = str_get_html($pagina);

$arquivolink='';
//O LINK ESTÁ NUM PARÁGRAFO E A-HREF
foreach($html->find('p a') as $element) {
       $arquivolink= "http://hidroweb.ana.gov.br/".$element->href;
       break;
}
if($arquivolink==''){
	echo "<script>
	alert('Não existem arquivos para serem cadastrados para essa estação');
	location.href='carga.php';
	</script>";
}

else{
	echo $arquivolink;

	//VAR DUMP PARA TESTE
	//echo var_dump($_REQUEST);

	//PARTE DO ZIP:
	getZipChuvas($arquivolink);
}
?>