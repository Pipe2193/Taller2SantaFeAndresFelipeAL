<!--
 * modulo para  borrar un registro de la bae de datos
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Delete Localidad</title>
  </head>
  <body>
    <h1>Delete Localidad</h1>  
    <section>
      <div id="deleteA">
        <form action="<?php echo $formAction ?>" method="post">
          <input type="hidden" id="confirmation" name="confirmation" value="true">
          Do you Really Want To DELETE this Record : <strong><?php echo $_GET['id'] ?>?</strong>
          </br><input type="submit" value="DELETE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Cancel!</a>
        </form>
      </div>    
    </section>      
  </body>
</html>

