<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/classic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/classic.date.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .loader_bg {
            position: fixed;
            z-index: 999999;
            background: #fff;
            width: 100%;
            height: 100%;
        }

        .loader {
            border: 0 soild transparent;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            position: absolute;
            top: calc(50vh - 75px);
            left: calc(50vw - 75px);
        }

        .loader:before,
        .loader:after {
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

        .loader:before {
            animation-delay: .5s;
        }

        <blade keyframes|%20loader%7B%0D>0% {
            transform: scale(0);
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            transform: scale(1);
            opacity: 0;
        }
        }

    </style>
    @livewireStyles

        <title>Bd Apps Solution 2 </title>
</head>

<body>
    {{--  
    <div class="loader_bg">
        <div class="loader">
            <p>loading --- ---</p>
        </div>
    </div>  --}}

    <div class="content">
        @livewire('progressbar')
            <div class="container text-left">
                <div class="row justify-content-center">
                    <div class="col-lg-7 border rounded p-4 ">

                        <h2 class="mb-5 text-center">(Date Range) To Download data </h2>
                        @livewire('post-form')

                            {{-- <form action="{{ route('download') }}"
                            method="POST" class="row">
                            @csrf

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_from">From</label>
                                    <input type="date" class="form-control" name="start" id="input_from"
                                        placeholder="Start Date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_to">To</label>
                                    <input type="date" class="form-control" name="end" id="input_to"
                                        placeholder="End Date">
                                </div>
                            </div>

                            <div class="col-md-12  d-flex justify-content-center">
                                <button type="submit" class="btn btn-info">Download</button>
                            </div>
                            </form> --}}
                    </div>
                    @if(count($sms)>= 1)
                        <div class="col-12">
                            <div class="card my-5">
                                <div class="card-body text-center">
                                    <h5 class="card-title m-b-0">Table In our hand {{ $total }}</h5>
                                    <form action="{{ route('repush_all') }}" method="get">
                                        @csrf

                                        <button type="submit" class="btn btn-danger float-right">Re-Pull
                                            At_once</button>

                                    </form>
                                </div>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">SL</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">sourceAddress</th>

                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="customtable">
                                            @forelse($sms as $s)
                                                <form
                                                    action="{{ route('repush',[$s->id]) }}"
                                                    method="get">
                                                    @csrf

                                                    <tr>
                                                        <td>{{ $no_count++ }}</td>
                                                        <td>{{ $s->message }}</td>
                                                        <td>{{ $s->sourceAddress }}</td>

                                                        <th><button type="submit" class="btn btn-danger">Re-Pull</span>
                                                        </th>
                                                    </tr>

                                                </form>

                                            @empty

                                                <tr>
                                                    <td colspan="4" class="text-center">
                                                        <h1>No data found </h1>
                                                    </td>
                                                </tr>

                                            @endforelse

                                        </tbody>
                                    </table>

                                    <div class="d-flex">
                                        <div class="mx-auto">
                                            {{ $sms->links("pagination::bootstrap-4") }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>


            @else


        @endif
    </div>
    </div>




    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}


    <script src="{{ asset(' js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/picker.js') }}"></script>
    <script src="{{ asset('js/picker.date.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    {{--  
    <script>
        setTimeout(function () {
            $('.loader_bg').fadeToggle();
        }, 1500);

    </script>  --}}

    @livewireScripts
</body>

</html>
