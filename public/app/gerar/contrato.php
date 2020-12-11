<div class="col-12">
    <h3>Contrato</h3>

    <div class="form-group row" id="input-grup">
    </div>

    <div class="form-group row">
        <div class="col-4">
            <button class="btn btn-success" id="enviar">
                Cadastra
            </button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let url_string = window.location.href;
        let url = new URL(url_string);
        let id = parseInt(url.searchParams.get("id"));


        if (id == null) {
            $("#input-grup").append('Erro')
        } else {
            $("#enviar").click(function() {
                $.ajax({
                    type: 'POST',
                    url: '../../src/ControllerAjax/contrato.ajax.php',
                    data: {
                        "action": "criar",
                        "id_locatario":       $("#locatario option:selected").val(),
                        "id_locador":         $("#locador option:selected").val(),
                        "id_imovel":          $("input[name=imovel]").val(),
                        "data_inicio":        $("input[name=data_inicio]").val(),
                        "taxa_administrativa":$("input[name=taxa_administrativa]").val(),
                        "valor_aluguel":      $("input[name=valor_aluguel]").val(),
                        "valor_condominio":   $("input[name=valor_condominio]").val(),
                        "valor_iptu":         $("input[name=valor_iptu]").val()
                    },
                    success: function(data) {
                        if (data == "") {
                            alert('erro');
                        } else {
                            $(location).attr('href', '?fld=gerar&pg=conta&contrato='+data);
                        }
                    }
                });
            });

            $.ajax({
                type: 'POST',
                url: '../../src/ControllerAjax/contrato.ajax.php',
                data: {
                    "action": "intup-create",
                    "id": id
                },
                success: function(data) {
                    $("#input-grup").append(data)
                }
            });
        }

    });
</script>