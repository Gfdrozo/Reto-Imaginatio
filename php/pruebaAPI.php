<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset ="UTF-8">
    <title>Prueba</title>
    </head>
    <body>
        <!--<h1>now I´m trying to use the api</h1>-->
        <img src="https://image.tmdb.org/t/p/w500/3nYlM34QhzdtAvWRV5bN4nLtnTc.jpg" alt="Jaws">
        
        <script type ="text/javascript">
        var APIKEY = '20e9b6ba65d68edc7373696642c68593';
        let baseURL = 'https://api.themoviedb.org/3/';
        let configData = null;
        let baseImageURL = null;
        
        let getConfig = function () {
            let url = "".concat(baseURL, 'configuration?api_key=', APIKEY); 
            fetch(url)
            .then((result)=>{
                return result.json();
            })
            .then((data)=>{
                baseImageURL = data.images.secure_base_url;
                configData = data.images;
                console.log('config:', data);
                console.log('config fetched');
                runSearch('jaws')
            })
            .catch(function(err){
                alert(err);
            });
        }

        let runSearch = function (keyword) {
            let url = ''.concat(baseURL, 'search/movie?api_key=', APIKEY, '&query=', keyword);
            fetch(url)
            .then(result=>result.json())
            .then((data)=>{
                //process the returned data
                document.getElementById('output').innerHTML = JSON.stringify(data, null, 4);
                //work with results array...
                
            })
        }
        
        document.addEventListener('DOMContentLoaded', getConfig);

        </script>
    </body>
</html>