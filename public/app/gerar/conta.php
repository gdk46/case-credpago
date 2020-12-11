<div class="col-12">
    <h3>Contrato</h3>


    <div class="row col-md-3 col-sm-12">
        <label for="">Parcelas</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control" name="parcelas" value="12">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" id="gerar"><i class="fas fa-sync"></i> gerar parcelas</button>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3 mb-5" id="input-grup">
        </div>

        <div class="col-md-1 mb-5"></div>

        <div class="col-md-8 mb-5">
            <h3>Mensalidade</h3>
            <div id="resultado">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Parcela</th>
                            <th scope="col">Valor (R$)</th>
                            <th scope="col">Data Vencimento</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="contanierMensalidade">
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-md-3">
        </div>

        <div class="col-md-1"></div>


        <div class="col-md-8">
            <h3>Repasses</h3>
            <div id="resultado">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Parcela</th>
                            <th scope="col">Valor (R$)</th>
                            <th scope="col">Data Vencimento</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="contanierRepasse">
                    </tbody>
                </table>
            </div>
        </div>



        <div class="col-md-3">
            <div class='form-group row'>
                <div class='col-12'>
                    <button class='btn btn-success' id='enviar'>
                        Registre
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {

        /**
         * Gerador de inputs
         *
         * @param array arr
         * @param string container
         * @return array
         */
        function generateRowParcel(arr, container) {
            let row = "";
            for (let i = 0; i < arr.length; i++) {

                row += `
                    <tr>
                        <th scope="row" class="indice">
                            ${arr[i]['indice']}
                        </th>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control valorParcela" value="${arr[i]['valor']}">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control dataParcela" value="${arr[i]['data']}">
                            </div>
                        </td>
                        <td>
                            ${arr[i]['status']}
                        </td>
                    </tr>
                `;
            }
            $(container + " tr").remove()
            $(container).append(row)
        }


        /**
         * Novas parcelas
         *
         * @param array elementOfInput
         * @param string value
         * @return array
         */
        function newParcel(elementOfInput) {
            let newParcel = []
            $(elementOfInput).each(function() {
                newParcel.push({
                    name : this.value
                })
            })
            return newParcel
        }



        function joinParcel(arrValue, arrDate) {
            if (arrValue.length == arrDate.length) {
                let joinParcel = [];
                for (let i = 0; i < arrDate.length; i++) {
                    joinParcel.push({
                        "data": arrDate[i],
                        "valor": arrValue[i]
                    })
                }
                return joinParcel;
            }
        }



        let url_string = window.location.href;
        let url = new URL(url_string);
        let id = parseInt(url.searchParams.get("contrato"));

        if (id == null) {
            alert('Contrato não definido')
        } else {
            $.ajax({
                type: 'POST',
                url: '../../src/ControllerAjax/contrato.ajax.php',
                data: {
                    "action": "gerar",
                    "contrato": id
                },
                success: function(data) {
                    $("#input-grup").append(data)
                }
            });


            let contanierMensalidade = "#contanierMensalidade"
            let contanierRepasse = "#contanierRepasse"
            $('#gerar').click(function() {
                let qtdParcela = $("input[name=parcelas]").val()
                if (qtdParcela != 0 && qtdParcela != "") {

                    let valMensalidade = $("input[name=mensalidade]").val()
                    let valRepasse = $("input[name=repasse]").val()

                    let vectorData = $("input[name=data_inicio]").val().split('/')
                    let dia = parseInt(vectorData[0])
                    let mes = parseInt(vectorData[1])
                    let ano = parseInt(vectorData[2])


                    let arrDateMensalidade = generateDate(dia, mes, ano, qtdParcela)
                    var parcelMensalidade = generateParcel(arrDateMensalidade, valMensalidade);
                    generateRowParcel(parcelMensalidade, contanierMensalidade)


                    // dia comum mais 5 dias úteis para fazer o repasse
                    let arrDateRepasse = generateDate((dia + 5), mes, ano, qtdParcela)
                    var parcelRepasse = generateParcel(arrDateRepasse, valRepasse);
                    generateRowParcel(parcelRepasse, contanierRepasse)
                }
            })


            $("#enviar").click(function() {

                let valMensalidade = newParcel(`${contanierMensalidade} .valorParcela`, 'valor')
                let datMensalidade = newParcel(`${contanierMensalidade} .dataParcela`, 'data')
                let Mensalidade = joinParcel(valMensalidade, datMensalidade)


                let valRepasse = newParcel(`${contanierRepasse} .valorParcela`, 'valor')
                let datRepasse = newParcel(`${contanierRepasse} .dataParcela`, 'data')
                let Repasse = joinParcel(valRepasse, datRepasse)


                $.ajax({
                    type: 'POST',
                    url: '../../src/ControllerAjax/mensalidadeCriar.ajax.php',
                    data: {
                        "action": "criar",
                        "id": id,
                        'arrMensalidade': Mensalidade
                    }
                });


                $.ajax({
                    type: 'POST',
                    url: '../../src/ControllerAjax/repasseCriar.ajax.php',
                    data: {
                        "action": "criar",
                        "id": id,
                        'arrRepasse': Repasse
                    }
                });

                
                $(location).attr('href', '?fld=lista&pg=imovel');
            })
        }
    });
</script>