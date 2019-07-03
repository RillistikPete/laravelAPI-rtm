<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('css/libs.css')}}" rel="stylesheet" type="text/css">


        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            #myImg{
                display: block;
                text-align: center;
                margin: auto;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                background-color: white;
                border-radius: 20px;

            }

            .title {
                font-size: 110px;
                font-weight: bold;
                color: black;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
            <div class="flex-center position-ref full-height">

                <div class="content">
                    <img id="myImg" alt="Hi" style="display:block;" src="/images/GitHub-bra.jpg" height="200" width="400"/>
                    <div class="title m-b-md">
                        Search GitHub
                    </div>
                    <div class="repoButton">
                        <div class="form-group">
                                <form action="/search">
                                    <button type="submit" class="btn btn-primary btn-xl">Search Repos</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
