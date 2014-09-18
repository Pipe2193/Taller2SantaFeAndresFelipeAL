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
      $sql = 'SELECT num_ficha, id_apre, estado FROM matricula';
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
      $sql = 'SELECT num_ficha, id_apre, estado FROM matricula WHERE num_ficha = ' . $id;
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
      $sql = 'SELECT num_ficha FROM matricula WHERE num_ficha = ' . $id;
      return dataBaseClass::getCnx()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  /**
   *
   * @param type $id
   * @param type $idAaprendiz
   * @param type $estado
   * @return boolean|\PDOException
   * @throws PDOException
   */
  static public function newMatricula($id, $idAaprendiz, $estado) {
    try {
      $estado = strtoupper($estado);
      $sql = "INSERT INTO matricula (num_ficha, id_apre, estado) VALUES ( $id , '$idAaprendiz', '$estado')";
      //echo $sql;
      //exit();
      DataBaseClass::getCnx()->beginTransaction();
      $anwr = DataBaseClass::getCnx()->exec($sql);
      DataBaseClass::getCnx()->commit();
      if ($anwr !== false) {
        $anwr = true;
      } else {
        throw new PDOException("This student $id, $idAaprendiz has already been REGISTERED");
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
  static public function delMatricula($id) {
    try {

      $sql = "DELETE FROM matricula WHERE num_ficha = " . $id;
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

  /**
   *
   * @param type $id
   * @param type $data
   * @return boolean|\PDOException
   * @throws PDOException
   */
  static public function updateMatricula($id, $data) {
    try {

      $sql = "UPDATE matricula SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE num_ficha = " . $id;

      dataBaseClass::getCnx()->beginTransaction();
      $rsp = dataBaseClass::getCnx()->exec($sql);
      dataBaseClass::getCnx()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("La Matricula no ha podido ser actualizado");
      }
      return $rsp;
    } catch (PDOException $e) {
      DataBaseClass::getCnx()->rollBack();
      return $e;
    }
  }

}

?>