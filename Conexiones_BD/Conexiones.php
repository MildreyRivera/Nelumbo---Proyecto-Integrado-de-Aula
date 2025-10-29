<?php
$conexion= mysqli_connect("localhost","root","","nelumbo_new");
if(mysqli_connect_errno()) {
    throw new RuntimeException ('Mysqli connection error:'.mysqli_connect_errno());
} else {
    //echo "Se realizo la coneccion de datos";
}