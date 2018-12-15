<?php 

namespace Model;

use Model\DB\Sql;
use Model\Model;
abstract class Crud extends Model implements CrudInterface{

    private $colunm  = [];
    private $value = [];
    private $values = [];

    public function create($table, $data = array()){
 
        $sql = new Sql();
        
        $this->setParams($data);
        // Foreach para fazer cada $value ficar com aspas simples
        foreach ($this->value as $value) {			
            array_unshift($this->values,"'$value'");;
           
        }

        // reverter o array 
        $this->values = array_reverse($this->values);
        
        $columns = implode(",", $this->colunm);
        $values = implode(",", $this->values);

        return $sql->query("INSERT INTO $table ($columns) VALUES ($values)");
    }

    private function setParams($data){

        foreach ($data as $key => $values) {

            array_push($this->colunm, $key);
            array_push($this->value, $values);

        }
    }

    public function read($table,$colunms, $where = "1 = 1"):array{

        $sql = new Sql();
        $results = $sql->select("SELECT $colunms FROM $table WHERE $where");
        return $results;
    }

    public function update($table, $data = array(), $where){
        $sql = new Sql();
        $this->setParams($data);
        
        // unindo as colunas com os valores e os valores já com aspas 
        foreach ($data as $colunm => $value) {			
            array_unshift($this->values,$colunm. " = " ."'$value'");
           
        }

        $values = implode(",", $this->values);

        $result = $sql->query("UPDATE $table SET $values WHERE $where");
        return $result;
         
    }
     
    public function delete($table, $where,$item = ""){
        $sql = new Sql();

        $sql->query("UPDATE $table SET status$item = 0 WHERE $where");


    }

    public function ValidateCnpj($cnpj){
            // Deixa o CNPJ com apenas números
            $cnpj = preg_replace( '/[^0-9]/', '', $cnpj );
            
            // Garante que o CNPJ é uma string
            $cnpj = (string)$cnpj;
            
            // O valor original
            $cnpj_original = $cnpj;
            
            // Captura os primeiros 12 números do CNPJ
            $primeiros_numeros_cnpj = substr( $cnpj, 0, 12 );
            
            /**
             * Multiplicação do CNPJ
             *
             * @param string $cnpj Os digitos do CNPJ
             * @param int $posicoes A posição que vai iniciar a regressão
             * @return int O
             *
             */
            if ( ! function_exists('multiplica_cnpj') ) {
                function multiplica_cnpj( $cnpj, $posicao = 5 ) {
                    // Variável para o cálculo
                    $calculo = 0;
                    
                    // Laço para percorrer os item do cnpj
                    for ( $i = 0; $i < strlen( $cnpj ); $i++ ) {
                        // Cálculo mais posição do CNPJ * a posição
                        $calculo = $calculo + ( $cnpj[$i] * $posicao );
                        
                        // Decrementa a posição a cada volta do laço
                        $posicao--;
                        
                        // Se a posição for menor que 2, ela se torna 9
                        if ( $posicao < 2 ) {
                            $posicao = 9;
                        }
                    }
                    // Retorna o cálculo
                    return $calculo;
                }
            }
            
            // Faz o primeiro cálculo
            $primeiro_calculo = multiplica_cnpj( $primeiros_numeros_cnpj );
            
            // Se o resto da divisão entre o primeiro cálculo e 11 for menor que 2, o primeiro
            // Dígito é zero (0), caso contrário é 11 - o resto da divisão entre o cálculo e 11
            $primeiro_digito = ( $primeiro_calculo % 11 ) < 2 ? 0 :  11 - ( $primeiro_calculo % 11 );
            
            // Concatena o primeiro dígito nos 12 primeiros números do CNPJ
            // Agora temos 13 números aqui
            $primeiros_numeros_cnpj .= $primeiro_digito;
         
            // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
            $segundo_calculo = multiplica_cnpj( $primeiros_numeros_cnpj, 6 );
            $segundo_digito = ( $segundo_calculo % 11 ) < 2 ? 0 :  11 - ( $segundo_calculo % 11 );
            
            // Concatena o segundo dígito ao CNPJ
            $cnpj = $primeiros_numeros_cnpj . $segundo_digito;
            
            // Verifica se o CNPJ gerado é idêntico ao enviado
            if ( $cnpj === $cnpj_original ) {
                return true;
            }
    }

    public function query($query){

        $sql = new Sql();
        $results = $sql->select($query);
        return $results;

    }


}