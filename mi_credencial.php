<!DOCTYPE html>
<html>
  <head>
    <title>Resistencia Emerge</title>
    <?php
    require("head.php");
    include "model.php";
    ?>
        
    </head>
    <body>
    	<?php
    		require("navbar.php");
    	?>
      <div>
        <br>
        <br>
        <br>
        <br>
      </div> 
      <div id="Contactenos" class="pantalla d-flex align-items-center justify-content-center animatedParent fondoHome">
        <div class="contenido text-light text-center">
          <h1>Descarga tu Credencial</h1>
          <div class="alert alert-success">
            <strong>Si ya se ha inscripto puede imprimir su credencial aqui:</strong>
          </div>
          
              <?php
                if (isset($_POST['confirmar'])) {
                  $tipoDoc = mb_strtoupper($_POST['tipoDoc'], 'UTF-8');
                  $nroDoc = $_POST['nroDoc'];
                  $pais = mb_strtoupper($_POST['pais'], 'UTF-8');

                  $conn= conectar();
                  mysqli_set_charset($conn, "utf8");
                  $filas= mysqli_query($conn, "SELECT * FROM inscripciones WHERE tipodoc='".$tipoDoc."' and nrodoc=" . $nroDoc . " and pais='" . $pais . "'" );

                  $fila=mysqli_fetch_array($filas);
                  if ($fila){
                    header("Location: credencial_inscripcion.php?inscripcion_id='". $fila['id'] . "'");
                  }
                  echo "<div class='alert alert-danger'>
            <strong>Los datos no coinciden con ningun inscripto, por favor inscribase.</strong>
          </div>";
                };
              ?>
                <form class="text-dark" id="inscripcion" action="" method="post">
                  <div class="form-group">
                    <label>Tipo de documento</label><label style="color: red">*</label>
                    <select id="tipoDoc" name="tipoDoc" class="form-control" required>
                      <option>DNI</option>
                      <option>LC</option>
                      <option>LE</option>
                      <option>PASAPORTE</option>
                      <option>CÉDULA</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Número de documento</label><label style="color: red">*</label>
                    <input type="number" class="form-control" id="nroDoc" name="nroDoc" alt="Número" required>
                  </div>
                  <div class="form-group">
                    <label>País</label><label style="color: red">*</label>
                    <input type="text" class="form-control" id="pais" name="pais" alt="País" required>
                  </div>
                  <button type="submit" class="btn btn-primary" id="confirmar" name="confirmar">Descargar Credencial</button>
                </form>
          
            </div>
        </div>
       	<?php
       		require("footer.php");
       	?>
    </body>
    <script language="javascript" type="text/javascript">
      function openWin() {
        window.open("credencial_inscripcion.php?inscripcion_id='<?php echo $ins;?>'");      
      }
    </script>
    <?php
   		require("scriptAnimado.php");
   	?>
</html>