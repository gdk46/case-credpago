<?php

require_once '../require.php';

define('TABELA', 'imovel');

$dataPost = $st->Clean($_POST);

if(isset($dataPost['action'])){
    $action = $dataPost['action'];
    unset($dataPost['action']);
}

switch ($action) {
    case 'atualizar':
        $update = $db->Update(TABELA, $dataPost, "id = {$dataPost['id']}");
        $result = ($update) ? true : false;
        break;


    case 'criar':
        $create = $db->Create(TABELA, $dataPost);
        $result = ($create) ? true : false;
        echo $result;
        break;


    case 'deletar':
        $query = "id = {$dataPost['id']}";
        $read  = $db->Read(TABELA, "WHERE ".$query);
        
        if($db->NumQuery($read)){
            $delete = $db->Delete(TABELA, $query);
            $result = ($delete) ? true : false;
            echo $result;
        }
        break;


    case 'ler':
        $read = $db->Read(TABELA);
        $rowTable = "";
        foreach($read as $row){
            $readLocador = $db->Read('locador', "WHERE id = {$row['id_proprietario']}");

            foreach($readLocador as $rowLocador){
                $rowTable   .= "
                <tr>
                    <th scope='row'>{$row['id']}</th>
                    <td>{$row['logradouro']}</td>
                    <td>{$row['cidade']}</td>
                    <td>{$row['bairro']}</td>
                    <td>{$row['uf']}</td>
                    <td>{$rowLocador['nome']}</td>
                    <td>
                        <a href='?fld=cadastro&pg=imovel&id={$row['id']}' class='btn btn-primary btn-xs text-white' data-toggle='tooltip' data-placement='top' title='Editar'>
                            <i class='fas fa-edit'></i>
                        </a>

                        <a href='?fld=deletar&pg=imovel&id={$row['id']}' class='btn btn-secondary btn-xs text-white' data-toggle='tooltip' data-placement='top' title='Excluir'>
                            <i class='fas fa-trash-alt'></i>
                        </a>
                    </td>
                </tr>
                ";
            }        
        }
        echo $rowTable;
        break;


    default:
        echo "Aguardando";
        break;
}