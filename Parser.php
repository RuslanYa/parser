<?php
require_once 'phpquery-master/phpQuery/phpQuery.php';

class Parser { 
    public $str; 
    public $pq; 
    function __construct( string $str ){

        $this->str = $str;
        $this->pq = phpQuery::newDocument($str);

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
        $this->expr = $expr;
        
        $content = $this->pq->find($this->expr);
        $arr = [];
        
            foreach( $content as $elem ){

                $pqElem = pq($elem);
        
                $arr[] = $pqElem->html();
        
            }  
        return $arr;
    }


}