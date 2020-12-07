<div class="col-12">
    <h3>Mensalidade</h3>

    <div class="form-group row" id="input-grup">
    </div>

    <div class="form-group row">
        <div class="col-4">
            <button class="btn btn-success" id="enviar">
                Cadastra
            </button>
            <a class="btn btn-primary" href="?fld=lista&pg=mensalidade">
                Voltar
            </a>
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
                    url: '../../src/ControllerAjax/mensalidade.ajax.php',
                    data: {
                        "action": "atualizar",
                        "id": id,
                        "valor_mensalidade": $("input[name=valor_mensalidade]").val(),
                        "status": $("#inputState option:selected").val(),
                        "data": $("input[name=data]").val()
                    },
                    success: function(data) {
                        if (data == 1) {
                            $(location).attr('href', '?fld=lista&pg=mensalidade');
                        } else {
                            alert('erro');
                        }
                    }
                });
            });

            $.ajax({
                type: 'POST',
                url: '../../src/ControllerAjax/mensalidade.ajax.php',
                data: {
                    "action": "intup-update",
                    "id": id
                },
                success: function(data) {
                    $("#input-grup").append(data)
                }
            });
        }
    })
</script>