<?php
	include "config/domain.php";
	include "dvd/dvd.php";
	include "template/html.php";

	$html = new html();
	$html->header();
	$dvd = new dvd();

    //Procuramos verificar se existe algum id sendo repassado, caso exista a variavel $valores receberá um array contendo todas as informações relativas aquele registro
	if (isset($_GET[id])) {
	    $valores = $dvd->selectUnique($_GET[id]);
	}

    //Cado a pagina receber o parametro acao via get contendo o valor A então, faremos a atualização de todos os elementos daquele registro, se atualizar corretamente retornamos uma mensagem caso contrário retornamos uma mensagem de erro em vermelho
	if (isset($_GET[acao]) == "A") {
        $retorno = $dvd->update($_POST[codigo], $_POST[descricao], $_POST[genero], $_POST[duracao], $_POST[sinopse]);
    if ($retorno == 1) {
        $html->alert("Registro alterado com sucesso", "success");
    } else {
        $html->alert($retorno, "danger");
    }
    //guarda o codigo após a atualização
    $valores = $dvd->selectUnique($_POST[codigo]);
}
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     <form class="form-horizontal" action="alterar.php?acao=A" method="post" enctype="multipart/form-data" name="Cadastro" onsubmit="enviar.disabled = true;" >
            <fieldset>
                <?php
                //iniciamos os componentes HTML apresentando os values $valor[indice_do_array_correspondente_a_cada_campo]
                $html->pageHeader(null, "Alteração de DVD");
                $html->input("codigo", "hidden", null, 2, null, $valores[IDDVD]);
                $html->input("descricao", "text", "Descrição", 2, "required", $valores[DESCRICAO]);
                $html->select("genero", 2, "Genero", $dvd->selectGenero($valores[IDGENERO]), "required");
                $html->input("duracao", "text", "Duração", 2, "required", $valores[DURACAO]);
                $html->textarea("sinopse", "Sinopse", 2, "required", $valores[SINOPSE]);
                $html->button("enviar", "Alterar", 2, "btn-success btn-block")
                ?>
            </fieldset>
        </form>
</div>
<?php
 	$html->footer; 
 ?>