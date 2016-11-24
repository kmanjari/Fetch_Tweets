<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
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
        <div class="container-padding">
            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {!! Form::open( ['class' => 'form-horizontal']) !!}

                            <div class="form-group">
                                @if(\Session::has('flash_message'))
                                <div class="alert alert-info">
                                {{\Session::get('flash_message')}}
                                </div>
                                @endif


                                <label for="input002" class="col-md-2 control-label form-label"> ID </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-radius" id="input002"
                                           name="name" required>
                                </div>
                            </div>
                            <div class="form-group" id="tab"></div>
                            <div class="form-group">
                                <label class="col-md-2 control-label form-label"></label>
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-success" value="Get tweets">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<button class="btn btn-success" id="tweets"> Get Tweets!</button>--}}
            {!! Form::close()!!}
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="/js/function.js"></script>
</body>

</html>
