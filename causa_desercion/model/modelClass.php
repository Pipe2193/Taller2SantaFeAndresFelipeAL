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
  static public function getCausa() {
    try {
      $sql = 'SELECT desc_causa FROM causa_desercion';
      return dataBaseClass::getCnx()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
  /**
   * 
   * @return \PDOException
   */
  static public function getData() {
    try {
      $sql = 'SELECT cod_causa, desc_causa, estado FROM causa_desercion';
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
      $sql = 'SELECT cod_causa, desc_causa, estado FROM causa_desercion WHERE cod_causa = ' . $id;
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
      $sql = 'SELECT cod_causa FROM causa_desercion WHERE cod_causa = ' . $id;
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
  static public function newCausa($id, $descripcion, $estado) {
    try {
      $descripcion = strtoupper($descripcion);
      $estado = strtoupper($estado);
      $sql = "INSERT INTO causa_desercion (cod_causa, desc_causa, estado) VALUES (" . $id . ", '$descripcion', '$estado')";
      //echo $sql;
      //exit();
      DataBaseClass::getCnx()->beginTransaction();
      $anwr = DataBaseClass::getCnx()->exec($sql);
      DataBaseClass::getCnx()->commit();
      if ($anwr !== false) {
        $anwr = true;
      } else {
        throw new PDOException("This Causa $id, $descripcion  has already been REGISTERED");
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
  static public function delCausa($id) {
    try {

      $sql = "DELETE FROM causa_desercion WHERE cod_causa = " . $id;
      dataBaseClass::getCnx()->beginTransaction();
      $rsp = dataBaseClass::getCnx()->exec($sql);
      dataBaseClass::getCnx()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        return $rsp . 'You can NOT Delete this Record!.' . "$id";
      }
      return $rsp;
    } catch (PDOException $e) {

      dataBaseClass::getCnx()->rollback();
    }
  }

  static public function updateCausa($id, $data) {
    try {

      $sql = "UPDATE causa_desercion SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE cod_causa = " . $id;

      dataBaseClass::getCnx()->beginTransaction();
      $rsp = dataBaseClass::getCnx()->exec($sql);
      dataBaseClass::getCnx()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("la Causa no ha podido ser actualizada");
      }
      return $rsp;
    } catch (PDOException $e) {
      DataBaseClass::getCnx()->rollBack();
      return $e;
    }
  }

}

?>