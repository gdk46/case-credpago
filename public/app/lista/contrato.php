<div class="col-12" style="max-height: 500px; overflow:auto;">
    <h3>Contrato</h3>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Locador</th>
                    <th scope="col">Locatario</th>
                    <th scope="col">Taxa administrativa</th>
                    <th scope="col">Valor condominio</th>
                    <th scope="col">Valor aluguel</th>
                    <th scope="col">IPTU</th>
                    <th scope="col">Data inicio</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    
</div>
<script>
    $(document).ready(function(){
        
        $.ajax({
            type:'POST',
            url:'../../src/ControllerAjax/contrato.ajax.php',
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