<?php
$id = $_GET['id']; 
$sql= "SELECT direccion FROM recursos WHERE id = $id";
$direccion=null;
include "conectar.php"; 
//echo "ID del recurso: ".$id;
//sleep(2);


function desconectar($conexion){

    $close = mysqli_close($conexion);

        if($close){
            echo '';
        }else{
            echo 'Ha sucedido un error inexperado en la desconexion de la base de datos
';
        }

    return $close;
}

function obtenerArreglo($sql){
    //Creamos la conexion con la funcion anterior
  $conexion = conectarDB();

    //generamos la consulta

        mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

    if(!$resultado = mysqli_query($conexion, $sql)) die(); //si la conexión cancelar programa

    $arreglo = array(); //creamos un array

    //guardamos en un array todos los datos de la consulta
    $i=0;

    while($row = mysqli_fetch_assoc($resultado))
    {
        $arreglo[$i] = $row;
        $i++;

        $direccion = implode(" ", $row);        
    }  
    desconectar($conexion); //desconectamos la base de datos

    echo   $direccion;
        sleep(2);
        header('Location: '.$direccion);
        die();

    //return $arreglo; //devolvemos el array
}
obtenerArreglo($sql);
        //$r = obtenerArreglo($sql);
        //echo json_encode($r);
        //$tmp = json_encode($r);
        //echo $tmp;
        //echo $r[0]->nombre;
        /*
        foreach ($r as $item) {
            echo 'Nombre:' . $item->nombre . "\n";
        }
        */
        //echo   $direccion;

?>
