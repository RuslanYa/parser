<?php 
/**
 * Класс подключения к БД
 */
class Db
{

    public $dsn = 'mysql:dbname=parser;host=localhost;charset=UTF8';
    public $user = 'admin';
    public $password = '6mhHXb8pFAaM';
    public $db;


    public function __construct()
    {
        try {

            $this->db = new PDO( $this->dsn, $this->user, $this->password );

            } catch(PDOException $e) {
                echo 'Не удалось подключиться к MySQL: ' . $e->getMessage();
            }
    }
}   


?>