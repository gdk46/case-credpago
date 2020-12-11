<?php

require_once '../require.php';

define('TABELA', 'contrato');

$dataPost = $st->Clean($_POST);

if (isset($dataPost['action'])) {
    $action = $dataPost['action'];
    unset($dataPost['action']);
}

switch ($action) {
    case 'criar':
        $create = $db->Create(TABELA, $dataPost);
        if($create){
            $read   = $db->Read(TABELA, 'ORDER BY `id` DESC LIMIT 1');
            foreach ($read as $row) {
                echo $row['id'];
            }
        }
        break;


    case 'intup-create':
        $inputCreate = "";
        $readImovel = $db->Read('imovel', "WHERE id = {$dataPost['id']} LIMIT 1");
        foreach ($readImovel as $rowImovel) {
            $readLocador = $db->Read('locador', "WHERE id = {$rowImovel['id_proprietario']}");

            foreach ($readLocador as $rowLocador) {
                $inputCreate .= "
                        <div class='col-4'>
                            <label>Código do imóvel:</label>
                            <input type='text' name='imovel' class='form-control' value='{$rowImovel['id']}' disabled>
                        </div>

                        <div class='form-group col-md-4'>
                            <label for='locador'>Locador:</label>
                            <select id='locador' class='form-control' name='locador' disabled>
                                <option value='{$rowLocador['id']}'>{$rowLocador['nome']}</option>
                            </select>
                        </div>
                    ";
            }
        }

        $readLocatario = $db->Read('locatario');
        $inputCreate .= "    
                <div class='form-group col-md-4'>
                    <label for='locatario'>Locatário:</label>
                    <select id='locatario' class='form-control' name='locatario'>";
        foreach ($readLocatario as $rowLocatario) {
            $inputCreate .= "<option value='{$rowLocatario['id']}'>{$rowLocatario['nome']}</option>";
        }
        $inputCreate .= "  
                    </select>
                </div>
            ";

        $inputCreate .= "
            <div class='col-4'>
                <label>Data início:</label>
                <input type='date' name='data_inicio' class='form-control'>
            </div>

            <div class='col-4'>
                <label>Taxa administrativa:</label>
                <input type='text' name='taxa_administrativa' class='form-control'>
            </div>

            <div class='col-4'>
                <label>Valor aluguel:</label>
                <input type='text' name='valor_aluguel' class='form-control'>
            </div>

            <div class='col-4'>
                <label>Valor condomínio:</label>
                <input type='text' name='valor_condominio' class='form-control'>
            </div>

            <div class='col-4'>
                <label>Valor IPTU:</label>
                <input type='text' name='valor_iptu' class='form-control'>
            </div>
            
        ";
        echo $inputCreate;
        break;

    case 'deletar':
        $query = "id = {$dataPost['id']}";
        $read  = $db->Read(TABELA, "WHERE " . $query);

        if ($db->NumQuery($read)) {
            $delete      = $db->Delete(TABELA, $query);
            $result = ($delete) ? true : false;
        }
        echo $result;
        break;


    case 'ler':
        $read = $db->Read(TABELA);
        $rowTable = "";
        foreach ($read as $row) {
            $readLocador = $db->Read('locador', "WHERE id = {$row['id_locador']}");

            $row['taxa_administrativa'] = (!empty($row['taxa_administrativa'])) ? $ft->FormatMoney($row['taxa_administrativa']) : "";
            $row['valor_condominio']    = (!empty($row['valor_condominio']))    ? $ft->FormatMoney($row['valor_condominio']) : "";
            $row['valor_aluguel']       = (!empty($row['valor_aluguel']))       ? $ft->FormatMoney($row['valor_aluguel']) : "";
            $row['valor_iptu']          = (!empty($row['valor_iptu']))          ? $ft->FormatMoney($row['valor_iptu']) : "";
            $row['data_inicio']         = (!empty($row['data_inicio']))         ? $ft->FormatDataBr($row['data_inicio']) : "";
            

            foreach ($readLocador as $rowLocador) {
                $readLocatario = $db->Read('locatario', "WHERE id = {$row['id_locatario']}");

                foreach ($readLocatario as $rowLocatario) {
                    $rowTable   .= "
                        <tr>
                            <th scope='row'>{$row['id']}</th>
                            <td>{$rowLocador['nome']}</td>
                            <td>{$rowLocatario['nome']}</td>
                            <td>{$row['taxa_administrativa']}</td>
                            <td>{$row['valor_condominio']}</td>
                            <td>{$row['valor_aluguel']}</td>
                            <td>{$row['valor_iptu']}</td>
                            <td>{$row['data_inicio']}</td>
                            
                            <td>
                                <a href='?fld=deletar&pg=contrato&id={$row['id']}' class='btn btn-secondary btn-xs text-white' data-toggle='tooltip' data-placement='top' title='Excluir'>
                                    <i class='fas fa-trash-alt'></i>
                                </a>
                            </td>
                        </tr>
                        ";
                }
            }
        }
        echo $rowTable;
        break;




    case 'gerar':
        $read = $db->Read(TABELA, "WHERE id = {$dataPost['contrato']} LIMIT 1");
        $gerar = "";
        foreach ($read as $row) {
            $valorTotalMensalidade = $row['valor_condominio'] + $row['valor_iptu'] + $row['valor_aluguel'];
            $valorTotalRepasse     = $row['valor_iptu'] + $row['valor_aluguel'] - $row['taxa_administrativa'];


            $row['taxa_administrativa'] = (!empty($row['taxa_administrativa'])) ? $ft->FormatMoney($row['taxa_administrativa']) : "";
            $row['valor_condominio']    = (!empty($row['valor_condominio']))    ? $ft->FormatMoney($row['valor_condominio']) : "";
            $row['valor_aluguel']       = (!empty($row['valor_aluguel']))       ? $ft->FormatMoney($row['valor_aluguel']) : "";
            $row['valor_iptu']          = (!empty($row['valor_iptu']))          ? $ft->FormatMoney($row['valor_iptu']) : "";
            $row['data_inicio']         = (!empty($row['data_inicio']))         ? $ft->FormatDataBr($row['data_inicio']) : "";
            $valorTotalMensalidade = $ft->FormatMoney($valorTotalMensalidade);
            $valorTotalRepasse     = $ft->FormatMoney($valorTotalRepasse);
            
            $gerar .= "
                <div class='form-group'>
                    <label for='data'>Data início</label>
                    <input type='text' name='data_inicio' class='form-control' value='{$row['data_inicio']}' disabled> 
                </div>
            
                <div class='form-group'>
                    <label for='data'>Aluguel</label>
                    <input type='text' name='valor_aluguel' class='form-control' value='{$row['valor_aluguel']}' disabled> 
                </div>
            
                <div class='form-group'>
                    <label for='valorEntrada'>Valor condomínio</label>
                    <input type='text' name='valor_condominio' class='form-control' value='{$row['valor_condominio']}' disabled>
                </div>

                <div class='form-group'>
                    <label for='valorEntrada'>IPTU</label>
                    <input type='text' name='valor_iptu' class='form-control' value='{$row['valor_iptu']}' disabled>
                </div>

                <div class='form-group'>
                    <label for='valorEntrada'>Valor total mensalidade</label>
                    <input type='text' name='mensalidade' class='form-control' value='{$valorTotalMensalidade}' disabled>
                </div>

                <div class='form-group'>
                    <label for='valorEntrada'>Valor total repasse</label>
                    <input type='text' name='repasse' class='form-control' value='{$valorTotalRepasse}' disabled>
                </div>
                
        ";
            
        }
        echo $gerar;
        break;



    default:
        echo "Aguardando";
        break;
}
