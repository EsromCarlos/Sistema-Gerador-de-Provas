<html>
<head>
    <meta charset="UTF-8">
    <title>SisPro | Sistema Gerador de Provas</title>
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="js/select2.full.min.js"></script>
    <script type="text/javascript" src="js/i18n/pt-BR.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/sispro.css">
    <link rel="stylesheet" type="text/css" href="css/select2.css">
    <link rel="stylesheet" type="text/css" href="css/select2-bootstrap.min.css">
</head>
<body>
    <div class="fixed-top bg-white">
        <div class="topo fixed-top">
            <p></p>
        </div>
        <div class="barra mt-4">
            <div class="mt-4 ml-5 col-3">
                <div class="logo">
                    <a href="#"><img src="img/logo.png" alt="SisPro"></a>
                </div>
            </div>
            <div class="float-left mt-4">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Página Inicial</a>
                        </li>
                        <!--
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Questões
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="questoes-form.php">Adicionar Questões</a>
                            <a class="dropdown-item" href="questoes-gerencia.php">Gerenciar</a>
                        </li>
                        -->
                        <li class="nav-item">
                            <a class="nav-link" href="questoes-gerencia.php">Questões</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="disciplina-gerencia.php">Disciplinas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Professores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Gerar Provas</a>
                        </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <hr style="margin-top:0.5rem; border-top: 2px solid rgba(0, 0, 0, 0.1);">
    </div>
    <div class="back">
        <div class="container">
            <div class="principal">
<script>
$(document).ready(function() {
  $('li.active').removeClass('active');
  $('a[href="' + location.pathname.split("/")[2] + '"]').closest('li').addClass('active'); 
});
</script>