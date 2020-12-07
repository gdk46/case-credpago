<?php

    /**
     * Gerador de parcelas
     *
     * @param int $parcela
     * @param int $mesAtual
     * @param int $anoAtual
     * @param string $diaPagamento
     * @return array
     */ 
    function genereteParcel(int $parcela, int $mesAtual, int $anoAtual, $diaPagamento = "01"){        
        for ($qtdParcelas = $parcela; $qtdParcelas > 0 && $qtdParcelas <= $parcela; $qtdParcelas -= 1) {
            $mesAtual ++;
            if($mesAtual > 12){
                $anoAtual += 1;
                $mesAtual = 1;
            }

            if($mesAtual <= 9){
                $mesAtual = "0".$mesAtual;
            }


            $arrParcela[] = [
                "data" => "{$anoAtual}-{$mesAtual}-$diaPagamento",
                "status" => "EM ABERTO"
            ];
        }

        return $arrParcela;
    }

