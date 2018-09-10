<?php require_once("cabecalho.php");
require_once("banco-questao.php");
$disciplinas = listarDisiciplinas(); ?>
<div class="formulario-disciplina shadow p-1 mb-5 bg-white rounded">
    <div style="max-width: 800px; margin:0 auto;">
        <form id="cadastraDisiciplina">
            <div class="form-group row">
                <div class="col">
                    <label>Cadastrar Disciplina:</label>
                    <input id="disciplina" name="nome" class="form-control" placeholder="Entre com o nome da Disciplina" type="text">
                </div>
            </div>  
            <div class="form-group row">
                <div class="col-sm-1">
                    <button id="cadastrar" class="btn btn-outline-primary" type="button" onclick="cadastrarDisciplina();">Cadastrar</button>
                </div>
                <button id="cancelar" style="display:none; margin-left:80px" class="btn btn-outline-dark" type="button" onclick="voltaNormal();">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<?php if ($disciplinas) {?>
    <div class="disciplinas">
        <div class="form-group float-right">
            <input type="text" class="pesquisar form-control" placeholder="Pesquisar...">
        </div>  
        <table id='tabela' class='table text-center'>
            <thead>
                <tr>
                    <th scope='col'></th>
                    <th class='nomecol' scope='col'>Nome</th>
                    <th class='nomecol' scope='col'></th>
                    <th class='semresultado' scope='col'>Nenhum resultado</th>
                </tr>
            </thead>
            <tbody id="conteudo">
        <?php foreach($disciplinas as $disciplina) { ?>
            <tr>
                <th scope='row'></th>
                <td> <?=$disciplina['nome']?> </td>
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
        

<script>

    $(document).ready(function() {
        $("#cadastraDisiciplina").submit(function(e){
            return false;
        });
        $(".pesquisar").keyup(function () {
            var termoBusca = $(".pesquisar").val();
            var listaItem = $('#conteudo').children('tr');
            var splitPesquisa = termoBusca.replace(/ /g, "'):containsi('");
            
            $.extend($.expr[':'], {
                'containsi': function(elem, i, match, array){
                    return (elem.innerText.replace("Editar","").replace("Remover","") || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });
            $("#conteudo tr").not(":containsi('" + splitPesquisa + "')").each(function(e){
                $(this).attr('visible','false');
            });
            $("#conteudo tr:containsi('" + splitPesquisa + "')").each(function(e){
                $(this).attr('visible','true');
            });
            var nAchados = $('#conteudo tr[visible="true"]').length;
            if(nAchados == '0') {
                $('.semresultado').show();
                $('.nomecol').hide();
            } else {
                $('.semresultado').hide();
                $('.nomecol').show();
            }  
        });
    });

    function alterarCheca(nome) {
        $("#cadastrar").text("Alterar");
        $("#cadastrar").attr("onclick","alterar('"+ nome +"')"); 
        $("#cadastrar").attr("class","btn btn-outline-secondary"); 
        $("#cancelar").css("display",""); 
        $("#disciplina").val(nome);
    }

    function alterar(nome) {
        $.ajax({
            url:'alterar-disciplina.php',
            type:'POST',
            data: {disciplina: nome, novonome: $("#disciplina").val()},
            success: function(data){
                window.location.reload();
            }
        });
    }

    function voltaNormal() {
        $("#cancelar").css("display","none"); 
        $("#disciplina").val("");
        $("#cadastrar").text("Cadastrar");
        $("#cadastrar").attr("onclick","cadastrarDisciplina()");
        $("#cadastrar").attr("class","btn btn-outline-primary");
    }

    function excluirCheca(nome) {
        mostraAlertaConfirma("excluir('"+ nome + "')");
        alerta("", '<div class="alert alert-danger" role="alert"><strong>Deletar</strong> "' + nome + '"? </div>');
    }

    function excluir(nome) {
        $.ajax({
            url:'remover-disciplina.php',
            type:'POST',
            data: {disciplina: nome},
            success: function(data){
                window.location.reload();
            }
        });
        ocultaAlertaConfirma();
    }

    function cadastrarDisciplina() {
        $.ajax({
        url:"adiciona-disciplina.php",
        data: {disciplina: $("#disciplina").val()},
        type:"POST",
        success: function(data) {
            alerta("",data);
            $('#alertamodal').on('hide.bs.modal', function (event) {
                window.location.reload();
            })

        }
        });
    }
</script>
<?php require_once("rodape.php") ?>