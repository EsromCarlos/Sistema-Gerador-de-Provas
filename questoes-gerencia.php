<?php require_once("cabecalho.php");
require_once("banco-questao.php");
$questoes = listarQuestoes(); ?>

<?php if ($questoes) {?>
    <div class="disciplinas">
        <div class="form-group float-right">
            <input type="text" class="pesquisar form-control" placeholder="Pesquisar...">
        </div>  
        <table id='tabela' class='table text-center'>
            <thead>
                <tr>
                    <th scope='col'></th>
                    <th scope='col'>Nome</th>
                </tr>
            </thead>
            <tbody id="conteudoQ">
        <?php foreach($questoes as $questao) { ?>
            <tr>
                <th scope='row'></th>
                <td> <?=$questao['questao']?> </td>
                <td><button name='<?=$disciplina['nome']?>' 
                    type='button' class='btn btn-outline-danger'
                    onclick='excluirCheca(this.name)'>Remover</button>
                    <button name='<?=$disciplina['nome']?>' 
                    type='button'class='btn btn-outline-secondary'
                    onclick='alterarCheca(this.name)'>Editar</button></td>
            </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>
<?php require_once("rodape.php") ?>