<?php 
/**
 * Класс создания объекта подключения к БД
 */
class Db
{
    public $dsn = 'localhost';
    public $user = 'admin';
    public $password = '6mhHXb8pFAaM';
    public $table = 'phone_book';
    public $mysqli;
   

    public function __construct()
    {
        $this->mysqli = new mysqli($this->dsn, $this->user, $this->password, $this->table);
        $this->mysqli->set_charset('utf8');
        if ($this->$mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $this->$mysqli->connect_errno . ") " . $this->$mysqli->connect_error;
        }
        // echo $this->$mysqli->host_info . "\n";
        

    }
}


?>