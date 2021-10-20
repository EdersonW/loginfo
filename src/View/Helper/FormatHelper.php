<?php
 namespace App\View\Helper;
 use Cake\View\Helper;
 class FormatHelper extends Helper{

    // FUNÇÃO PARA FORMATAÇÃO PARA DATA PADRÃO BR
    public static function formatDateBR($date = null){
        if($date){
            return date('d/m/Y', strtotime($date));
        }
        return '';
    } 

     // FUNÇÃO PARA FORMATAÇÃO PARA DATA PADRÃO BR
     public static function formatDecimalBR($value = null, $decimal = null){
        if($decimal){
            return number_format( $value, $decimal, ',', '.' );
        }
        return '';
    } 

      // FUNÇÃO PARA FORMATAÇÃO PARA DATA PADRÃO US
      public static function formatDecimalUS($value = null, $decimal = null){
        if($decimal){
            return number_format( $value, $decimal, '.', '' );
        }
        return '';
    } 


 }
 ?> 