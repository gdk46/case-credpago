<div class="col-12">
    <h3>Imovel</h3>


    <div class="form-group row" id="input-grup">
    </div>

    <div class="form-group row">
        <div class="col-4">
            <button class="btn btn-success" id="enviar">
                Salva
            </button>
            <a class="btn btn-primary" href="?fld=lista&pg=locador">
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
            $("#input-grup").html('<h1>Erro</h1>')
        } else {
            $("#enviar").click(function() {
                $.ajax({
                    type: 'POST',
                    url: '../../src/ControllerAjax/imovel.ajax.php',
                    data: {
                        "action": "atualizar",
                        "id": id,
                        "cep":         $("input[name=cep]").val(),
                        "logradouro":  $("input[name=logradouro]").val(),
                        "complemento": $("input[name=complemento]").val(),
                        "cidade":      $("input[name=cidade]").val(),
                        "bairro":      $("input[name=bairro]").val(),
                        "uf":          $("input[name=uf]").val()
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