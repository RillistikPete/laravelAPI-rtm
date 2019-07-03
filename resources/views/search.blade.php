<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Home') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet" type="text/css">    

</head>



<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Home
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    Repository Search
                </div>
                <div class="pull-right">
                    <a target="_blank" href="https://github.com/"><img id="myImg" alt="Hi" style="display:block;" src="/images/GitHub-bra.jpg" height="80" width="160"/></a>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')

            <div class="text-center">

                    <h1>GitHub Repositories</h1> <br>
                    <input id="searcher" type="text" class="text-center form-control" placeholder="Enter Repo Name"/>
                    <button class="btn btn-success" style="margin-top:25px;" type="submit" id="searchButton">Search</button> <br>
                    <button class="btn btn-info" style="margin-top:25px;" type="submit" id="langButton">Sort By Language Search</button> <br>
                    <button class="btn btn-warning" style="margin-top:25px;" type="submit" id="starsButton">Sort By Stars</button> <br><br>
            </div>
            

            <div class="text-center" style="margin-top:50px;">
                <div class="container">
                    <div class="row">
                        <div id="resultSingle" class="col-lg-12 col-md-12 col-sm-6 col-xs-6"></div>
                        <div id="result" class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
                        <div id="summary" class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @section('scripts')
    <script>
        const clientID = "Iv1.c3e9be124417de5b";
        const clientSecret = "5c6fe707c0b932d4db6b328b8073e40cb5293796";
        //API CALL
        const divResult = document.getElementById("result");
        const divResultSing = document.getElementById("resultSingle");
        const divSumm = document.getElementById("summary");
        const langButton = document.getElementById("langButton");
        const searchButton = document.getElementById("searchButton");
        const starsButton = document.getElementById("starsButton");
        const searchInput = document.getElementById("searcher");
        
        const fetchRepos = async (repo) => {
            clear();
            const api_call = await fetch(`https://api.github.com/search/repositories?q=${repo}`);
            const data = await api_call.json();
            data.items.forEach(i=>{
                const anchor = document.createElement("a");
                    anchor.href = i.html_url;
                    anchor.textContent = "Repo Link: " + i.full_name;
                    anchor.style.fontSize = "1.7em";
                    anchor.setAttribute("target", "_blank");
                const username = document.createElement("h3");
                    username.textContent = "Username: " + i.owner.login;
                const description = document.createElement("h4");
                    description.textContent = "Description: " + i.description;
                const stars = document.createElement("h4");
                    stars.style.color = "gold";
                    stars.textContent = "Stars: " + i.stargazers_count;
                divResultSing.appendChild(anchor);
                divResultSing.appendChild(username);
                divResultSing.appendChild(description);
                divResultSing.appendChild(stars);
                divResultSing.appendChild(document.createElement("br"));
            })
            return data;
        }
        
        const showData = () => {
            fetchRepos(searchInput.value).then((data) => {
                console.log('data', data);
            });
        }

        const fetchRepoByLang = async (repo) => {
            clear();
            const api_call = await fetch(`https://api.github.com/search/repositories?q=${repo}&sort=language&order=desc`);
            const data = await api_call.json();
            data.items.forEach(i=>{
                const anchor = document.createElement("a");
                    anchor.href = i.html_url;
                    anchor.textContent = "Repo Link: " + i.full_name;
                    anchor.style.fontSize = "1.7em";
                    anchor.setAttribute("target", "_blank");
                const username = document.createElement("h3");
                    username.textContent = "Username: " + i.owner.login;
                const description = document.createElement("h4");
                    description.textContent = "Description: " + i.description;
                const lang = document.createElement("h4");
                    lang.textContent = "Language: " + i.language;
                const stars = document.createElement("h4");
                    stars.style.color = "gold";
                    stars.textContent = "Stars: " + i.stargazers_count;
                divResult.appendChild(anchor);
                divResult.appendChild(username);
                divResult.appendChild(description);
                divResult.appendChild(lang);
                divResult.appendChild(stars);
                divResult.appendChild(document.createElement("br"));
                if(i.language != null){
                const table = `<table class="table table-hover">
                                <thead>
                                    <tr><th>Language</th><th>Number of Repos</th><th>Most Popular</th></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>${i.language}</td>
                                        <td>${data.total_count}</td>
                                        <td>${i.language}</td>
                                    </tr>
                                    </tbody>
                                </table>`;
                divSumm.innerHTML = table;}
            })
            return data;
        }

        const showLang = () => {
            fetchRepoByLang(searchInput.value).then((data) => {
                console.log('data', data);
            });
        }

        const fetchReposByStars = async (repo) => {
            clear();
            const api_call = await fetch(`https://api.github.com/search/repositories?q=${repo}&sort=stars&order=desc`);
            const data = await api_call.json();
            data.items.forEach(i=>{
                const anchor = document.createElement("a");
                    anchor.href = i.html_url;
                    anchor.textContent = "Repo Link: " + i.full_name;
                    anchor.style.fontSize = "1.7em";
                    anchor.setAttribute("target", "_blank");
                const username = document.createElement("h3");
                    username.textContent = "Username: " + i.owner.login;
                const description = document.createElement("h4");
                    description.textContent = "Description: " + i.description;
                const stars = document.createElement("h2");
                    stars.style.color = "gold";
                    stars.textContent = "Stars: " + i.stargazers_count;
                divResultSing.appendChild(anchor);
                divResultSing.appendChild(username);
                divResultSing.appendChild(description);
                divResultSing.appendChild(stars);
                divResultSing.appendChild(document.createElement("br"));
            })
            return data;
        }

        const showStars = () => {
            fetchReposByStars(searchInput.value).then((data) => {
                console.log('data', data);
            });
        }
        
        searchButton.addEventListener("click", () => {
            showData();
        });

        langButton.addEventListener("click", () => {
            showLang();
        })

        starsButton.addEventListener("click", () => {
            showStars();
        })

        function clear(){
            var fc = divResult.firstChild;
            while(fc)
                divResult.innerHTML = "";
        }


    </script>
</body>
</html>

