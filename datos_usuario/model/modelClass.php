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
      $sql = 'SELECT id,usuario_id, nombre, apellido, direccion, telefono, localidad_id FROM datos_usuario';
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
      $sql = 'SELECT id, usuario_id, nombre, apellido, direccion, telefono, localidad_id FROM datos_usuario WHERE id = ' . $id;
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
      $sql = 'SELECT id FROM datos_usuario WHERE id = ' . $id;
      return dataBaseClass::getCnx()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function newDatUser($id, $userId, $nombre, $apellido, $direccion, $telefono, $localidad) {
    try {
      $apellido = $sql = "INSERT INTO datos_usuario (id,usuario_id, nombre, apellido, direccion, telefono, localidad_id) VALUES ($id, '$userId', '$nombre', '$apellido', '$direccion', '$telefono', '$localidad')";
      //echo $sql;
      //exit();
      DataBaseClass::getCnx()->beginTransaction();
      $anwr = DataBaseClass::getCnx()->exec($sql);
      DataBaseClass::getCnx()->commit();
      if ($anwr !== false) {
        $anwr = true;
      } else {
        throw new PDOException("This  $id, $nombre $apellido has already been REGISTERED");
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
  static public function delDatUser($id) {
    try {

      $sql = "DELETE FROM datos_usuario WHERE id = " . $id;
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

  static public function updateDatUser($id, $data) {
    try {

      $sql = "UPDATE Datos_usuario SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE id = " . $id;

      dataBaseClass::getCnx()->beginTransaction();
      $rsp = dataBaseClass::getCnx()->exec($sql);
      dataBaseClass::getCnx()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("Los Datos Del Usuario no han podido ser actualizado", 2632);
      }
      return $rsp;
    } catch (PDOException $e) {
      DataBaseClass::getCnx()->rollBack();
      return $e;
    }
  }

}

?>