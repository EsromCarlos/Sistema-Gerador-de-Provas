<?php
require_once("conexao.php");

function adicionaQuestao($questao, $disciplina, $gabarito) {
    global $conexao;
    $query = "insert into questoes (questao, disciplina, gabarito) values ('{$questao}', '{$disciplina}', '{$gabarito}')";
    return mysqli_query($conexao, $query);
}

function listarDisiciplinas() {
    $disciplinas = array();
    global $conexao;
    $query = "select * from disciplina";
    $resultado = mysqli_query($conexao, $query);
    while($disciplina = mysqli_fetch_assoc($resultado)) {
        array_push($disciplinas, $disciplina);
    }
    return $disciplinas;
}

function listarQuestoes() {
    $questoes = array();
    global $conexao;
    $query = "select * from questoes";
    $resultado = mysqli_query($conexao, $query);
    while($questao = mysqli_fetch_assoc($resultado)) {
        array_push($questoes, $questao);
    }
    return $questoes;
}

function adicionarDisciplina($disciplina) {
    global $conexao;
    $query = "insert into disciplina (nome) values ('{$disciplina}')";
    return mysqli_query($conexao, $query);
}

function removerDisciplina($disciplina) {
    global $conexao;
    $query = "delete from disciplina where nome='{$disciplina}'";
    return mysqli_query($conexao, $query);
}

function alterarDisciplina($disciplina, $novonome) {
    global $conexao;
    $query = "update disciplina set nome='{$novonome}' where nome='{$disciplina}'";
    return mysqli_query($conexao, $query);
}

