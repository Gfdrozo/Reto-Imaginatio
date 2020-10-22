<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reto Endava</title>
    <link rel="icon" href="Imagenes/favicon.png">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/f4a88d7b2c.js" crossorigin="anonymous"></script>

    <script src="../JS/PosterPHP.js"></script>
    <link rel="stylesheet" href="../Estilo.css">
    <?php
        include("../php/conexion.php");
        $promrating="SELECT title,avg(rating) AS calificacion, generes FROM movies INNER JOIN rating ON movies.movieId=rating.movieId GROUP BY movies.title HAVING count(title) > 20 ORDER BY avg(rating) DESC";

    $result=mysqli_query($conn,$promrating);
    $TotalPelis=mysqli_num_rows($result);
    $PeliPorPag=9;
    $paginas= ceil($TotalPelis/$PeliPorPag);
    if($paginas>6)
    {
        

    }

    


    if(!$_GET)
    {
        header('Location:alfabeto.php?pagina=1');
    }
    

    $iniciar =($_GET['pagina']-1)*$PeliPorPag;

    $PeliPagina="SELECT title,avg(rating) AS calificacion, generes FROM movies INNER JOIN rating ON movies.movieId=rating.movieId GROUP BY movies.title HAVING count(title) > 20 ORDER BY title ASC LIMIT $iniciar,$PeliPorPag";
            $resPeli=mysqli_query($conn,$PeliPagina);

    ?>
<script>
    function estrella(puntaje, id){
            //puntaje -> Entrada de 1 a 5 (acepta decimal)
            //Id -> Entrada de la selección, recuerda . para class y # para id
            const Porcentaje = (puntaje/5)*100;
            const PorcentajeRedondeado = `${Math.round(Porcentaje/10)*10}%`;
            //document.querySelector(id).style.width=PorcentajeRedondeado; //Para unica seleccion
            //Para multiples selecciones
            var elements = document.querySelectorAll(id);
            for(var i=0; i<elements.length;i++){

                elements[i].style.width=PorcentajeRedondeado;
            }
        }
    </script>
  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</script>
</head>
<body onload="LISTO(),Ranking()" >
    <section class="Cuerpo container" >
        <section class="container Cabecera">
            <!--div class="Superior"-->
                <h1 id="Titulo-Principal">Peliculas</h1>
                <!--div class="iconos">Icono</div-->
            <!--/div-->
            <h3 id="Subtitulo">A - Z</h3>

            <!--        MENU DESPLEGABLE        -->
            <div id="menu-id" class="Menu">
                <div class="contenedor-menu">
                    <form class="form-inline flex-nowrap menu-contenido mt-5 mb-5">
                        <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                        aria-label="Search">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </form>
                    <h2 class="menu-contenido justify-content-center"> <u>Generos</u> </h2>
                    <ul class="menu-contenido row justify-content-center row-cols-md-3 mt-4">
                        <li><a class="text-dark col" href="#"> Acción</a></li>
                        <li><a class="text-dark col" href="#"> Animación </a></li>
                        <li><a class="text-dark col" href="#"> Aventura </a></li>
                        <li><a class="text-dark col" href="#"> Comedia </a></li>
                        <li><a class="text-dark col" href="#"> Suspenso </a></li>
                    </ul>
                </div>
            </div>    

        </section>
        <!--Prueba icono-->
        <section class="Icono wrapper" >
            <div class="links">
                <ul>
                   <a href="../php/inicio.php"> <li class="li-" data-view="grid" onclick="Ranking()"  id="RANKING"><i class="fas fa-star"></i></i></i></i></li></a>
                  <a href="../php/alfabeto.php" id="alfab">  <li class="li-" data-view="grid" onclick="Alfabetico()" id="IconA-Z"><i class="fas fa-sort-alpha-down"></i></i></i></li></a>
                  
                </ul>
            </div>
        </section>

        <!--Final Prueba icono-->
       <section class="container Grilla" id="GRILL">
            <div  class="contenedor row row justify-content-left" id="Contexto">
            <?php while($mostrar=$resPeli->fetch_array())
                {
                    
            ?>
            
            
                <div id="result" class="card col p-0" >
                   <div class="Prueba-Fondo"></div>
                    <div class="Contenido">
                        <h4><?php echo $mostrar['title']?></h4>
                        <p><?php echo $mostrar['generes']?></p>  

                        <div class="stars-outer resultado1">
                        <div class="stars-inner">                     
                        </div>
                        <p><?php echo $mostrar['calificacion']?></p>
                    </div>
                    </div>
                </div>
                <script type="text/javascript">estrella(<?php echo $mostrar['calificacion']?>, '.stars-inner' );</script>
                <?php
        }

        ?>
            </div>
    </section>



        <nav class="container ">
            <ul class="pagination paginacion">
            
              <?php for($i=0;$i<$paginas;$i++): ?>
              
              <li class="page-item
               <?php 
               echo $_GET['pagina']==$i+1? 'active' : '' 
               ?>">
               <a class="page-link" href="inicio.php?pagina=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>

              <?php endfor ?>
              

              </li>
            </ul>
          </nav>

    </section>

    <script>
        /*
        function GRID()
        {
        document.getElementById('GRILL').style.display='none';
        document.getElementById('Icon-LIST').style.color='rgba(45, 43, 40,0.8)';
        document.getElementById('Icon-GRID').style.color='rgba(45, 43, 40,0.5)';
        document.getElementById('LISTT').style.display='';
        
        }
        function LISTO()
        {
            document.getElementById('GRILL').style.display='';
            document.getElementById('Icon-GRID').style.color='rgba(45, 43, 40,0.8)';
            document.getElementById('Icon-LIST').style.color='rgba(45, 43, 40,0.5)';
            document.getElementById('LISTT').style.display='none';
        }

        function Alfabetico()
        {
            document.getElementById('Titulo-Principal').innerHTML="Peliculas"
            document.getElementById('Subtitulo').innerHTML="A-Z"
            document.getElementById('IconA-Z').style.color='rgba(45, 43, 40,0.8)';
            document.getElementById('RANKING').style.color='rgba(45, 43, 40,0.5)';

        }
        function Ranking()
        {
            document.getElementById('Titulo-Principal').innerHTML="Ranking"
            document.getElementById('Subtitulo').innerHTML="Top 100"
            document.getElementById('IconA-Z').style.color='rgba(45, 43, 40,0.5)';
            document.getElementById('RANKING').style.color='rgba(45, 43, 40,0.8)';

        }
*/
        
        //Asignación de estrellas a las cartas
 
        //estrella(1.5,'.resultado1 .stars-inner')

        // Ajuste del Menu desplegable
        var cw = window.rating1.clientWidth; // save original 100% pixel width

        var x = window.matchMedia("(max-width: 720px)")
        menuMedia(x)
        x.addListener(menuMedia);
    </script> 
      <script type="text/javascript">//ACtualizacion de informacion del "contenido"
      $(document).ready(function()
      {
        
        $('#reciente').click(function()
        {
          
        });

        });
    </script>
    
  

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="JS/Posters.js"></script>
</body>
</html>