<div class="col-12" style="max-height: 500px; overflow:auto;">
    <h3>Imovel</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">logradouro</th>
                <th scope="col">cidade</th>
                <th scope="col">Bairro</th>
                <th scope="col">UF</th>
                <th scope="col">Locador</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>


    <div class="form-group row">
        <div class="col-4">
            <a class="btn btn-primary" href="?fld=cadastro&pg=imovel">
                Novo Cadastra
            </a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        
        $.ajax({
            type:'POST',
            url:'../../src/ControllerAjax/imovel.ajax.php',
            data:{"action": "ler"},
            success: function (data) {
                $("tbody").append(data)
            }
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });
</script>