<?php

/**
 * Classe responsável pelo gerenciamento dos bancos de dados
 *
 * @author Jamerson Alves
 */

 
class Database {

    private $Host = "localhost";
    private $User = "root";
    private $Pass = "";
    private $Db   = "caseimobiliaria";
    private $MyConn = "";


    // =============== FAZ A CONEXÃO COM O BANCO DE DADOS
    private function Conn() {
        $this->MyConn = mysqli_connect($this->Host, $this->User, $this->Pass, $this->Db, '3306');
        return $this->MyConn;
    }



    // =============== FAZ O INSERT
    public function Create($Tabela, array $Dados, $debugg = false) {
        $Campos = implode(',', array_keys($Dados));
        $Fields = "'" . implode("','", array_values($Dados)) . "'";
        $SqlCreate = "INSERT INTO {$Tabela} ({$Campos}) VALUES({$Fields})";
        $QuerySqlCreate = mysqli_query($this->Conn(), $SqlCreate);
        
        if($debugg){
            echo $SqlCreate;
        }

        
        if ($QuerySqlCreate) :
            return true;
        else:
            echo mysqli_error($this->Conn());
        endif;
    }




    // ================= FAZ LEITURA
    public function Read($Tabela, $Condicao = NULL) {
        $SqlRead = "SELECT * FROM {$Tabela} {$Condicao}";
        //echo $SqlRead;
        $QueryRead = mysqli_query($this->Conn(), $SqlRead);

        if ($QueryRead):
            return $QueryRead;
        else:
            echo mysqli_error($this->Conn());
        endif;
    }


    // ================= FAZ LEITURA COM INNER JOIN
    public function ReadComposta($Query) {
        $QueryRead = mysqli_query($this->Conn(), $Query);
        if ($QueryRead):
            return $QueryRead;
        else:
            echo mysqli_error($this->Conn());
        endif;
    }



    // ================= FAZ EDIÇÃO
    public function Update($Tabela, array $Dados, $Condicao = NULL) {
        foreach ($Dados as $Keys => $ValuesKeys) {
            $CamposFields[] = "$Keys = '$ValuesKeys'";
        }

        $CamposFields = implode(", ", $CamposFields);
        $SqlUpdate = "UPDATE {$Tabela} SET {$CamposFields} WHERE {$Condicao}";
        $QueryUpdate = mysqli_query($this->Conn(), $SqlUpdate);

        if ($QueryUpdate):
            return true;
        else:
            echo mysqli_error($this->Conn());
        endif;
    }



    // ================= FAZ DELETE
    public function Delete($Tabela, $Condicao = NULL) {
        $SqlDelete = "DELETE FROM {$Tabela} WHERE {$Condicao}";
        $QueryDelete = mysqli_query($this->Conn(), $SqlDelete);

        if ($QueryDelete):
            return true;
        else:
            echo mysqli_error($this->Conn());
        endif;
    }



    // ================= BUSCA QUANTIDADE DE LINHAS
    public function NumQuery($Query) {
        $CountQuery = mysqli_num_rows($Query);
        return $CountQuery;
    }
}