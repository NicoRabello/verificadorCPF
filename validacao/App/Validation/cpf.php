<?php

namespace App\validation;

class CPF{

    /** metodo para verificar CPF válido 
     * @param string $cpf
     * @return boolean
     */

    public static function verificar($cpf){

        // deixar somente os números
        $cpf = preg_replace('/\D/', '', $cpf);

        //Verificar a quantidade de caracteres
        if(strlen($cpf) != 11){
            return false;
        }

        //digito verificador
        $cpfValidacao = substr($cpf, 0, 9);
        $cpfValidacao .= self::calcularDigitoVerificador($cpfValidacao);
        $cpfValidacao .= self::calcularDigitoVerificador($cpfValidacao);

        //comparação entre cpf calculado e cpf enviado
        return $cpfValidacao == $cpf;
    }

    /**
     * Método responsável por calcular um digito verificador com base em sequencia numérica
     * @param string $base
     * @return string
     */

    public static function calcularDigitoVerificador($base){

        //variaveis auxiliares
        $tamanho = strlen($base);
        $multiplicador = $tamanho + 1;

        //SOMA
        $soma = 0;

        //iteração dos números do CPF
        for ($i = 0; $i < $tamanho; $i++){
            $soma += $base[$i] * $multiplicador;
            $multiplicador--;
        }

        //resto da divisão
        $resto = $soma % 11;

        //retorna o digito verificador
        return $resto > 1 ? 11 - $resto : 0;

    }

}

?>