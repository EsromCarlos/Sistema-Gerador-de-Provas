<html>
<head>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/sispro.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="#">Logo Marca</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Página Inicial</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="gerenciar-questoes.php">Gerenciar Questões</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Gerenciar Provas</a>
        </li>
        <!-- DropDown
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        -->
        </ul>
    </div>
    </nav>
<script>
$(document).ready(function() {
  $('li.active').removeClass('active');
  $('a[href="' + location.pathname.split("/")[2] + '"]').closest('li').addClass('active'); 
});
</script>