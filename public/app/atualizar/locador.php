<div class="col-12">
    <h3>Locador</h3>

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


        $("#enviar").click(function() {
            $.ajax({
                type: 'POST',
                url: '../../src/ControllerAjax/locador.ajax.php',
                data: {
                    "action": "atualizar",
                    "id": id,
                    "nome": $("input[name=nome]").val(),
                    "email": $("input[name=email]").val(),
                    "telefone": $("input[name=telefone]").val()
                },
                success: function(data) {
                    if (data == 1) {
                        $(location).attr('href', '?fld=lista&pg=locador');
                    } else {
                        alert('erro');
                    }
                }
            });
        });

        $.ajax({
            type: 'POST',
            url: '../../src/ControllerAjax/locador.ajax.php',
            data: {
                "action": "intup-update",
                "id": id
            },
            success: function(data) {
                $("#input-grup").append(data)
            }
        });





    })
</script>