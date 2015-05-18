<?php
//FUNCÇÕES DO CURL
include_once('functions_curl.php');

function copia($file,$newfile){
	
	if (!copy($file, $newfile)) {
	    echo "failed to copy $file...\n";
	}
	return $newfile;
}

function deleta($archive){
	if(!unlink($archive)) echo "Não pode deletar\n";
}

function getZipChuvas($arquivolink){
	$arquivozip = copia($arquivolink,'CHUVAS.ZIP');

	// Criando o objeto
	$z = new ZipArchive();

	// Abrindo o arquivo para leitura/escrita
	$abriu = $z->open($arquivozip, ZIPARCHIVE::CREATE );
	if ($abriu === true) {
		//echo $abriu."<br>";

	    // Obtendo o conteudo de um arquivo pelo nome
	    //echo $z->numFiles;
	    $conteudo_txt = $z->getFromName('CHUVAS.TXT');


	    // Abre o arquivo para leitura e escrita
		$f = fopen("CHUVAS.TXT", "w+");

		// Escreve no arquivo
		fwrite($f, $conteudo_txt);


	    echo $conteudo_txt;
	    //echo var_dump($conteudo_txt);


	    // Libera o arquivo
		fclose($f);
	
	    // Salvando o arquivo
	    $z->close();

	} else {
	    echo 'Erro: '.$abriu;
	}

	deleta($arquivozip);
	//curl_post("upload.php",array('formato'=>$_POST['formato'],$f));
}

?>