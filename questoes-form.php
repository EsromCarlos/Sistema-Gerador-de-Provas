<?php require_once("cabecalho.php");
require_once("banco-questao.php");
$disciplinas = listarDisiciplinas();
?>
<div class="formulario bg-white rounded mt-2">
    <div style="max-width: 98%; margin:0 auto;">
        <form id="cadastraQuestao" >
            <div class="form-group row">
                <div class="col">
                    <textarea id="questao" name="questao" class="form-control textarea"></textarea>
                </div>
            </div> 
            <div class="form-group row">
                <div class="col-sm-1">
                    <button id="cadastrar" class="btn btn-outline-primary" type="button" onclick="adicionarQuestao();">Finalizar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>

    tinymce.init({
        selector: '#questao',
        language: 'pt_BR',
        plugins: ["image imagetools colorpicker paste table textcolor"],
        images_upload_url: 'tinymce-imagem.php',
        resize: false,
        statusbar:false,
        height : "65%",
        entity_encoding : "raw"
    }); 
    
    function configSelect() {
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $('#select-disciplina').select2({
            selectOnClose: true,
            language: "pt-BR",
            width: '100%',
            theme: "bootstrap",
            dropdownParent: $("#alertamodal") 
        });
        $('#select-gabarito').select2({
            selectOnClose: true,
            language: "pt-BR",
            width: '100%',
            theme: "bootstrap",
            dropdownParent: $("#alertamodal") 
        });
    }
    function adicionarQuestao() {
        ocultarCabecalho();
        alerta("",'<h5>Selecione a Disciplina:</h5><div class="select-d">\
            <select id="select-disciplina" class="form-control">\
                <?php foreach($disciplinas as $disciplina) { ?>\
                <option value="<?= $disciplina["id"]?>"><?= $disciplina["nome"]?></option>\
                <?php }?>\
            </select>\
        </div><br>\
        <h5>Gabarito:</h5>\
        <div class="select-d">\
            <select id="select-gabarito" class="form-control">\
                <option>A</option>\
                <option>B</option>\
                <option>C</option>\
                <option>D</option>\
                <option>E</option>\
            </select>\
        </div>');
        configSelect();
        mostraAlertaConfirma("adicionar()");

    }

    function adicionar() {
        $.ajax({
            url:'adiciona-questao.php',
            type:'POST',
            data: {questao: tinyMCE.get('questao').getContent(), gabarito: $("#select-gabarito").val(), disciplina: $("#select-disciplina").val()},
            success: function(data){
                alerta("",data);
                ocultaAlertaConfirma();
                mostrarCabecalho();
            }
        });
    }
</script>
<?php require_once("rodape.php") ?>