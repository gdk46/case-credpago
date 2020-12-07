<div class="col-12" style="height: 500px; overflow:auto;">
    <h3>Repasses</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Locatário</th>
                <th scope="col">Valor repasse</th>
                <th scope="col">Status</th>
                <th scope="col">Data</th>
                <th scope="col"></th>
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
            url:'../../src/ControllerAjax/repasse.ajax.php',
            data:{"action": "ler"},
            success: function (data) {
                $("tbody").append(data)
            }
        });
    });
</script>