<!--
 * modulo para  borrar un registro de la bae de datos
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Delete Programa</title>
  </head>
  <body>
    <h1>Delete Programa</h1>  
    <section>
      <div id="deleteA">
        <form action="<?php echo $formAction ?>" method="post">
          <input type="hidden" id="confirmation" name="confirmation" value="true">
          <label>Do you Really Want To DELETE this Record :</label> <strong><?php echo $_GET['id'] ?>?</strong>
          </br><input type="submit" value="DELETE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Cancel!</a>
        </form>
      </div>    
    </section>      
  </body>
</html>

