<div class="col-12">
    <h3>Locatário</h3>

    <table class="table" style="max-height: 500px;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Ao clicar em excuir você está excuindo definitivamente, é o que deseja
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="excluir" data-dismiss="modal">Excuir</button>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function(){
        
        $.ajax({
            type:'POST',
            url:'../../src/ControllerAjax/locatario.ajax.php',
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