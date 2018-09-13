<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
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
                {{--<div class="title m-b-md">
                    Questionnaire
                </div>--}}

                <div class="links">
                    @if(Session::has('name'))
                    Hi, <b>{{ Session::get('name') }} ...</b> goodluck!
                    @endif
                </div>

                <div align="center">

                    <h1>Q
                        @if(Session::has('question_number'))
                            {{ Session::get('question_number') }}
                        @endif
                        ) {{ $question }}</h1>

                    <form method="post" action="{{ route('continue') }}">

                        @if ($errors->has('choice'))
                            <div class="text-danger">Please select an answer</div>
                        @endif

                        <table>
                            @foreach($choices as $choice)
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            @csrf
                                            <input type="radio" class="form-control" name="choice" value="{{ $choice['body'] }}"/>{{ $choice['body'] }}<br>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        <br>

                        <button type="submit" class="btn btn-primary">Next Question</button>
                        <br>
                        <br>
                        @if(Session::has('prev_question_number'))
                            @if(Session::get('prev_question_number') != 0)
                                Answer for question <b>{{ Session::get('question_number')-1 }}) {{ Session::get('answer_'.Session::get('prev_question_number')) }}</b>
                            @endif
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>
