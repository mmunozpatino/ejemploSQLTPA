<?php
    $host = "localhost";
    $usuario = "root";
    $clave = "";
    $conn = new mysqli($host, $usuario, $clave);    

    //chequear si existe la conexion
    if( $conn -> connect_error){
        die("eror de conexion");
    }else{
        echo "conexion exitosa"."<br><hr>";
    }

    

    //enlazo a la base de datos progav
    mysqli_select_db( $conn, 'progav');

    //configuro la consulta a la tabla
    $cadenasql = 'select * from usuarios';

    //ejecutamos la sentencia
    $res = mysqli_query($conn, $cadenasql);

    if( $_POST['usuario'] != ""){
        $cadenasql = "insert into usuarios (nombrelargo,usuario)";
        $cadenasql = $cadenasql . " values ('" . $_POST['usuario'];
        $cadenasql = $cadenasql . "' , '";
        $cadenasql = $cadenasql . $_POST['clave'];
        $cadenasql = $cadenasql . "');"; 
        mysqli_query($conn, $cadenasql);
        echo $cadenasql.'<br>';
    }

    $columnas = mysqli_fetch_array($res);

   // Vemos la respuesta
    while ($row = $res->fetch_assoc()) {
        foreach ($row as $key => $column) {
            echo $column." - ";
        }
        echo "<br>";    
    }
    echo '<hr>';

    echo '<hr>';
    echo '<form method=post >';
    echo 'Usuario <input type=text name=usuario><br>';
    echo 'clave <input type=text name=clave><br>';
    echo '<input type=submit>';
    echo '</form>';

    
    mysqli_close($conn);
    
?>