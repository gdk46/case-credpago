<div class="col-12" style="height: 500px; overflow:auto;">
    <h3>Mensalidade</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Valor mensalidade</th>
                <th scope="col">Status</th>
                <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

</div>

<script>
    $(document).ready(function(){
        
        $.ajax({
            type:'POST',
            url:'../../src/ControllerAjax/mensalidade.ajax.php',
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