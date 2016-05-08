<?php
//Invocamos os três principais arquivos que carregam as as principais classes do nosso projeto 
	include "config/domain.php"; // conexão com banco de dados
	include "dvd/dvd.php"; //Funções que que fazem contato com banco de dados diretamente na tabela DVD e que fazem ações relativas a DVDs
	include "template/html.php"; //Funções que geram interface

	$html = new html(); // Gera interface
	$html->header(); //Invocamos os css, fontes e menu superior
	$dvd = new dvd(); //Manipulação com relação a DVD no DB


	//isset verifica se existe um id através do metodo get, se existir então invocaremos uma função que tentará excluir, caso exclua, apresentamos uma mensagem de sucesso caso contrário retornamos uma menssagem de erro;
	if (isset($_GET[id])) {
	    $retorno = $dvd->delete($_GET[id]);
	    $retorno = $dvd->update($_POST[codigo], $_POST[descricao], $_POST[genero], $_POST[duracao], $_POST[sinopse]);
	    if ($retorno == 1) {
	        $html->alert("Registro excluído com sucesso", "success");
	    } else {
	        $html->alert($retorno, "danger");
	    }
	}

?>
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<?php
		//Carregamos uma descrição para a página
	    $html->pageHeader(null, "DVDs disponíveis");
    ?>
    <table class="table table-responsive table-striped"> 
            <thead>
                <tr>
                    <th width="8%">Ação</th>
                    <th width="8%">Código</th>
                    <th width="20%">Descrição</th>
                    <th width="15%">Gênero</th>
                    <th width="10%">Duração</th>
                    <th width="39%">Sinopse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //chamamos o método que lista todos os registros da a tabela
                $dvd->select();
                ?>
            </tbody>
        </table>
</div>
<?php
	//Fechamos o arquivo
 	$html->footer; 
 ?>