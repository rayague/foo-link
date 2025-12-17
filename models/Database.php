<?php
class Database
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=foo_link;charset=utf8", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function prepare($sql) {
        return $this->pdo->prepare($sql);
    }

    public function query($sql) {
        return $this->pdo->query($sql);
    }
}