<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

    </head>
    <body>
        <div class="container mt-3">
            <div class="content" id="app">
                <ul>
                    <li v-for="movie in movies">
                        <h3>@{{ movie.title }}</h3>
                        <h4>@{{ movie.author }}</h4>
                        <h4>@{{ movie.time }} min.</h4>
                        <h5>@{{ movie.year }}</h5>
                    </li>
                </ul>
                
            </div>
        </div>
        {{-- axios --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- Vuejs --}}
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
        <script>

            var app = new Vue({
                el: '#app',
                data: {
                    movies:[],
                },
                mounted: function(){
                    var self = this;
                    axios.get('/api/movies')
                    .then(function (response) {
                        self.movies = response.data;
                    });
                }
            });
        </script>
    </body>
</html>
