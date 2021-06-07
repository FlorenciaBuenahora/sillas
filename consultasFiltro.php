<?php

// Codigo viejo para filtar con tabla complementaria
// $textoMarcasIN="";

// $marcas= array();

// // Si en la url hay una marca seleccionada
// if(isset($_GET['marca'])){
//     // Se le asigna al array el valor de las marcas
//     $marcas = $_GET['marca'];
//     // Recorrer marcas para generar el string de IN
//     foreach($marcas as $marca){
//         // Si marca es el ultimo elemento de la array
//         if($marca === end($marcas))
//         // Si es no agrega coma
//         {
//             $textoMarcasIN = $textoMarcasIN .$marca;  
//         }
//         //Sino es le agrega una coma
//         else{
//             $textoMarcasIN = $textoMarcasIN. $marca.",";
//         }
//     }
//     // Si MarcaID esta dentro de las marcas seleccionadas:
//     $querySillasPorAmbiente = "SELECT Nombre, Precio FROM sillas WHERE MarcaID IN ($textoMarcasIN)";

// }

// Marca

if(isset($_GET['Marca'])) {
    $marcaSeleccionada=$_GET['Marca'];
    $textoMarcasIN="";



        // Se le asigna al array el valor de las marcas

    // Recorrer marcas para generar el string de IN
    foreach($marcaSeleccionada as $unaMarca){
        // Si marca es el ultimo elemento de la array
        if($unaMarca === end($marcaSeleccionada))
        // No agrega coma
        {
            $textoMarcasIN = $textoMarcasIN ."'". $unaMarca. "'";  
        }
        //Sino es el ultimo le agrega una coma
        else{
            $textoMarcasIN = $textoMarcasIN ."'".  $unaMarca."',";
        }
    }
    $querySillasPorAmbiente=$querySillasPorAmbiente. " AND Marca IN ($textoMarcasIN)";
}

// Estilo

if(isset($_GET['Estilo'])) {
    $estiloSeleccionado=$_GET['Estilo'];
    // Se define la variable que contendra la string para filtrar los estilos
    $stringFiltro="";


    // Se recorreran los estilos seleccionados por el usuario
    foreach($estiloSeleccionado as $unEstilo){
        // En caso de ser el primer elemento, se agregara la condicional AND a la query de filtros
        if($unEstilo === $estiloSeleccionado[0]){
            $stringFiltro = $stringFiltro ." AND Estilo LIKE '%$unEstilo%'";
        }
        // Sino es el primer elemento, se agregara la condicional OR para filtrar por los demas estilos
        else {
            $stringFiltro = $stringFiltro ." OR Estilo LIKE '%$unEstilo%'";
        }
    }
    $querySillasPorAmbiente = $querySillasPorAmbiente. $stringFiltro;
}

?>