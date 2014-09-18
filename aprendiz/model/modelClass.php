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
  static public function getRh() {
    try {
      $sql = 'SELECT rh.cod_rh, rh.desc_rh FROM rh';
      return dataBaseClass::getCnx()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

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
   * @return \PDOException
   */
  static public function getTid() {
    try {
      $sql = 'SELECT cod_tip_id, desc_tip_id FROM tipo_id';
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
      $sql = 'SELECT id_apre, nom_apre, apell_apre, tel_apre, cod_ciudad, cod_rh, cod_tipo_id, genero, edad FROM aprendiz';
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
      $sql = 'SELECT id_apre, nom_apre, apell_apre, tel_apre, cod_ciudad, cod_rh, cod_tipo_id, genero, edad FROM aprendiz WHERE id_apre = ' . $id;
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
      $sql = 'SELECT id_apre FROM aprendiz WHERE id_apre = ' . $id;
      return dataBaseClass::getCnx()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   *  funcion para registrar un aprendiz
   * @param type $id
   * @param type $nombre
   * @param type $apellido
   * @param type $telefono
   * @param type $codciudad
   * @param type $codrh
   * @param type $codtipid
   * @param type $genero
   * @param type $edad
   * @return boolean|\PDOException
   * @throws PDOException
   */
  static public function newAprendiz($id, $nombre, $apellido, $telefono, $codciudad, $codrh, $codtipid, $genero, $edad) {
    try {
      $nombre = strtoupper($nombre);
      $apellido = strtoupper($apellido);
      $sql = "INSERT INTO aprendiz (id_apre, nom_apre, apell_apre, tel_apre, cod_ciudad, cod_rh, cod_tipo_id, genero, edad) VALUES (" . $id . ", '$nombre', '$apellido', $telefono, $codciudad, $codrh, $codtipid, '$genero', $edad)";
      //echo $sql;
      //exit();
      DataBaseClass::getCnx()->beginTransaction();
      $anwr = DataBaseClass::getCnx()->exec($sql);
      DataBaseClass::getCnx()->commit();
      if ($anwr !== false) {
        $anwr = true;
      } else {
        throw new PDOException("This student $id, $nombre $apellido has already been REGISTERED");
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
  static public function delAprendiz($id) {
    try {

      $sql = "DELETE FROM aprendiz WHERE id_apre = " . $id;
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

  static public function updateAprendiz($id, $data) {
    try {

      $sql = "UPDATE aprendiz SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE id_apre = " . $id;

      dataBaseClass::getCnx()->beginTransaction();
      $rsp = dataBaseClass::getCnx()->exec($sql);
      dataBaseClass::getCnx()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El Aprendiz no ha podido ser actualizado", 2632);
      }
      return $rsp;
    } catch (PDOException $e) {
      DataBaseClass::getCnx()->rollBack();
      return $e;
    }
  }

}

?>