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
        echo $result;
        break;


    case 'intup-update':
        $query = "WHERE id= {$dataPost['id']}";
        $read  = $db->Read(TABELA, $query);
        $inputUpdate = "";
        foreach ($read as $row) {
            $readLocador = $db->Read('locador', "WHERE id = {$row['id_proprietario']}");

            foreach ($readLocador as $rowLocador) {
                $inputUpdate   .= "
                    <div class='col-4'>
                        <label>Locatário:</label>
                        <input type='text' class='form-control' value='{$rowLocador['nome']}' disabled>
                    </div>

                    <div class='col-4'>
                        <label>Cep:</label>
                        <div class='input-group mb-3'>
                            <input type='text' name='cep' class='form-control' value='{$row['cep']}'>
                            <div class='input-group-append'>
                                <button type='button' class='btn btn-primary' id='buscaCep'><i class='fas fa-search'></i></button>
                            </div>
                        </div>
                    </div>


                    <div class='col-4'>
                        <label>logradouro:</label>
                        <input type='text' name='logradouro' class='form-control' value='{$row['logradouro']}'>
                    </div>

                    <div class='col-4'>
                        <label>complemento:</label>
                        <input type='text' name='complemento' class='form-control' value='{$row['complemento']}'>
                    </div>

                    <div class='col-4'>
                        <label>cidade:</label>
                        <input type='text' name='cidade' class='form-control' value='{$row['cidade']}'>
                    </div>

                    <div class='col-4'>
                        <label>bairro:</label>
                        <input type='text' name='bairro' class='form-control' value='{$row['bairro']}'>
                    </div>

                    <div class='col-4'>
                        <label>UF:</label>
                        <input type='text' name='uf' class='form-control' value='{$row['uf']}'>
                    </div>
                ";
            }
        }

        echo $inputUpdate;
        break;


    case 'criar':
        $create = $db->Create(TABELA, $dataPost);
        $result = ($create) ? true : false;
        echo $result;
        break;


    case 'intup-create':
        $read = $db->Read(TABELA);
        $inputCreate = "";

        $readLocador = $db->Read('locador');
        $inputCreate   .= "
                <div class='form-group col-md-4'>
                    <label for='inputState'>Locador:</label>
                    <select id='proprietario' class='form-control' name='id_proprietario'>";
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
                        <input type='text' name='cep' class='form-control'>
                        
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
                    <label>bairro:</label>
                    <input type='text' name='bairro' class='form-control'>
                </div>
    
                <div class='col-4'>
                    <label>UF:</label>
                    <select id='uf' name='uf' class='form-control'>
                        <option value='AC'>AC</option>
                        <option value='AL'>AL</option>
                        <option value='AP'>AP</option>
                        <option value='AM'>AM</option>
                        <option value='BA'>BA</option>
                        <option value='CE'>CE</option>
                        <option value='DF'>DF</option>
                        <option value='ES'>ES</option>
                        <option value='GO'>GO</option>
                        <option value='MA'>MA</option>
                        <option value='MT'>MT</option>
                        <option value='MS'>MS</option>
                        <option value='MG'>MG</option>
                        <option value='PA'>PA</option>
                        <option value='PB'>PB</option>
                        <option value='PR'>PR</option>
                        <option value='PE'>PE</option>
                        <option value='PI'>PI</option>
                        <option value='RJ'>RJ</option>
                        <option value='RN'>RN</option>
                        <option value='RS'>RS</option>
                        <option value='RO'>RO</option>
                        <option value='RR'>RR</option>
                        <option value='SC'>SC</option>
                        <option value='SP'>SP</option>
                        <option value='SE'>SE</option>
                        <option value='TO'>TO</option>
                    </select>
                </div>
            ";
        echo $inputCreate;
        break;


    case 'deletar':
        $query = "id = {$dataPost['id']}";
        $read  = $db->Read(TABELA, "WHERE " . $query);

        if ($db->NumQuery($read)) {
            $delete = $db->Delete(TABELA, $query);
            $result = ($delete) ? true : false;
        }
        echo $result;
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

                        <a href='?fld=gerar&pg=contrato&id={$row['id']}' class='btn btn-success btn-xs text-white' data-toggle='tooltip' data-placement='top' title='Gerar contrato'>
                            <i class='fas fa-file'></i>
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
