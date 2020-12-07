<div class="col-12">
    <h3>Mensalidade</h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Valor mensalidade</th>
                <th scope="col">Status</th>
                <th scope="col">Locatário</th>
                <th scope="col">Data</th>
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
            url:'../../src/ControllerAjax/locador.ajax.php',
            data:{"action": "ler"},
            success: function (data) {
                $("tbody").append(data)
            }
        });
    });
</script>