<?php

/**
 * descripcion del controlador  del sistema 
 * @author Andres Felipe Alvarez
 * @copyright (c) 2014, Andres Felipe Alvarez
 */
class controllerClass {

  public function index($args = NULL) {
    $args['datos'] = modelClass::getData();

    if (is_array($args['datos'])) {
      viewClass::renderHTML('index.php', $args);
    } else {
      viewClass::renderHTML('error.php', $args);
    }
  }

  public function create() {
    $template = 'create.php';
    $args['causa'] = modelClass::getCausa();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $anwr = modelClass::newCausa($_POST['txtId'], $_POST['desCausa'], $_POST['txtEstado']);
      if ($anwr === true) {
        $args['success'] = 'The Registration Was SUCCESSFUL!';
        $this->index($args);
      } else {
        $args['error'] = $anwr->getMessage();
        $args['formAction'] = 'index.php?action=create';
        $args = array_merge($args, $_POST);
        viewClass::renderHTML($template, $args);
      }
    } else {
      $args['formAction'] = 'index.php?action=create';
      viewClass::renderHTML($template, $args);
    }
  }

  public function update() {
    $args['causa'] = modelClass::getCausa();
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id']) and is_numeric($_GET['id'])) {
      $certificate = modelClass::certifyId($_GET['id']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $data = modelClass::getRow($_GET['id']);
          if (is_array($data)) {
            if (count($data) > 0) {
              $args['txtId'] = $data[0]['cod_causa'];
              $args['desCausa'] = $data[0]['desc_causa'];
              $args['txtEstado'] = $data[0]['estado'];
            }
          } else {
            $args['error'] = $data;
            viewClass::renderHTML('error.php', $args);
          }
        }
      } else {
        $args['error'] = $certificate;
        viewClass::renderHTML('error.php', $args);
      }
      $args['formAction'] = 'index.php?action=update&amp;id=' . $_GET['id'];
      viewClass::renderHTML('update.php', $args);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data['desc_causa'] = $_POST['desCausa'];
      $data['estado'] = $_POST['txtEstado'];
      $rsp = modelClass::updateCausa($_GET['id'], $data);
      if ($rsp === true) {
        $args['success'] = 'Los cambios fueron realizados exitosamente';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;id=' . $_GET['id'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index();
    }
  }

  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;id=' . $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id']) and is_numeric($_GET['id'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['confirmation']) and $_POST['confirmation'] === 'true') {
      $rsp = modelClass::delCausa($_GET['id']);
      if ($rsp === true) {
        $args['success'] = 'The Record: <strong> ' . $_GET['id'] . '</strong> Was Succesfully DELETED!. ';
      } else {
        $args['error'] = $rsp;
        viewClass::renderHTML('error.php', $args);
      }
      $this->index($args);
    }
  }

  public function notFound() {
    
  }

}
