<?php

class Database
{
  private $link;

  public function __construct()
  {
    $this->connect();
  }

  public function connect()
  {
    require_once 'config.php';
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
    $this->link = new PDO($dsn, DB_USER, DB_PASSWORD);
    return $this;
  }

  public function execute($sql)
  {
    $sth = $this->link->prepare($sql);
    return $sth->execute();
  }

  public function query($sql)
  {
    $sth = $this->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    if ($result === false) {
      return [];
    }
    return $result;
  }

  public function prepare($sql)
  {
    try {
      return $sth = $this->link->prepare($sql);
    } catch (PDOException $exception) {
      die('ERROR: ' . $exception->getMessage());
    }
  }

}