<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

        body {

            font-family: 'Calibri', sans-serif !important
        }

        .container {
            margin-top: 100px
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0px solid transparent;
            border-radius: 0px
        }
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem
        }

        .card .card-title {
            position: relative;
            font-weight: 600;
            margin-bottom: 10px
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent
        }

        * {
            outline: none
        }

        .table th,
        .table thead th {
            font-weight: 500
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6
        }

        .table th {
            padding: 1rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6
        }

        .table th,
        .table thead th {
            font-weight: 500
        }

        th {
            text-align: inherit
        }

        .m-b-20 {
            margin-bottom: 20px
        }

        .customcheckbox {
            display: block;
            position: relative;
            padding-left: 24px;
            font-weight: 100;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }

        .customcheckbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer
        }

        .checkmark {
            position: absolute;
            top: -3px;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #CDCDCD;
            border-radius: 6px
        }

        .customcheckbox input:checked~.checkmark {
            background-color: #2196BB
        }

        .customcheckbox .checkmark:after {
            left: 8px;
            top: 4px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg)
        }
    </style>

     <style>
        .loader_bg{
    position: fixed;
    z-index: 999999;
    background: #fff;
    width: 100%;
    height: 100%;
}
.loader{
    border: 0 soild transparent;
    border-radius: 50%;
    width: 150px;
    height: 150px;
    position: absolute;
    top: calc(50vh - 75px);
    left: calc(50vw - 75px);
}
.loader:before, .loader:after{
    content: '';
    border: 1em solid #ff5733;
    border-radius: 50%;
    width: inherit;
    height: inherit;
    position: absolute;
    top: 0;
    left: 0;
    animation: loader 2s linear infinite;
    opacity: 0;
}
.loader:before{
    animation-delay: .5s;
}
@keyframes loader{
    0%{
        transform: scale(0);
        opacity: 0;
    }
    50%{
        opacity: 1;
    }
    100%{
        transform: scale(1);
        opacity: 0;
    }
}
    </style>

</head>

<body>

   <div class="loader_bg">
    <div class="loader">
        <p>loading --- ---</p>
    </div>
</div>


    <div class="container">
    @livewire('progressbar')
        <div class="row">
            <div class="col-12">
                  <a class="btn btn-info" href="{{ url("/") }}">Back to Home</a>

                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title m-b-0">Table In SearchByDate </h5>
                    </div>


                    <div class="table-responsive border rounded">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">sourceAddress</th>
                                    <th scope="col">Created at</th>


                                </tr>
                            </thead>
                            <tbody class="customtable">
                                @forelse($sms as $s)
                                <tr>
                                    <td>{{ $no_count++ }}</td>
                                    <td>{{ $s['message']}}</td>
                                    <td>{{ $s['sourceAddress']}}</td>
                                    <td>{{ $s['created_at']}}</td>
                                </tr>
                                
                                @empty 
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <h2>No data found</h2>
                                    </td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>

                    

                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

  <script>
        setTimeout(function(){
            $('.loader_bg').fadeToggle();
        }, 1500);
    </script>
    
</body>
</html>