<?php

/** 
 *  Класс парсера
 */

require_once 'phpquery-master/phpQuery/phpQuery.php';

class Parser { 

    public $pq; 

    function __construct(){

    }

    function setUrl( string $url ){

        $htmlPage = $this->getPageByUrl($url);
        $this->pq = phpQuery::newDocument($htmlPage);

    }

    function getAttr($expr, $atr){

        $content = $this->pq->find($expr);
        $arr = [];
        
            foreach( $content as $elem ){

                $pqElem = pq($elem);
        
                $arr[] = $pqElem->attr($atr);
        
            }  
        return $arr;

    }

    function getContent($expr){

        
        $content = $this->pq->find($expr);
        // echo $content;die;
        $arr = [];
        
            foreach( $content as $elem ){

                $pqElem = pq($elem);
        
                $arr[] = $pqElem->text();
        
            }  
        return $arr;
    }

    function getPageByUrl ($url){
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

        $result = curl_exec($curl);

        if ($result === false) {		
            	echo "Ошибка CURL: " . curl_error($curl);
            return '<p></p>';
        } else {
            return $result;
        }
    }



}