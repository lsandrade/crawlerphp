<?php
include_once('simple_html_dom.php');
$target_url = "http://www.facebook.com/";
$html = new simple_html_dom();
$html->load_file($target_url);
foreach($html->find('a') as $link)
{
echo $link->href."<br />";
}

echo file_get_html('http://www.google.com/')->plaintext;

echo file_get_html('http://hidroweb.ana.gov.br/HidroWeb.asp?TocItem=1080&TipoReg=7&MostraCon=false&CriaArq=false&TipoArq=1&SerieHist=true')->plaintext;


?>