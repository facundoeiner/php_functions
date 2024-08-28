<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/monokai.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            max-width: 700px;
            width: 90%;
            font-family: sans-serif;
            margin: auto;
            line-height: 1.6;
            background-color: #111;
            color: #fff;
        }
        h2, h3 {
            text-align: center;
            margin: 20px 0 10px;
        }
        h4 {
            margin-top: 20px;
        }
        p{
            margin: 10px 0;
            padding: 10px;
            background: rgba(244, 244, 244, 0.01);
            
        }
        pre {
            margin: 10px 0;
          
            /* background: rgba(255, 255, 255, 0.05); */
            border-left: 3px solid #1259C3;
            overflow-x: auto;
            background: #272822;
            
        }
        .bitAndBit {
            width: 50px;
            height: 70px;
            border: 1px solid gray;
            text-align: center;
            display: grid;
            grid-template-areas: 
                "operador arriba"
                "operador abajo"
                "operador resultado";
        }
        .operador {
            grid-area: operador;
            align-content: center;
            margin-bottom: 25px;
        }
        .arriba {
            border-bottom: 1px solid gray;
            grid-area: arriba;
        }
        .abajo {
            border-top: 1px solid gray;
            grid-area: abajo;
        }
        .resultado {
            border-top: 1px solid gray;
            background-color: green;
            grid-area: resultado;
        }
        .contenedor-grid {
            width: 100%;
            background-color: antiquewhite;
            min-height: 300px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 10px;
        }
        code{
            /* background-color: #111 !important; */
            height: 100% !important;
        }
        pre ::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }
        pre ::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 10px;
        }
        pre ::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }
        pre ::-webkit-scrollbar {
            width: 12px;
            background-color: #1259C3;
        }
    </style>
</head>
<body>
    <h2>Funciónes en PHP</h2>
    <h3>Declaracion de funcione</h3>

    <pre>
    <code class="php">
    &lt;?php
        function miPrimerFuncion($parametro1,$parametro2){
            code ;
            return;
        }
        miPrimerFuncion("dato1",24);
    ?&gt;
    </code>
    </pre>
    <h3>Hoisting de funcion</h3>
    <p>
        Las funciones  no requieren ser definidas antes de ser invocadas (hoisting),
        excepto cuando esta funcion esta definida condicionalmente.

    </p>
    <pre>
    <code class="php">
         &lt;?php
            $mekefoo=true;
            if ($mekefoo){
                function foo(){
                    echo "No existe hasta que se ejecute el cuerpo del if "
                    // si $mekefoo es falso entoces la funcion foo nunca va a ser crada 
                    //  y por ende  no se puede acceeder a esta.
                }
            }
            if ($mekefoo) foo();
        ?&gt;
    </code>
    </pre>
    <h3>Funciones anidadas</h3>
    <p>Todas las funciones tienene alcance global (aunque  hayan sido sido definidas dentro de otra)</p>
    <pre>
    <code class="php">
    &lt;?php
        function foo(){
            function bar(){
                echo"NO existe hata que foo () sea invocada"
            }
        }
        // primero invacamos foo y luego por fura de la funcion foo podemo 
        //acceder a bar.
        foo();
        bar();
        //bar tiene alcanse global una vez que foo sea invocada.
    ?&gt;
    </code>
    </pre>
    <h3> Funciones y recurcion</h3>
    <p>Recordemos que la recursividad es un bucle que se genera cuando una funciona se llama a si misma. <br>
       Debe tener un caso base, para que el bucle tenga un fin, deja de llamarse a si misma.<br>
    </p>
    <pre>
    <code class="php">
    &lt;?php

        function contar($n){
            if ($n < 10){ //caso base
                return contar($n++);
            }else{
                return "fin de contador";
            }
        }
        contar(0);
        //<?php
            function contar($n){
                if ($n < 10){
                    echo $n;
                    return contar($n+1);
                }else{
                    return "fin de contador";
                }
            }
            
            contar(0);
                
        ?> <br>
        function sumatoria($a) {
            if ($a > 0)
                return $a + sumatoria($a - 1); // Llamada recursiva
            else
                return 0; // Caso base
            }

        echo "" .sumatoria(3);
        //<?php function sumatoria($a) {
                if ($a > 0)
                    return $a + sumatoria($a - 1); // Llamada recursiva
                else
                    return 0; // Caso base
            }

            echo sumatoria(3);    
        ?>
        <br>
        //otra manera mas optima 
        function sumatoria($a){
            return ($a>0) ? ($a + sumatoria ($a-1):0);
        }
    ?&gt;
    </code>
    </pre>
    <h3>Parametros funciones </h3>
    <p>
        Se pueden pasar los parametros normalmente. <br>
        Si se quiere hacer por referencia solo funcion nomFun(&$x){}.
    </p>
    <?php
    echo"<pre> <code class='php'>";
    echo' function print_string($sting){
    echo "parametro $sting";
 }';
    function print_string($sting){
       echo "parametro $sting";
    }
    echo  " <br>print_sting('hola como estas')//";
    print_string("hola como estas".".");
    echo"</code></pre>";
    ?>
    <h3>Parametros por default</h3>
    <p>
        Podemos hacer que un parametro de una funcion ya tenga un valor por defecto,
        esto para que si se invoca a la funcion sin el/un/los parametro/s estos ya tengan uno.<br>
        Los parametros que tienes valor por defecto deben estar a la derecha de los que no.
    
    </p>
    <?php
        function makeCoffee($milk,$type="cappuccino"){
            return "Making a cup of $type. milk $milk";
        }
    ?>
    <pre> 
    <code class="php">
    &lt;?php
        function mekeCoffee($milk,$type="cappuccino"){
            return "Making a cup of $type. width $milk"
        }
        echo makeCoffee("leche de vaca");// <?= makeCoffee("leche de vaca")?><br>
        echo makeCoffee(null);// <?= makeCoffee(null)?><br>
        echo makeCoffee("espresso");// <?= makeCoffee("leche de almendras")?><br>
    &lt;?php
    </code>
    </pre>
    <h3>saber cantidad-posision de los argunmento</h3>
    <p>
        TODO ESTO FUNCIONA DENTRO DE LA FUNCION <br>
        func_num_args(): retorna la cantidad de argumentos que recibio la funcion.<br>
        func_get_arg(numero): Da la posicion del parametro (comenzado del 0) y retorna el parametro de dicha posicion. <br>
        func_get_argS(): Retorna un arreglo con la lista de los parametros recibidos por la funcion <br>
        <br><br>
    </p>

    <?php
        function foo1(){
            echo "Number of arguments: ", func_num_args(),"-",(func_num_args()!=0)? " contenido del argumento:[0] ".func_get_arg(0):"";
            echo "<br> ";

        }
       
    ?>
    
    <pre>
    <code class="php">
    &lt;?php
        function foo(){
            echo "Number of arguments: ", func_num_args(),(func_num_args()!=0)? func_get_arg(0):"",PHP_EOL;
        }
        echo foo();// <?= foo1() ?><br>
        echo foo("hola");// <?= foo1("hola") ?>
        echo foo("chau","pedro",20);// <?= foo1("chau","pedro",20) ?>
    
    &lt;?php
   </code>
    </pre>
    
</body>
</html>