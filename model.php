<?php
        
    function conectar(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "u626645697_rciae";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function get_inscripcion($tipoDoc,$nroDoc,$pais){
        $conn = conectar();
        mysqli_query($conn,"SET NAMES 'utf8'"); 
               
        $sql= "SELECT * FROM `inscripciones` WHERE (`tipodoc`='$tipoDoc' and `nrodoc`='$nroDoc' and `pais`='$pais')";
        $result = $conn->query($sql);
        return $result;

    }

    function insert_inscripcion($apellido,$nombre,$tipoDoc,$nroDoc,$tel,$mail,$pais,$provincia,$localidad,$ocupacion){
        $conn = conectar();
        mysqli_query($conn,"SET NAMES 'utf8'"); 
               
        $sql= "INSERT INTO `inscripciones`(`apellido`, `nombre`, `tipodoc`, `nrodoc`, `telefono`, `mail`, 
                                                    `pais`, `provincia`, `localidad`, `ocupacion`, `fecha`) 
                                        VALUES ('$apellido','$nombre','$tipoDoc','$nroDoc','$tel','$mail',
                                                    '$pais','$provincia','$localidad','$ocupacion', NOW())";
        $result = $conn->query($sql);
        $ins_id = mysqli_insert_id($conn);
        return $ins_id;       
    }

    function update_inscripcion($apellido,$nombre,$tipoDoc,$nroDoc,$tel,$mail,$pais,$provincia,$localidad,$ocupacion){
        $conn = conectar();
        mysqli_query($conn,"SET NAMES 'utf8'"); 
               
        $sql= "UPDATE `inscripciones` SET `apellido`='$apellido',`nombre`='$nombre', `telefono`='$tel',
                                                `mail`='$mail',`provincia`='$provincia',`localidad`='$localidad',
                                                `ocupacion`='$ocupacion',`fecha`=NOW() 
                                            WHERE (`tipodoc`='$tipoDoc' and `nrodoc`='$nroDoc' and `pais`='$pais')";
        $result = $conn->query($sql);
        return $result;       
    }

       
?>