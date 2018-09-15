<!DOCTYPE html>
<html>
    <head>
        <title>Resistencia Emerge</title>
        <?php
          require("head.php");
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
            <div class="contenido">                
            
                <h1>Inscripción</h1>
                <h3>Para inscribirte al evento completa los siguientes datos:</h3>
                <form id="inscripcion" action="confirmacion_inscripcion.php" method="post">
                  <div class="form-group">
                    <label>Apellido</label><label style="color: red">*</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" alt="Apellido" required>
                  </div>
                  <div class="form-group">
                    <label>Nombre</label><label style="color: red">*</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" alt="Nombre" required>
                  </div>
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
                    <label>Teléfono</label>
                    <input type="text" class="form-control" id="tel" name="tel" alt="Teléfono">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                    <label>País</label><label style="color: red">*</label>
                    <input type="text" class="form-control" id="pais" name="pais" alt="País" required>
                  </div>
                  <div class="form-group">
                    <label>Provincia</label>
                    <input type="text" class="form-control" id="provincia" name="provincia" alt="Provincia">
                  </div>
                  <div class="form-group">
                    <label>Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" alt="Ciudad">
                  </div>
                  <div class="form-group">
                    <label>Ocupación</label>
                    <input type="text" class="form-control" id="ocupacion" name="ocupacion" alt="Ocupación">
                  </div>
                  <button type="submit" class="btn btn-primary" id="confirmar" name="confirmar">Confirmar</button>
                </form>
            </div>
        </div>
       	<?php
       		require("footer.php");
       	?>
    </body>
    <?php
   		require("scriptAnimado.php");
   	?>
</html>