<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('css/classic.css')}}">
    <link rel="stylesheet" href="{{ asset('css/classic.date.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <title>Bd Apps Solution 2 </title>
</head>

<body>


    <div class="content">
   @livewire('progressbar')
        <div class="container text-left">
            <div class="row justify-content-center">
                <div class="col-lg-7 border rounded p-4 ">
                    <h2 class="mb-5 text-center">(Date Range) To Download data </h2>
                    <form action="{{ route('download')}}" method="POST" class="row">
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
                                <input type="date" class="form-control" name="end" id="input_to" placeholder="End Date">
                            </div>
                        </div>

                        <div class="col-md-12  d-flex justify-content-center">
                            <button type="submit" class="btn btn-info">Download</button>
                        </div>
                    </form>
                </div>
              @if(count($sms)>= 1)
                <div class="col-12">
                    <div class="card my-5">
                        <div class="card-body text-center">
                            <h5 class="card-title m-b-0">Table In our hand {{ $total  }}</h5>
                                    <form action="{{ route('repush_all') }}" method="get">
                                       @csrf

                            <button type="submit" class="btn btn-danger float-right">Re-Pull At_once</button>
                            
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
                                    <form action="{{ route('repush',[$s->id]) }}" method="get">
                                        @csrf

                                        <tr>
                                            <td>{{ $no_count++ }}</td>
                                            <td>{{ $s->message}}</td>
                                            <td>{{ $s->sourceAddress}}</td>

                                            <th><button type="submit" class="btn btn-danger">Re-Pull</span> </th>
                                        </tr>

                                    </form>

                                    @empty

                                    <tr>
                                        <td colspan="4" class="text-center"><h1>No data found </h1></td>
                                    </tr>

                                    @endforelse

                                </tbody>
                            </table>
                            
                             <div class="d-flex">
                            <div class="mx-auto">
                                {{$sms->links("pagination::bootstrap-4")}}
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
    <script src="{{ asset(' js/popper.min.js')}}"></script>
    <script src="{{  asset('js/bootstrap.min.js') }}"></script>
    <script src="{{  asset('js/picker.js') }}"></script>
    <script src="{{  asset('js/picker.date.js') }}"></script>

    <script src="{{ asset('js/main.js')}}"></script>
</body>

</html>