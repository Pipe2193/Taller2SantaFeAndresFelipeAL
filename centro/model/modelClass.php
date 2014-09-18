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
  static public function getCiudad() {
    try {
      $sql = 'SELECT ciudad.cod_ciudad, ciudad.nom_ciudad FROM ciudad';
      return dataBaseClass::getCnx()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   * 
   * 
   * @return \PDOException
   */
  static public function getData() {
    try {
      $sql = 'SELECT cod_centro, desc_centro, telefono, dir, cod_ciudad FROM centro';
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
      $sql = 'SELECT cod_centro, desc_centro, telefono, dir, cod_ciudad FROM centro WHERE cod_centro = ' . $id;
      return dataBaseClass::getCnx()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   * @param type $id
   * @return \PDOException
   */
  static public function certifyId($id) {
    try {
      $sql = 'SELECT cod_centro FROM centro WHERE centro.cod_centro= ' . $id;
      return dataBaseClass::getCnx()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   *  funcion para registrar un centro
   * @param type $id
   * @param type $desc
   * @param type $telefono
   * @param type $dir
   * @param type $codCiudad
   * @return boolean|\PDOException
   * @throws PDOException
   */
  static public function newCentro($id, $desc, $telefono, $dir, $codciudad) {
    try {
      $sql = "INSERT INTO centro (cod_centro, desc_centro, telefono, dir, cod_ciudad) VALUES (" . $id . ", '$desc', '$telefono', '$dir', '$codciudad')";
      DataBaseClass::getCnx()->beginTransaction();
      $anwr = DataBaseClass::getCnx()->exec($sql);
      DataBaseClass::getCnx()->commit();
      if ($anwr !== false) {
        $anwr = true;
      } else {
        throw new PDOException("El centro $id, $desc ya han sido REGISTRADOS");
      }
      return $anwr;
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function updateCentro($id, $data) {
    try {

      $sql = "UPDATE centro SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE cod_centro = " . $id;

      dataBaseClass::getCnx()->beginTransaction();
      $rsp = dataBaseClass::getCnx()->exec($sql);
      dataBaseClass::getCnx()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El centro no ha podido ser actualizado", 2632);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }

  /**
   * 
   * @param type $id
   * @return boolean|\PDOException
   * @throws PDOException
   */
  static public function deleteCentro($id) {
    try {

      $sql = "DELETE FROM centro WHERE cod_centro = " . $id;

      dataBaseClass::getCnx()->beginTransaction();
      $rsp = dataBaseClass::getCnx()->exec($sql);
      dataBaseClass::getCnx()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El Centro no ha podido ser eliminado", 2633);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getCnx()->rollback();
      return $e;
    }
  }

}

?>