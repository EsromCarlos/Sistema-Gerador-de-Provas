<script>
    function alerta(titulo, mensagem, rodape, tamanho) {
        $('#alertaModal').modal('hide');
        $("#tituloAlerta").html(titulo);
        $("#corpoAlerta").html(mensagem);
        if (rodape !== undefined) {
            $("#alertaRodape").html(rodape);
        }
        if (tamanho !== undefined) {
            $("#alertat").attr("class","modal-dialog-" + tamanho);
        }
        $("#alertamodal").modal();
        
    }
    function mostraAlertaConfirma(func) {
        $("#confirma").css("display","");
        $("#confirma").attr("onclick",func);
    }
    function ocultaAlertaConfirma() {
        $("#confirma").css("display","none");
        $("#confirma").attr("onclick","");
    }

    function ocultarCabecalho() {
        $(".modal-header").css("display","none");
    }

    function mostrarCabecalho() {
        $(".modal-header").css("display","");
    }

</script>
<div class="modal fade" id="alertamodal" tabindex="-1" role="dialog">
    <div id="alertat" class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 id="tituloAlerta" class="modal-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="corpoAlerta" class="modal-body">
        </div>
        <div id="alertaRodape" class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button style="display:none" id="confirma" type="button" class="btn btn-primary">Confirmar</button>
        </div>
        </div>
    </div>
</div>
