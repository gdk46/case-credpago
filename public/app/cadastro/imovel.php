<div class="col-12">
    <h3>Imovel</h3>

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
                url: '../../src/ControllerAjax/imovel.ajax.php',
                data: {
                    "action": "criar",
                    "id_proprietario": $("#proprietario option:selected").val(),
                    "cep":         $("input[name=cep]").val(),
                    "logradouro":  $("input[name=logradouro]").val(),
                    "complemento": $("input[name=complemento]").val(),
                    "cidade":      $("input[name=cidade]").val(),
                    "bairro":      $("input[name=bairro]").val(),
                    "uf":          $("#uf option:selected").val()
                },
                success: function(data) {
                    if (data == 1) {
                        $(location).attr('href', '?fld=lista&pg=imovel');
                    } else {
                        alert('erro');
                    }
                }
            });
        });


        
        $.ajax({
            type: 'POST',
            url: '../../src/ControllerAjax/imovel.ajax.php',
            data: {
                "action": "intup-create"
            },
            success: function(data) {
                $("#input-grup").append(data)
            }
        });

    });
</script>