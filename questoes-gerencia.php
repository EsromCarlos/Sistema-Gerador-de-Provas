<?php require_once("cabecalho.php");
require_once("banco-questao.php");
$questoes = listarQuestoes();
$disciplinas = listarDisiciplinas(); ?>

<?php if ($questoes) {?>
    <div class="disciplinas">
        <div style="width:150px" class="form-group float-right">
            <select id="select-disciplina" class="form-control">
                <option></option>
                <option value="Disciplina">Todas</option>
                <option style="font-size: 1pt; background-color: #000000;" disabled="disabled">&nbsp;</option>
                <?php foreach($disciplinas as $disciplina) { ?>
                <option value="Disciplina<?= $disciplina["id"]?>"><?= $disciplina["nome"]?></option>
                <?php }?>
            </select>
        </div>
        <div class="form-group-row float-left">    
            <input type="text" class="pesquisar form-control" placeholder="Pesquisar ID...">
        </div>  
        <table id='tabela' class='table text-center'>
            <thead>
                <tr>
                    <th class="idcol" scope='col'>ID</th>
                    <th class='semresultado' scope='col'>Nenhum resultado</th>
                </tr>
            </thead>
            <tbody id="conteudoQ">
        <?php foreach($questoes as $questao) { ?>
            <tr>
                <th scope='row'> <?=$questao['id']?> </th>
                <td > Disciplina<?=$questao['disciplina']?> </td>
                <td> ID<?=$questao['id']?> </td>
                <td> <?=limitarTexto($questao['questao'])?> </td>
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
    <script>
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $('#select-disciplina').select2({
            selectOnClose: true,
            language: "pt-BR",
            width: '100%',
            theme: "bootstrap",
            placeholder: "Disciplina...",
        });
        
        $(document).ready(function() {

            $(".pesquisar").keyup(function () {
            var termoBusca = $(".pesquisar").val();
            var listaItem = $('#conteudoQ').children('tr');
            var splitPesquisa = termoBusca.replace(/ /g, "'):containsi('");
            
            $.extend($.expr[':'], {
                'containsi': function(elem, i, match, array){
                    return (elem.innerText.replace("Editar","").replace("Remover","") || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });
            var select = $("#select-disciplina").val();
            if (select !== "Disciplina" && select !== "") {
                $("#conteudoQ tr").not(":containsi('" + select + " ID" + splitPesquisa + "')").each(function(e){
                    $(this).attr('visible','false');
                });
                $("#conteudoQ tr:containsi('" + select + " ID" + splitPesquisa + "')").each(function(e){
                    $(this).attr('visible','true');
                });
            } else {
                $("#conteudoQ tr").not(":containsi('ID" + splitPesquisa + "')").each(function(e){
                    $(this).attr('visible','false');
                });
                $("#conteudoQ tr:containsi('ID" + splitPesquisa + "')").each(function(e){
                    $(this).attr('visible','true');
                });
            }
            
            
            var nAchados = $('#conteudoQ tr[visible="true"]').length;
            if(nAchados == '0') {
                $('.semresultado').show();
                $('.idcol').hide();
            } else {
                $('.semresultado').hide();
                $('.idcol').show();
            }  
            });

            $("#select-disciplina").change(function () {
                var disciplinaSelecionada = $("#select-disciplina").val();
                var listaItem = $('#conteudoQ').children('tr');
                var splitPesquisa = disciplinaSelecionada.replace(/ /g, "'):containsi('");
                
                $.extend($.expr[':'], {
                    'containsi': function(elem, i, match, array){
                        return (elem.innerText.replace("Editar","").replace("Remover","") || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                    }
                });
                $("#conteudoQ tr").not(":containsi('" + splitPesquisa + "')").each(function(e){
                    $(this).attr('visible','false');
                });
                $("#conteudoQ tr:containsi('" + splitPesquisa + "')").each(function(e){
                    $(this).attr('visible','true');
                });  
                var nAchados = $('#conteudoQ tr[visible="true"]').length;
                if(nAchados == '0') {
                    $('.semresultado').show();
                    $('.idcol').hide();
                } else {
                    $('.semresultado').hide();
                    $('.idcol').show();
                }
            });
        });
    </script>
<?php } ?>
<?php require_once("rodape.php") ?>