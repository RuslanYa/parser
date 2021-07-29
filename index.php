<?php

/* 
* Парсинг стран, городов, описаний с 
* конкретного сайта и сохранения в БД
*/

ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);

require_once 'Db.php';
require_once 'Parser.php';

$domen = "http://planetolog.ru/";
$db = new Db;
$parser = new Parser;

/*
// Парсим страны  со страницы в БД
$url ='http://planetolog.ru/city-world-list.php';
$parser->setUrl( $url );
$links = $parser->getAttr( '.CountryList:odd a', 'href' );  
$names = $parser->getContent( '.CountryList:odd a' );  

// Сохраняем страны в БД
for ($i=0; $i < count($links); $i++) { 
    $query = "INSERT INTO countries ( name, link ) VALUES ('$names[$i]','$domen$links[$i]')"; 
    $db->db->query($query);
}
**/


/* // Парсим города из  стран в БД
$query = "SELECT name, link FROM countries";
$result = $db->db->query($query);
$links =  $result->fetchAll( PDO::FETCH_NUM);

for ($i=0; $i < count($links); $i++) { 

    $parser->setUrl( $links[$i][1] );
    $cityLinks = $parser->getAttr( '.CountryList:odd a', 'href' );  
    $names = $parser->getContent( '.CountryList:odd a' );  

    for ($j=0; $j < count($cityLinks); $j++) { 

    // Сохраняем города в БД
    $query = "INSERT INTO cities ( name, description ) VALUES ('$names[$j]','$cityLinks[$j]')"; 
    // echo $query . "";
    $db->db->query($query);

    }

}
*/

/* 
// Парсим описания городов из  БД

$query = "SELECT link FROM cities";
$result = $db->db->query($query);
$links =  $result->fetchAll( PDO::FETCH_NUM);

for ($j=0; $j < count($links); $j++) {
    
    $url = $domen . $links[$j][0];

    $parser->setUrl( $url );
    $content = $parser->getContent( '.textplane p' );

    $k = $j+1;
    $query = "UPDATE cities SET description='$content[0]'   WHERE id='$k'";
     echo $query . "";
    $db->db->query($query);
}
 */


?>
