$(document).ready(() => {
    
    
    mergeMovies('moana',2016);
    //mergeMovies('masdfds',2016);
    //fillCard('#test2');
    //fillCard('#test3');

    var tarjetas = $('.card')
    for(var i = 0; i < tarjetas.length; i++){
        fillCard(tarjetas[i])
        
    }
})

function mergeMovies(searchText, date) {

    axios.get('https://api.themoviedb.org/3/search/movie?api_key=20e9b6ba65d68edc7373696642c68593&query=' + searchText)
        .then((response) => {
            
            let movies = response.data.results;
            if(movies[0] == null){
                $('#testi').css("background-image", "url(Imagenes/favicon.png)");
            }
            else{
            console.log(movies)
            console.log(movies[0].release_date.slice(0,4))
            
            
            
            for (var i=0 ; i < movies.length && movies!=null; i++)
            {
                if(movies[i].release_date.slice(0,4)==date){
                    if (movies[i].poster_path === null) {
                        poster = "Imagenes/favicon.png";
                    } else {
                        poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[i].poster_path;
                    }
                    
                    $('#testi').css("background-image", "url("+poster+")");
                
                }  
            }
        }
        


        })
        .catch((error) => {
            console.log(error);
        });


}

function fillCard(id) {
    //var info = document.querySelector(id+' h4').textContent;
    var info = id.querySelector('h4').textContent; 
    
    if (info.split('(')[1]!=null) {
    var title = info.split('(',1);
    var anio = info.split('(',2)[1].split(')',1);
    
    //var anio = document.querySelector(id+' .year').textContent;


    axios.get('https://api.themoviedb.org/3/search/movie?api_key=20e9b6ba65d68edc7373696642c68593&query=' + title)
        .then((response) => {
            

            let movies = response.data.results;
            if(movies[0] == null)
            {
                //$('#testi').css("background-image", "url(Imagenes/favicon.png)");
                $(id.getElementsByClassName('Prueba-Fondo')[0]).css("background-image", "url(Imagenes/favicon.png)");
            }
            else
            {

                for (var i=0 ; i < movies.length && movies!=null; i++)
                {
                    if(movies[i].release_date.slice(0,4)==anio)
                    {
                        if (movies[i].poster_path === null) {
                            poster = "Imagenes/favicon.png";
                        } else {
                            poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[i].poster_path;
                        }
                        
                        $(id.getElementsByClassName('Prueba-Fondo')[0]).css("background-image", "url("+poster+")");
                        //console.log(id.getElementsByTagName("h4")[0].textContent)
                    
                    }
                };
            }

        })
        .catch((error) => {
            console.log(error);
        });

    }
}

