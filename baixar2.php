<?php
// Define o tempo mÃ¡ximo de execuÃ§Ã£o em 0 para as conexÃµes lentas
set_time_limit(0);

// Arqui vocÃª faz as validaÃ§Ãµes e/ou pega os dados do banco de dados

$aquivoNome = 'imagem.jpg'; // nome do arquivo que serÃ¡ enviado p/ download
$arquivoLocal = '/pasta/do/arquivo/'.$aquivoNome; // caminho absoluto do arquivo

// Verifica se o arquivo nÃ£o existe
if (!file_exists($_GET['arquivo']) || !isset($_GET['arquivo'])) {
// Exiba uma mensagem de erro caso ele nÃ£o exista
	echo "não existe";
exit;
}

// Aqui vocÃª pode aumentar o contador de downloads

// Definimos o novo nome do arquivo
$novoNome = 'imagem_nova.jpg';

// Configuramos os headers que serÃ£o enviados para o browser
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="'.$novoNome.'"');
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($aquivoNome));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Expires: 0');

// Envia o arquivo para o cliente
readfile($aquivoNome);
