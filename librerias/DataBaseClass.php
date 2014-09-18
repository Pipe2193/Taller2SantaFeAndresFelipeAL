<?php

/**
 * @author Andres Felipe Alvarez <andy_93421@hotmail.com>
 * @copyright (c) 2014, Andres Felipe Alvarez 
 */

/**
 * clase  que realizala conexion a la base de datos
 */
class DataBaseClass {

  /**
   *
   * @var type 
   */
  static private $host = 'localhost';

  /**
   * las sisguientes variables me permiten realizar a servidor de mysql
   * @var type 
   */
  static private $port = 3306,
          $dbname = 'taller',
          $user = 'root',
          $password = '',
          $driver = 'mysql', // pgsql
          $cnx = NULL;

  /**
   * esta funcion me contiene la conexion a la BD
   */
  static public function getCnx() {
    if (!self::$cnx) {
      self::connect();
    }
    return self::$cnx;
  }

  static private function connect() {
    try {
      $dsn = self::$driver
              . ':host=' . self::$host
              . ';port=' . self::$port
              . ';dbname=' . self::$dbname;
      self::$cnx = new PDO($dsn, self::$user, self::$password);
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

}

// end class DatabaseClass
?>  