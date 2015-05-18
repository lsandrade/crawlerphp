<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
  $('form').submit(function(){
    $.post('http://hidroweb.ana.gov.br/HidroWeb.asp?TocItem=1080&TipoReg=7&MostraCon=true&CriaArq=false&TipoArq=1&SerieHist=true', function() {
      window.location = 'meucrawler.php';
    });
    return false;
  });
});
</script>
<?php

		include_once('simple_html_dom.php');
		var_dump($_REQUEST);
		if(!isset($_POST['busca'])){
			$target_url = "http://hidroweb.ana.gov.br/HidroWeb.asp?TocItem=1080&TipoReg=7&MostraCon=false&CriaArq=false&TipoArq=1&SerieHist=true";
			$html = new simple_html_dom();
			$html->load_file($target_url);

			echo "<form action='http://hidroweb.ana.gov.br/HidroWeb.asp?TocItem=1080&TipoReg=7&MostraCon=true&CriaArq=false&TipoArq=1&SerieHist=true' method='post'>";
			foreach($html->find('td.gridTitulo') as $elemento)
			{
				echo $elemento->innertext."<br />";
			}
			echo "<input type='hidden' name='busca'>";
			echo "<input type='submit' value='Enviar'>";
			echo "</form>";
		}
		else{
			$target_url = "http://hidroweb.ana.gov.br/HidroWeb.asp?TocItem=1080&TipoReg=7&MostraCon=true&CriaArq=false&TipoArq=1&SerieHist=true";
			$html = new simple_html_dom();
			$html->load_file($target_url);

			foreach($html->find('td') as $elemento)
			{
				echo $elemento->innertext."<br />";
			}
		}

?>