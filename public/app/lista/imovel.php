<div class="col-12">
    <h3>Imovel</h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">logradouro</th>
                <th scope="col">cidade</th>
                <th scope="col">Bairro</th>
                <th scope="col">UF</th>
                <th scope="col">Locador</th>
            </tr>
        </thead>
        <tbody>        
        </tbody>
    </table>

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
    });
</script>