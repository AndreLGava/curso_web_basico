<?php
	include "config/domain.php";
	include "dvd/dvd.php";
	include "template/html.php";

	$html = new html();
	$html->header();
	$dvd = new dvd();

    //Se existir a o parametro acao na url contendo o valor I (inclusão) então enviamos todos sos paramentros que recebemos via post para o banco de dados, caso sucesso retorna uma mensagem de sucesso em verde e caso erro retorna uma mensagem de erro em vermelho
	if (isset($_GET[acao]) == "I") {
        $retorno = $dvd->insert($_POST[descricao], $_POST[genero], $_POST[duracao], $_POST[sinopse]);
    if ($retorno == 1) {
        $html->alert("Registro inserido com sucesso", "success");
    } else {
        $html->alert($retorno, "danger");
    }
}
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <form class="form-horizontal" action="incluir.php?acao=I" method="post" enctype="multipart/form-data" name="Cadastro" onsubmit="enviar.disabled = true;" >
        <fieldset>
            <?php
            //Iniciamos os componentes HTML repassando o $_POST[campo] assim se o usuario enviar o formulário e der erro o sistema não apagará os campos preenchidos
            $html->pageHeader(null, "Cadastro de DVDs");
            $html->input("descricao", "text", "Descrição", 2, "required", isset($_POST[descricao]));
            $html->select("genero", 2, "Genero", $dvd->selectGenero(isset($_POST[genero])), "required");
            $html->input("duracao", "time", "Duração", 2, "required", isset($_POST[duracao]));
            $html->textarea("sinopse", "Sinopse", 2, "required", isset($_POST[sinopse]));
            $html->button("enviar", "Salvar", 2, "btn-success btn-block")
            ?>
        </fieldset>
    </form>
</div>
<?php
 	$html->footer; 
 ?>