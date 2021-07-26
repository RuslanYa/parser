<?php
ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);
require_once 'Db.php';
require_once 'Parser.php';


$db = new Db;
 
$str = getPageByUrl('http://old.code.mu/exercises/advanced/php/parsing/poetapnyj-parsing-i-metod-pauka/1/index.php');

$parser = new Parser( $str );

$arr1 = $parser->getAttr( '#menu a', 'href' );  
$arr2 = $parser->getContent( '#menu a' );  

var_dump($arr1);
var_dump($arr2);






function getPageByUrl ($url)
{
    //Инициализируем сеанс
    $curl = curl_init();

    //Указываем адрес страницы
    curl_setopt($curl, CURLOPT_URL, $url);

    //Ответ сервера сохранять в переменную, а не на экран		
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //Переходить по редиректам
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

    //Выполняем запрос:		
    $result = curl_exec($curl);

    //Отлавливаем ошибки подключения
    if ($result === false) {			echo "Ошибка CURL: " . curl_error($curl);
        return false;
    } else {
        return $result;
    }
}


?>
