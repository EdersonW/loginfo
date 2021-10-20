<?php
 namespace App\View\Helper;
 use Cake\View\Helper;
 
 class UtilHelper extends Helper{
    // FUNÇÃO RETORNA A LISTA DE UNIDADES DE MEDIDA
    public static function getListUnitMeasurement($codSelected = null){
        $select = '';
        $lists = [
            ['cod' => '1' , 'desc' => 'Litro'],
            ['cod' => '2' , 'desc' => 'Quilograma'],
            ['cod' => '3' , 'desc' => 'Unidade'],
        ];
        foreach($lists as $list){
            if($list['cod'] == $codSelected){
                $select  = $select .'<option selected  value="'.$list['cod'].'">'.$list['desc'].'</option>';
            }else{
                $select  = $select .'<option  value="'.$list['cod'].'">'.$list['desc'].'</option>';
            }  
        }
         return $select;
    } 
     // FUNÇÃO RETORNA A LISTA DE UNIDADES DE MEDIDA
     public static function getDescUnitMeasurement($cod = null){
        $lists = [
            ['cod' => '1' , 'desc' => 'Litro'],
            ['cod' => '2' , 'desc' => 'Quilograma'],
            ['cod' => '3' , 'desc' => 'Unidade'],
        ];
        foreach($lists as $list){
           if($list['cod'] == $cod ) return $list['desc'];
        }
         return '';
    } 


 }
