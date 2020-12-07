<?php

require_once '../require.php';

define('TABELA', 'locatario');

$dataPost = $st->Clean($_POST);

if(isset($dataPost['action'])){
    $action = $dataPost['action'];
    unset($dataPost['action']);
}

switch ($action) {
    case 'atualizar':
        $update = $db->Update(TABELA, $_POST, "id = {$dataPost['id']}");
        $result = ($update) ? true : false;
        echo $result;
        break;

    case 'criar':
        $create = $db->Create(TABELA, $_POST);
        $result = ($create) ? true : false;
        echo $result;
        break;

    case 'deletar':
        $query = "id = {$dataPost['id']}";
        $read  = $db->Read(TABELA, "WHERE ".$query);
        
        if($db->NumQuery($read)){
            $delete      = $db->Delete(TABELA, $query);
            $result = ($delete) ? true : false;
            echo $result;
        }
        break;

    case 'ler':
        $read = $db->Read(TABELA);
        $rowTable = "";
        foreach($read as $row){
            $rowTable .= "
            <tr>
                <th scope='row'>{$row['id']}</th>
                <td>{$row['nome']}</td>
                <td>{$row['email']}</td>
                <td>{$row['telefone']}</td>
                <td>
                    <button type='button' class='btn btn-primary btn-xs' data-toggle='tooltip' data-placement='top' title='Editar'>
                        <i class='fas fa-edit'></i>
                    </button>

                    <button type='button' onclick='excluir({$row['id']})' class='btn btn-secondary btn-xs excluir' data-toggle='modal' data-target='#exampleModal'>
                        <i class='fas fa-trash-alt'></i>
                    </button>
                </td>
            </tr>
            ";            
        }
        echo $rowTable;
        break;

    default:
        echo "Aguardando";
        break;
}