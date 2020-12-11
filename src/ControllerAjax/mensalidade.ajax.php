<?php

require_once '../require.php';

define('TABELA', 'mensalidade');

$dataPost = $st->Clean($_POST);

if (isset($dataPost['action'])) {
    $action = $dataPost['action'];
    unset($dataPost['action']);
}

switch ($action) {
    case 'atualizar':
        $dataPost['data'] = $ft->FormatDataEua($dataPost['data']);
        $dataPost['valor_mensalidade'] = $ft->FormatMoneyDB($dataPost['valor_mensalidade']);

        $update = $db->Update(TABELA, $dataPost, "id = {$dataPost['id']}");
        $result = ($update) ? true : false;
        echo $result;
        break;

    case 'intup-update':
        $query = "WHERE id= {$dataPost['id']}";
        $read  = $db->Read(TABELA, $query);
        $inputUpdate = "";
        foreach ($read as $row) {
            $inputUpdate .= "
                <div class='form-group col-md-4'>
                    <label for='inputState'>Status: ({$row['status']})</label>
                    <select id='inputState' class='form-control' name='status'>
                        <option value='EM ABERTO'>EM ABERTO</option>
                        <option value='PAGA'>PAGA</option>
                    </select>
                </div>

                <div class='col-4'>
                    <label>Mensalidade:</label>
                    <input type='text' name='valor_mensalidade' class='form-control' value='{$ft->FormatMoney($row['valor_mensalidade'])}'>
                </div>

                <div class='col-4'>
                    <label>Data:</label>
                    <input type='text' name='data' class='form-control' value='{$ft->FormatDataBr($row['data'])}'>
                </div>    
            ";
        }
        echo $inputUpdate;
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
            $readContrato = $db->Read('contrato', "WHERE id = {$row['id_contrato']}");

            foreach ($readContrato as $rowContrato) {
                $readLocador = $db->Read('locador', "WHERE id = {$rowContrato['id_locador']}");

                foreach ($readLocador as $rowLocador) {
                    $rowTable   .= "
                    <tr>
                        <th scope='row'>{$row['id']}</th>
                        <td>{$rowLocador['nome']}</td>
                        <td>{$ft->FormatMoney($row['valor_mensalidade'])}</td>
                        <td>{$row['status']}</td>
                        <td>{$ft->FormatDataBr($row['data'])}</td>
                        <td>
                            <a href='?fld=atualizar&pg=mensalidade&id={$row['id']}' class='btn btn-primary btn-xs text-white' data-toggle='tooltip' data-placement='top' title='Editar'>
                                <i class='fas fa-edit'></i>
                            </a>

                            <a href='?fld=deletar&pg=mensalidade&id={$row['id']}' class='btn btn-secondary btn-xs text-white' data-toggle='tooltip' data-placement='top' title='Excluir'>
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



    default:
        echo "Aguardando";
        break;
}
