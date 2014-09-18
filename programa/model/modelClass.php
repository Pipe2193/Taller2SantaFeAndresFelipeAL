<?php

/**
 * @author Andres Felipe Alvarez <andy_93421@hotmail.com>
 * @copyright (c) 2014, Andres Felipe Alvarez
 * model Class es para manejar las funciones del sistema 
 */
class modelClass {

  /**
   * 
   * @return \PDOException
   */
  static public function getData() {
    try {
      $sql = 'SELECT cod_prog, desc_prog, estado FROM programa';
      return dataBaseClass::getCnx()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   * 
   * @param type $id
   * @return \PDOException
   */
  static public function getRow($id) {
    try {
      $sql = 'SELECT cod_prog, desc_prog, estado FROM Programa WHERE cod_prog = ' . $id;
      return dataBaseClass::getCnx()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   * 
   * @param type $id
   * @return \PDOException
   */
  static public function certifyId($id) {
    try {
      $sql = 'SELECT cod_prog FROM programa WHERE cod_prog = ' . $id;
      return dataBaseClass::getCnx()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   * 
   * @param type $id
   * @param type $descripcion
   * @param type $estado
   * @return boolean|\PDOException
   * @throws PDOException
   */
  static public function newPrograma($id, $descripcion, $estado) {
    try {
      $descripcion = strtoupper($descripcion);
      $estado = strtoupper($estado);
      $sql = "INSERT INTO programa (cod_prog, desc_prog, estado) VALUES (" . $id . ", '$descripcion', '$estado')";
      //echo $sql;
      //exit();
      DataBaseClass::getCnx()->beginTransaction();
      $anwr = DataBaseClass::getCnx()->exec($sql);
      DataBaseClass::getCnx()->commit();
      if ($anwr !== false) {
        $anwr = true;
      } else {
        throw new PDOException("This student $id, $descripcion has already been REGISTERED");
      }
      return $anwr;
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   * 
   * @param type $id
   * @return boolean|\PDOException
   * @throws PDOException
   */
  static public function delPrograma($id) {
    try {

      $sql = "DELETE FROM programa WHERE cod_prog = " . $id;
      dataBaseClass::getCnx()->beginTransaction();
      $rsp = dataBaseClass::getCnx()->exec($sql);
      dataBaseClass::getCnx()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("You can NOT Delete this Record!. $id");
      }
      return $rsp;
    } catch (PDOException $e) {
      DataBaseClass::getCnx()->rollback();
      return $e;
    }
  }

  static public function updatePrograma($id, $data) {
    try {

      $sql = "UPDATE programa SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE cod_prog = " . $id;

      dataBaseClass::getCnx()->beginTransaction();
      $rsp = dataBaseClass::getCnx()->exec($sql);
      dataBaseClass::getCnx()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El Programa no ha podido ser actualizado");
      }
      return $rsp;
    } catch (PDOException $e) {
      DataBaseClass::getCnx()->rollBack();
      return $e;
    }
  }

}

?>