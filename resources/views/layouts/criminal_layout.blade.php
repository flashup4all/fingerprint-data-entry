<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <head>
        <title>@yield('title')</title>
    </head>
    <script type="text/javascript">
      window.localStorage.setItem('ftpurl', '{{url('')}}')
    </script>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    
    <!-- <script type="text/javascript" src="{{ asset('scripts/CloudABIS-helper.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('scripts/CloudABIS-ScanR.js') }}" ></script> -->
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">CRIMINAL RECORD APP</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div> -->
        </nav>
<br>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb_title')</li>
          </ol>
        </nav>
        <br>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <img src="{{ asset('images/'.$user->image) }}" height="400px" width="300px">
            </div>
            <div class="col-md-8">
              <ul class="list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Name
                  <span class="">{{ $user->first_name }} {{ $user->last_name }} {{ $user->middle_name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Date of Birth
                  <span class="">{{ $user->age }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Gender
                  <span class="">{{ $user->gender }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Phone Number
                  <span class="">{{ $user->phone_number }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Email
                  <span class="">{{ $user->email ?? 'nill'}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  State of Origin
                  <span class="">{{ $user->state->state }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  LGA
                  <span class="">{{ $user->local_govt->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Current Address
                  <span class="">{{ $user->address }}</span>
                </li>
              </ul>
            </div>
          </div>
            @yield('content')
        </div>
       <script type="text/javascript">
  // 'use strict';
const api = window.localStorage.getItem('ftpurl').replace(/\s/g, '');
  const getLocalGovts = () => {
    let stateId = document.getElementById('state').value;
    // console.log(stateId)
    let url = `${api}/states/locals/${stateId}`;
  $.ajax({
        type: "GET",
        url: url,
        // dataType: "html",
        success: function (data) {
            if(data.status == 'ok')
            {
                let array = data.data;
              var select = document.getElementById("local_govt"); 
            
            select.innerHTML = "";
            select.innerHTML += "<option value='' disabled='' selected=''>-- Options --</option>";
            // Populate list with options:
            for(var i = 0; i < array.length; i++) {
                var opt = array[i];
                select.innerHTML += "<option value=\"" + opt.id + "\">" + opt.name + "</option>";
            }
            console.log(array)
                
            }

        }
    });
}

const validate = () => {
  console.log('validate')
  return 
}
</script>
    </body>
</html>