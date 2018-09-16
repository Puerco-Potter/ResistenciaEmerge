<!DOCTYPE html>
<html>
  <head>
    <title>Resistencia Emerge</title>
    <?php
      require("head.php");
      include("model.php");
      if (isset($_POST['confirmar'])) {
        $apellido = mb_strtoupper($_POST['apellido'], 'UTF-8');
        $nombre = mb_strtoupper($_POST['nombre'], 'UTF-8');
        $tipoDoc = mb_strtoupper($_POST['tipoDoc'], 'UTF-8');
        $nroDoc = $_POST['nroDoc'];
        $tel = $_POST['tel'];
        $mail = $_POST['email'];
        $pais = mb_strtoupper($_POST['pais'], 'UTF-8');
        $provincia = mb_strtoupper($_POST['provincia'], 'UTF-8');
        $localidad = mb_strtoupper($_POST['ciudad'], 'UTF-8');
        $ocupacion = mb_strtoupper($_POST['ocupacion'], 'UTF-8');


        $inscripcion = get_inscripcion($tipoDoc,$nroDoc,$pais);
        $inscripcion= mysqli_fetch_array($inscripcion);

        
        if ($inscripcion['id']) {
          update_inscripcion($apellido,$nombre,$tipoDoc,$nroDoc,$tel,$mail,$pais,$provincia,$localidad,$ocupacion);
          $ins = $inscripcion['id'];
        }else{        
          $ins = insert_inscripcion($apellido,$nombre,$tipoDoc,$nroDoc,
                                    $tel,$mail,$pais,$provincia,$localidad,$ocupacion);
        }
        if($ins){
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
          <h1>Confirmación de Inscripción</h1>
          <div class="alert alert-success">
            <strong>Su inscripción fue registrada correctamente.</strong>
          </div>
          <button class="btn btn-default" onclick="openWin()">Descargar credencial</button>
          <?php
            }
            }else{
            ?>
            <div class="container">
              <h2>Inscripción</h2>
              <div class="alert alert-danger">
                <strong>No fue registrada su inscripción. Vuelva a intentar nuevamente.</strong>
              </div>
            <?php
            }//end Else


            ?>
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