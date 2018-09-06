<?php
require_once("banco-questao.php");

$questao = $_POST["questao"];
$disciplina = $_POST["disciplina"];
$gabarito = $_POST["gabarito"];

if (adicionaQuestao($questao, $disciplina, $gabarito)) { ?>
    <div class="alert alert-success" role="alert">
        <p> Questão adicionada com sucesso!</p>
    </div>
<?php } else { ?>
    <div class="alert alert-danger" role="alert">
        <p> Questão não foi adicionada!</p>
    </div>
<?php
}