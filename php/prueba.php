<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reto Endava</title>
    <link rel="icon" href="Imagenes/favicon.png">
      <!-- Referencias internas -->

      <!-- Referencias externas -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/f4a88d7b2c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilo.css">

    <script base src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script base src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script base src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <script src="papaparse.min.js"></script>

    <?php
        include("../php/conexion.php");
    ?>
</head>

<body>
    

    <section class="container">

    <?php


    #seleccioon de rating 5
    $prueba="SELECT movieId from rating WHERE rating=5 ";
    

    $promrating="SELECT title,avg(rating) AS calificacion, generes FROM movies INNER JOIN rating ON movies.movieId=rating.movieId GROUP BY movies.title HAVING count(title) > 20 ORDER BY avg(rating) DESC";

    $result=mysqli_query($conn,$promrating);
    while($mostrar=$result->fetch_array())
    {
    ?>
        <div class="row">
        <div class="col datos">
        <?php

         echo $mostrar['Calificacion']." ".$mostrar['title'];
        ?>
        </div>
        </div>
    <?php
        }
    ?>


    </section>
    <script>
        $(document).ready(function()
        {
        $('#grilla').click(function()
        {
          $('#Contenido').load("../php/grilla.php");
        });

        $('#lista').click(function()
        {
          $('#Contenido').load("/php/lista.php");
        });

    });

</script>    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>