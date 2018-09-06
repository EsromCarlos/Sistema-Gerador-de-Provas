<?php
require_once("banco-questao.php");

$disciplina = $_POST["disciplina"];

if (adicionarDisciplina($disciplina)) { ?>
    <div class="alert alert-success" role="alert">
        <p> Disciplina adicionada com sucesso!</p>
    </div>
<?php } else { ?>
    <div class="alert alert-danger" role="alert">
        <p> Disciplina não foi adicionada!</p>
    </div>
<?php
}