<?php

require_once '../require.php';

define('TABELA', 'imovel');

$dataPost = $st->Clean($_POST);

if (isset($dataPost['action'])) {
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
        $read  = $db->Read(TABELA, "WHERE " . $query);

        if ($db->NumQuery($read)) {
            $delete = $db->Delete(TABELA, $query);
            $result = ($delete) ? true : false;
            echo $result;
        }
        break;


    case 'ler':
        $read = $db->Read(TABELA);
        $rowTable = "";
        foreach ($read as $row) {
            $readLocador = $db->Read('locador', "WHERE id = {$row['id_proprietario']}");

            foreach ($readLocador as $rowLocador) {
                $rowTable   .= "
                <tr>
                    <th scope='row'>{$row['id']}</th>
                    <td>{$row['logradouro']}</td>
                    <td>{$row['cidade']}</td>
                    <td>{$row['bairro']}</td>
                    <td>{$row['uf']}</td>
                    <td>{$rowLocador['nome']}</td>
                    <td>
                        <a href='?fld=atualizar&pg=imovel&id={$row['id']}' class='btn btn-primary btn-xs text-white' data-toggle='tooltip' data-placement='top' title='Editar'>
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
    case 'intup-create':
        $read = $db->Read(TABELA);
        $inputCreate = "";

        $readLocador = $db->Read('locador');
        $inputCreate   .= "
        <div class='form-group col-md-4'>
            <label for='inputState'>Locador:</label>
            <select id='inputState' class='form-control' name='id_proprietario'>";        
        foreach ($readLocador as $rowLocador) {
            $inputCreate .= "
                <option value='{$rowLocador['id']}'>{$rowLocador['nome']}</option>
            ";
        }
        $inputCreate   .= "
            </select>
        </div>
        ";
        $inputCreate   .= "

            <div class='col-4'>
                <label>Cep:</label>
                <div class='input-group mb-3'>
                    <input type='text' class='form-control'>
                    <div class='input-group-append'>
                        <button type='button' class='btn btn-primary'><i class='fas fa-search'></i></button>
                    </div>
                </div>
            </div>


            <div class='col-4'>
                <label>logradouro:</label>
                <input type='text' name='logradouro' class='form-control'>
            </div>

            <div class='col-4'>
                <label>complemento:</label>
                <input type='text' name='complemento' class='form-control'>
            </div>

            <div class='col-4'>
                <label>cidade:</label>
                <input type='text' name='cidade' class='form-control'>
            </div>

            <div class='col-4'>
                <label>UF:</label>
                <select name='uf' class='form-control'>
                    <option value='AC'>Acre</option>
                    <option value='AL'>Alagoas</option>
                    <option value='AP'>Amapá</option>
                    <option value='AM'>Amazonas</option>
                    <option value='BA'>Bahia</option>
                    <option value='CE'>Ceará</option>
                    <option value='DF'>Distrito Federal</option>
                    <option value='ES'>Espírito Santo</option>
                    <option value='GO'>Goiás</option>
                    <option value='MA'>Maranhão</option>
                    <option value='MT'>Mato Grosso</option>
                    <option value='MS'>Mato Grosso do Sul</option>
                    <option value='MG'>Minas Gerais</option>
                    <option value='PA'>Pará</option>
                    <option value='PB'>Paraíba</option>
                    <option value='PR'>Paraná</option>
                    <option value='PE'>Pernambuco</option>
                    <option value='PI'>Piauí</option>
                    <option value='RJ'>Rio de Janeiro</option>
                    <option value='RN'>Rio Grande do Norte</option>
                    <option value='RS'>Rio Grande do Sul</option>
                    <option value='RO'>Rondônia</option>
                    <option value='RR'>Roraima</option>
                    <option value='SC'>Santa Catarina</option>
                    <option value='SP'>São Paulo</option>
                    <option value='SE'>Sergipe</option>
                    <option value='TO'>Tocantins</option>
                </select>
            </div>
        ";
        echo $inputCreate;
        break;

    default:
        echo "Aguardando";
        break;
}
