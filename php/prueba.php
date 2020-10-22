<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba</title>

    <!-- Referencias internas -->

    <link rel="icon" href="/Trabajos/Infografia/rcs/favicon.ico" type="icon/ico">
    <link rel="stylesheet" base type="text/css" href="/Trabajos/Infografia/css/estilos/style.css">  
    

    <!-- Referencias externas -->

    <link rel="stylesheet" base href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
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

    /*archivo de ratings */
    $fileRatings= file('../DB/ratings.csv');
    $fileRatingOpen= fopen("../DB/ratings.csv","r");
    /*archivo de movies */
    $fileMovies= file('../DB/movies.csv');
    $fileMoviesOpen= fopen("../DB/movies.csv","r");

    $cont=0;
    $cantRating =count($fileRatings);
    $cantMovies =count($fileMovies);
    
    $PELI = Array();
    $RATI=Array();
    $sql="SELECT movieId from movies";
    $result=mysqli_query($conn,$sql);

    #seleccioon de rating 5
    $prueba="SELECT movieId from rating WHERE rating=5 ";
    

    $promrating="SELECT title,avg(rating) AS Calificacion, count(title) FROM movies INNER JOIN rating ON movies.movieId=rating.movieId GROUP BY movies.title HAVING count(title) > 20 ORDER BY avg(rating) DESC";

    $result=mysqli_query($conn,$promrating);
    while($mostrar=$result->fetch_array())
    {
        ?>
        <div class="row">
        <div class="col datos">
        <?php

         echo $mostrar['Calificacion'].$mostrar['title'];
        ?>
        </div>
        </div>
    <?php
        }
    ?>
/*
    for ($i=1;$i<=$cantMovies;$i++)
    {
        $datos1=explode(",",$fileMovies[$i]);
        $PELI[$i-1]=$datos1[0];
        
            for($j=1;$j<$cantRating;$j++)
            {
                $datos2=explode(",",$fileRatings[$j]);
                if($datos2[1]==$PELI[$i-1])
                {
                    if(empty($RATI[$i-1]))
                    {
                        $RATI[$i-1]=$datos2[2];
                    }
                    else
                    {
                        $RATI[$i-1]=($RATI[$i-1]+$datos2[2])/2;

                    }
                   

                }

            }
            
    }
    */
    /*
    while (($datos=fgetcsv($fileRatingsOpen,","))==true)
    {
        #echo "-- ".$datos[2]."<br>";
    }*/
    for ($i=0;$i<50;$i++)
    {
    echo "Pelicula:".$PELI[$i]." \tRating: ".$RATI[$i]."<br>";
    
    }
    ?>

    </section>
    
</body>
</html>