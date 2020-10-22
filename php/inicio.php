<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reto Endava</title>
    <link rel="icon" href="Imagenes/favicon.png">
    <link href="../css/starrr.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" >
    <script src="https://kit.fontawesome.com/f4a88d7b2c.js" crossorigin="anonymous"></script>
    <script src="../js/starrr.js"></script>
    <link rel="stylesheet" href="../Estilo.css">
    <?php
        include("../php/conexion.php");
        $promrating="SELECT title,avg(rating) AS calificacion, generes FROM movies INNER JOIN rating ON movies.movieId=rating.movieId GROUP BY movies.title HAVING count(title) > 20 ORDER BY avg(rating) DESC";

    $result=mysqli_query($conn,$promrating);
    ?>
    <script src="js/jquery.rating.pack.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
$(document).ready(function(){
    $('input.star').rating();
});
</script>
</head>
<body onload="LISTO(),Ranking()" >
    <section class="Cuerpo container" >
        <section class="container Cabecera">
            <!--div class="Superior"-->
                <h1 id="Titulo-Principal">Ranking</h1>
                <!--div class="iconos">Icono</div-->
            <!--/div-->
            <h3 id="Subtitulo">Top 100 </h3>

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
                    <li class="li-" data-view="grid" onclick="Ranking()"  id="RANKING"><i class="fas fa-star"></i></i></i></i></li>
                    <li class="li-" data-view="grid" onclick="Alfabetico()" id="IconA-Z"><i class="fas fa-sort-alpha-down"></i></i></i></li>
                    <li class="li-list " data-view="list" onclick="GRID()"  id="Icon-LIST"><i class="fas fa-align-justify"></i></li>                    
                    <li class="li-" data-view="grid" onclick="LISTO()" id="Icon-GRID"><i class="fas fa-th"></i></li>
                </ul>
            </div>
        </section>

        <!--Final Prueba icono-->
       <section class="container Grilla" id="GRILL">
            <div class="contenedor row row justify-content-left">
            <?php while($mostrar=$result->fetch_array())
                {
            ?>
                <div class="card col p-0">
                   <div class="Prueba-Fondo"></div>
                    <div class="Contenido">
                        <h4><?php echo $mostrar['title']?></h4>
                        <p><?php echo $mostrar['generes']?></p>  
                        <div><span class="stars-container stars-80">★★★★★</span></div>
                    </div>
                </div>
                <?php
        }

        ?>
            </div>
    </section>

        <section class="container Lista" id="LISTT">
        <?php while($mostrar=$result->fetch_array())
                {
        ?>
            <div class="Lista-item horizontal">
                <div class="Prueba-Fondo"></div>
                <div class="Contenido">
                    <h4><?php echo $mostrar['title']?></h4>
                    <p><?php echo $mostrar['generes']?></p>    
                </div>
                <div class="Estrellitas">
                    <div><span class="stars-container stars-80">★★★★★</span></div>
                </div>
              </div>
              <?php
        }

        ?>
        </section>    

        <nav class="container ">
            <ul class="pagination paginacion">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>

    </section>
    
<script>
$('#Estrellas').starrr();
({
    rating:3,
});
</script>

<script>
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


    function menuMedia(x) {
        if (x.matches) { 
            $( "#menu-id" ).removeClass('Menu');
        } else {
            document.getElementById('menu-id').classList.add("Menu")
        }
    }

    var x = window.matchMedia("(max-width: 720px)")
    menuMedia(x)
    x.addListener(menuMedia)
</script>    


</body>
</html>