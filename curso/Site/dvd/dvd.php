<?php

//Classe responsavel por fazer as ações relacionadas ao banco de dados em dvd
//Caso existissem mais telas ou outros CRUDs para diferentes tabelas seria interessante ter uma pasta e uma classe para cada um deles

class dvd {

    //Método para inserção de registros na tabela DVD
    function insert($descricao, $genero, $duracao, $sinopse) {
        $html = new html();
        try {
            $sql = "INSERT INTO DVD (DESCRICAO, IDGENERO, DURACAO, SINOPSE) VALUES (:descricao, :genero, :duracao, :sinopse)";
            $pdo = Conexao::getInstance()->prepare($sql);
            $var = $pdo->execute(array(':descricao' => $descricao, ':genero' => $genero, ':duracao' => $duracao, ':sinopse' => $sinopse));
            return $var;
        } catch (PDOException $e) {
            return 'Erro: ' . $e->getMessage();
        }
    }

//Realiza a atualização de registros
    function update($codigo, $descricao, $genero, $duracao, $sinopse) {

        $html = new html();
        try {
            $sql = "UPDATE DVD SET DESCRICAO = :descricao, IDGENERO = :genero, DURACAO = :duracao, SINOPSE = :sinopse WHERE IDDVD = :codigo";
            $pdo = Conexao::getInstance()->prepare($sql);
            $var = $pdo->execute(array(':codigo' => $codigo, ':descricao' => $descricao, ':genero' => $genero, ':duracao' => $duracao, ':sinopse' => $sinopse));
            return $var;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

//Exclui registro
    function delete($codigo) {
        $html = new html();
        try {
            $sql = "DELETE FROM DVD WHERE IDDVD = :codigo";
            $pdo = Conexao::getInstance()->prepare($sql);
            $var = $pdo->execute(array(':codigo' => $codigo));
            return $var;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

//Seleciona todos os registros
    function select() {

        $sql = "SELECT IDDVD, DESCRICAO, NOME, DURACAO, SINOPSE FROM DVD D, GENERO G WHERE D.IDGENERO = G.IDGENERO GROUP BY IDDVD ORDER BY DESCRICAO;";
        $pdo = Conexao::getInstance()->prepare($sql);
        $pdo->execute();
        while ($linha = $pdo->fetch(PDO::FETCH_ASSOC)) {
            $lista .="<tr><td><a href='index.php?id={$linha[IDDVD]}' class='btn btn-sm btn-warning' title='Excluir registro'><span class='glyphicon glyphicon-remove'></span></a>"
                    . "<a href='alterar.php?id={$linha[IDDVD]}' class='btn btn-sm btn-info' title='Alterar registro'><span class='glyphicon glyphicon-pencil'></span></a>"
                    . "</td><td>{$linha[IDDVD]}</td><td>{$linha[DESCRICAO]}</td><td>{$linha[NOME]}</td><td>{$linha[DURACAO]}</td><td>{$linha[SINOPSE]}</td></tr>";
        }
        echo $lista;
    }

//Seleciona um registro especifico
    function selectUnique($codigo) {

        $sql = "SELECT IDDVD, DESCRICAO, D.IDGENERO, DURACAO, SINOPSE FROM DVD D, GENERO G WHERE D.IDGENERO = G.IDGENERO AND IDDVD = $codigo";
        $pdo = Conexao::getInstance()->prepare($sql);
        $pdo->execute();
        $linha = $pdo->fetch(PDO::FETCH_ASSOC);
        return $linha;
    }

//Seleciona determinados registros de acordo com o que o usuario seleciona que deve aparecer
    function selectDinamico($genero, $inicio, $fim, $ordem) {
        if ($genero === "null") {
            $genero = "";
        } else {
            $genero = " D.IDGENERO = $genero AND";
        }
        if ($ordem === null) {
            $ordem = "";
        } else {
            $ordem = " ORDER BY $ordem";
        }
        if ($fim === "null" && $inicio === "null") {
            $intervalo = "";
        } else {
            $intervalo = " D.IDDVD BETWEEN $inicio AND $fim AND";
        }
        $sql = "SELECT IDDVD, DESCRICAO, NOME AS GENERO, DURACAO, SINOPSE FROM DVD D, GENERO G WHERE $intervalo $genero D.IDGENERO = G.IDGENERO GROUP BY IDDVD $ordem;";
        $pdo = Conexao::getInstance()->prepare($sql);
        $pdo->execute();
        while ($linha = $pdo->fetch(PDO::FETCH_ASSOC)) {
            $lista .="<tr><td>{$linha[IDDVD]}</td><td>{$linha[DESCRICAO]}</td><td>{$linha[GENERO]}</td><td>{$linha[DURACAO]}</td><td>{$linha[SINOPSE]}</td></tr>";
        }
        echo $lista;
    }

    //Seleciona o Genero para montar o select

    function selectGenero($valor) {
        $sql = "SELECT IDGENERO, NOME FROM GENERO ORDER BY NOME;";
        $pdo = Conexao::getInstance()->prepare($sql);
        $pdo->execute();
        while ($linha = $pdo->fetch(PDO::FETCH_ASSOC)) {
            if ($linha[IDGENERO] == $valor) {
                $lista .= "<option value={$linha[IDGENERO]} selected='selected'>{$linha[NOME]}</option>";
            } else {
                $lista .= "<option value={$linha[IDGENERO]}>{$linha[NOME]}</option>";
            }
        }
        return $lista;
    }

}
