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

// Filtrar TODO
$textoIN="";
if(isset($_GET['filtrarTodo'])) {

    // Marca

    if(isset($_GET['Marca'])) {
        $marcaSeleccionada=$_GET['Marca'];
        $stringFiltro="";
        // Se le asigna al array el valor de las marcas

        // Recorrer marcas para generar el string de filtro
        foreach($marcaSeleccionada as $unaMarca){
            // Se verifica si se a seleccionado mas de un elemento
            if(count($marcaSeleccionada) > 1){
                // En caso de ser el primer elemento, se agregara la condicional AND a la query de filtros
                if($unaMarca === $marcaSeleccionada[0]){
                    $stringFiltro = $stringFiltro ." AND (M.ID = $unaMarca";
                }
                // Si no es el primero ni el ultimo simplemente se agrega el texto comun sin ningun parentesis
                else if($unaMarca === end($marcaSeleccionada)){
                    $stringFiltro = $stringFiltro ." OR M.ID = $unaMarca)";
                }
                // Si no es el primero ni el ultimo simplemente se agrega el texto comun sin ningun parentesis
                else{
                    $stringFiltro = $stringFiltro ." OR M.ID = $unaMarca";
                }
            }
            // En caso de que el array solo tenga 1 elemento
            else{
                $stringFiltro = $stringFiltro ." AND (M.ID = $unaMarca)";
            }
        }
        $querySillasPorAmbiente=$querySillasPorAmbiente. $stringFiltro;
    }

    // Material

    if(isset($_GET['Material'])) {
        $materialSeleccionado=$_GET['Material'];
        $stringFiltro="";
        foreach($materialSeleccionado as $unMaterial){
            // Checkea si el array tiene mas de un elemento 
            if(count($materialSeleccionado) > 1){

                // En caso de ser el primer elemento, se agregara la condicional AND a la query de filtros
                if($unMaterial === $materialSeleccionado[0]){
                    $stringFiltro = $stringFiltro ." AND (SM.IDMaterial = $unMaterial";
                }
                // Si es el ultimo elemento se le agrega un cierre de parentesis al final, se agregara la condicional OR para filtrar por los demas estilos
                else if ($unMaterial === end($materialSeleccionado) ){
                    $stringFiltro = $stringFiltro ." OR SM.IDMaterial = $unMaterial)";
                }
                // Si no es el primero ni el ultimo simplemente se agrega el texto comun sin ningun parentesis
                else{
                    $stringFiltro = $stringFiltro ." OR SM.IDMaterial = $unMaterial";
                }
            }
            // En caso de que el array solo tenga 1 elemento
            else{
                $stringFiltro = $stringFiltro ." AND (SM.IDMaterial = $unMaterial)";
            }
        }
        $querySillasPorAmbiente = $querySillasPorAmbiente. $stringFiltro;
    }

    // Color

    if(isset($_GET['Color'])) {
        $colorSeleccionado=$_GET['Color'];
        $stringFiltro="";

        foreach($colorSeleccionado as $unColor){
            //Si el array tiene mas de un elemento
            if(count($colorSeleccionado) > 1){

                // En caso de ser el primer elemento, se agregara la condicional AND a la query de filtros
                if($unColor === $colorSeleccionado[0]){
                    $stringFiltro = $stringFiltro ." AND (C.ID = $unColor";
                }
                // Si no es el primero ni el ultimo simplemente se agrega el texto comun sin ningun parentesis
                else if($unColor === end($colorSeleccionado)){
                    $stringFiltro = $stringFiltro ." OR C.ID = $unColor)";
                }
                // Si no es el primero ni el ultimo simplemente se agrega el texto comun sin ningun parentesis
                else{
                    $stringFiltro = $stringFiltro ." OR C.ID = $unColor";
                }
            }
            // En caso de que el array solo tenga 1 elemento
            else{
                $stringFiltro = $stringFiltro ." AND (C.ID = $unColor)";
            }
        }
        $querySillasPorAmbiente = $querySillasPorAmbiente. $stringFiltro;
    }

    // Estilo

    if(isset($_GET['Estilo'])) {
        $estiloSeleccionado=$_GET['Estilo'];
        // Se define la variable que contendra la string para filtrar los estilos
        $stringFiltro="";


        // Se recorreran los estilos seleccionados por el usuario
        foreach($estiloSeleccionado as $unEstilo){
            // Si el array tiene mas de un elemento 
            if(count($estiloSeleccionado) > 1){

                // En caso de ser el primer elemento, se agregara la condicional AND a la query de filtros
                if($unEstilo === $estiloSeleccionado[0]){
                    $stringFiltro = $stringFiltro ." AND (SE.IDEstilo LIKE '%$unEstilo%'";
                }
                // Si no es el primero ni el ultimo simplemente se agrega el texto comun sin ningun parentesis
                else if($unEstilo === end($estiloSeleccionado)){
                    $stringFiltro = $stringFiltro ." OR SE.IDEstilo LIKE '%$unEstilo%')";
                }
                // Si no es el primero ni el ultimo simplemente se agrega el texto comun sin ningun parentesis
                else{
                    $stringFiltro = $stringFiltro ." OR SE.IDEstilo LIKE '%$unEstilo%'";
                }
            }
            // En caso de que el array solo tenga 1 elemento
            else{
                $stringFiltro = $stringFiltro ." AND (SE.IDEstilo LIKE '%$unEstilo%')"; 
            }
        }
        $querySillasPorAmbiente = $querySillasPorAmbiente. $stringFiltro;
    }

    // Precio

    if(isset($_GET['precioMinimo'])) {

        // Registro las dos variables para precio
        $precioMinimo = $_GET['precioMinimo'];
        $precioMaximo = $_GET['precioMaximo'];

        // Si es vacio
        if ($precioMinimo === "") {
            $queryPrecioMinimo = "SELECT MIN(Precio) FROM sillas";
            $resultPrecioMinimo = mysqli_query($link, $queryPrecioMinimo);
            // Convierto lo que me devuelve la consulta en un array
            $precioMinimoDato = mysqli_fetch_array($resultPrecioMinimo);
            // Indice 0 para que no escriba el array del valor
            $precioMinimo = $precioMinimoDato[0];

        }

        // Si es vacio
        if ($precioMaximo === "") {
            $queryPrecioMaximo = "SELECT MAX(Precio) FROM sillas";
            $resultPrecioMaximo = mysqli_query($link, $queryPrecioMaximo);
            // Convierto lo que me devuelve la consulta en un array
            $precioMaximoDato = mysqli_fetch_array($resultPrecioMaximo);
            // Indice 0 para que no escriba el array del valor
            $precioMaximo = $precioMaximoDato[0];

        }

        $querySillasPorAmbiente = $querySillasPorAmbiente. " AND Precio BETWEEN $precioMinimo AND $precioMaximo";
    }
}
?>