<?php

require_once '../require.php';

define('TABELA', 'locador');


$dataPost = $st->Clean($_POST);

if (isset($dataPost['action'])) {

    $action = $dataPost['action'];
    unset($dataPost['action']);
}

switch ($action) {
    case 'atualizar':
        $update = $db->Update(TABELA, $dataPost, "id = {$dataPost['id']}");
        $result = ($update) ? true : false;
        echo $result;
        break;


    case 'criar':
        $create = $db->Create(TABELA, $dataPost);
        $result = ($create) ? true : false;
        echo $result;
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
            $rowTable .= "
            <tr>
                <th scope='row'>{$row['id']}</th>
                <td>{$row['nome']}</td>
                <td>{$row['email']}</td>
                <td>{$row['telefone']}</td>
                <td>
                    <a href='?fld=cadastro&pg=locador&id={$row['id']}' class='btn btn-primary btn-xs text-white' data-toggle='tooltip' data-placement='top' title='Editar'>
                        <i class='fas fa-edit'></i>
                    </a>

                    <a href='?fld=deletar&pg=locador&id={$row['id']}' class='btn btn-secondary btn-xs text-white' data-toggle='tooltip' data-placement='top' title='Excluir'>
                        <i class='fas fa-trash-alt'></i>
                    </a>
                </td>
            </tr>
            ";
        }
        echo $rowTable;
        break;

    case 'pesquisar':
        $read = $db->Read(TABELA);
        $rowTable = "";
        foreach ($read as $row) {
            $rowTable .= "
            <tr>
                <th scope='row'>{$row['id']}</th>
                <td>{$row['nome']}</td>
                <td>{$row['email']}</td>
                <td>{$row['telefone']}</td>
                <td>
                    <a href='?fld=atualizar&pg=locador&id={$row['id']}' class='btn btn-primary btn-xs text-white' data-toggle='tooltip' data-placement='top' title='Editar'>
                        <i class='fas fa-edit'></i>
                    </a>

                    <a href='?fld=deletar&pg=locador&id={$row['id']}' class='btn btn-secondary btn-xs text-white' data-toggle='tooltip' data-placement='top' title='Excluir'>
                        <i class='fas fa-trash-alt'></i>
                    </a>
                </td>
            </tr>
            ";
        }
        echo $rowTable;
        break;

    case 'intup-update':
        $query = "WHERE id= {$dataPost['id']}";
        $read  = $db->Read(TABELA, $query);
        $inputUpdate = "";
        foreach ($read as $row) {
            $inputUpdate .= "                
                    <div class='col-4'>
                        <label>Nome:</label>
                        <input type='text' name='nome' class='form-control' value='{$row['nome']}'>
                    </div>

                    <div class='col-4'>
                        <label>Email:</label>
                        <input type='text' name='email' class='form-control' value='{$row['email']}'>
                    </div>

                    <div class='col-4'>
                        <label>Telefone:</label>
                        <input type='text' name='telefone' class='form-control' value='{$row['telefone']}'>
                    </div>
                ";
        }
        echo $inputUpdate;
        break;
    case 'intup-create':
        $inputCreate = "";
            $inputCreate .= "                
                <div class='col-4'>
                    <label>Nome:</label>
                    <input type='text' name='nome' class='form-control''>
                </div>

                <div class='col-4'>
                    <label>Email:</label>
                    <input type='text' name='email' class='form-control'>
                </div>

                <div class='col-4'>
                    <label>Telefone:</label>
                    <input type='text' name='telefone' class='form-control'>
                </div>
            ";

        echo $inputCreate;
        break;
    default:
        echo "Aguardando";
        break;
}
