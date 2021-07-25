<?php
ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);

require_once 'phpquery-master/phpQuery/phpQuery.php';


$str = getPageByUrl('http://old.code.mu/exercises/advanced/php/parsing/poetapnyj-parsing-i-metod-pauka/1/index.php');

	$pq = phpQuery::newDocument($str);

    $content = $pq->find('a');
//  var_dump( $str ); die;


    // var_dump($pq);
    // die;
  

    foreach( $content as $elem ){

        $pqElem = pq($elem);

        // $city = $pqElem->find('td:eq(0)');
        // $distric = $pqElem->find('td:eq(1)');
        // $region = $pqElem->find('td:eq(3)');
        // var_dump($city->text());
        // var_dump($distric->text());
        var_dump($pqElem->text());
        var_dump($pqElem->attr('href'));


        // $arrElemAttr[] = $pqElem->attr('href');
        // $arrElem[] = $pqElem->text();
        // if ($pqElem->find('a')) $pqElem->replaceWith($pqElem->find('a'));
        // $pqElem->replaceWith($pqElem->text());
    }  
    // var_dump($arrElem);
    // var_dump($arrElemAttr);
    // echo $pq->html();

    // $pq("")
    
	/* $links = $pq->find('a');

	foreach ($links as $link) {

		$pqLink = pq($link); //pq делает объект phpQuery

		$text[] = $pqLink->html();
		$href[] = $pqLink->attr('href');
	}

	var_dump($text);
	var_dump($href); */


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
