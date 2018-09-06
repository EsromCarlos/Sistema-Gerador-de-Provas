<?php
require_once("banco-questao.php");

$disciplina = $_POST["disciplina"];
$novonome = $_POST["novonome"];
alterarDisciplina($disciplina, $novonome);