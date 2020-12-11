<div class="col-12">
    <h3>Locatario</h3>

    <div class="form-group row" id="input-grup">
    </div>

    <div class="form-group row">
        <div class="col-4">
            <button class="btn btn-success" id="enviar">
                Salva
            </button>
            <a class="btn btn-primary" href="?fld=lista&pg=locatario">
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
                    url: '../../src/ControllerAjax/locatario.ajax.php',
                    data: {
                        "action": "atualizar",
                        "id": id,
                        "nome": $("input[name=nome]").val(),
                        "email": $("input[name=email]").val(),
                        "telefone": $("input[name=telefone]").val()
                    },
                    success: function(data) {
                        if (data == 1) {
                            $(location).attr('href', '?fld=lista&pg=locatario');
                        } else {
                            alert('erro');
                        }
                    }
                });
            });

            $.ajax({
                type: 'POST',
                url: '../../src/ControllerAjax/locatario.ajax.php',
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