<div class="col-12">
    <h3>Imovel</h3>
    
    <div class="form-group row">
        <div class="col-4">
            <label>Text:</label>
            <input type="text" name="a" class="form-control">
        </div>
        <div class="col-4">
            <label>Text:</label>
            <input type="text" name="b" class="form-control">
        </div>
        <div class="col-4">
            <label>Text:</label>
            <input type="text" name="c" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-4">
            <label>Text:</label>
            <input type="text" name="d" class="form-control">
        </div>
        <div class="col-4">
            <label>Text:</label>
            <input type="text" name="e" class="form-control">
        </div>
        <div class="col-4">
            <label>Text:</label>
            <input type="text" name="f" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        
        <div class="col-4">
            <button class="btn btn-success" id="salva">
                Cadastra
            </button>
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
       
        /* $("#salva").click(function(){
            $.ajax({
                type:'POST',
                url:'../../src/Co   ntrollerAjax',
                data:"",
                success: function () {
                    alert('passei no test');
                }
            });
        }) */



        function dadoInput(){
            let qdtInput = $('input').length;            
            for (let i = 0; i < qdtInput; i++) {                                
            
                
            }
            console.log(a);
        }
        dadoInput();
    })
</script>