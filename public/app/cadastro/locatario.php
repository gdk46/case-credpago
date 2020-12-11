<div class="col-12">
    <h3>Locatario</h3>

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
                url: '../../src/ControllerAjax/locatario.ajax.php',
                data: {
                    "action": "criar",
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
                "action": "intup-create"
            },
            success: function(data) {
                $("#input-grup").append(data)
            }
        });
    });
</script>