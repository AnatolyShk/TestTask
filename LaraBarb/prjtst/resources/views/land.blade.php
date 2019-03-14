<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
</head>
<body class="mainfone">
<nav class="navbar fixed-top navbar-dark bg-dark justify-content-center">
  <a class="navbar-brand" href="#"><h1>BARBER SHOP</h1></a>
</nav>
@include('boostrapinc')
<section class="a mx-lg-6">
  <div class="container-fluid max-width: 100%">
    <div class = "row h-100 justify-content-center ">
      <div class="info">
        <h2 class="top">STYLISH HAIRCUTS</h2>
        Our barbers our classically trained and familiar with all the latest style trends.
        Come in for a hair cut, shape up, or shave, and stay for warm atmosphere.
        Whether you’re a regular or walking in for the first time, you’ll be sure to strike up a 
        conversation with our personable stylists, and leave feeling relaxed and looking great!
        </div>
        <div class="wrapp">
          <ul>
            @foreach ($services as $serv)
            @if($serv->isMain==1)
            <li>
              <div class="imagesBox mx-lg-4 mx-md-2 a1 pull-right">
                <img alt="Responsive image" src = "{{asset('css/pictures/service').'/'.$serv->id.'.png'}}">
                <p>{{$serv->name}}</p>
              </div>
            </li>   
            @endif
            @endforeach
          </ul>
        </div>
      </div>
    </div>
</section>
<section class="mx-lg-6">
    <div class="row h-100 justify-content-center info">
        <h2 class="top">PRICE LIST FOR ALL SERVICES</h2>
    </div>
    <table class="table table-hover table-dark">
      <thead>
        <tr>
          <th scope="col">Service</th>
          <th scope="col">Cost</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($services as $serv)
        <tr>
          <th scope="row">{{$serv->name}}</th>
          <td>{{$serv->cost}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
</section>
<section>
  <div class="row h-100 justify-content-center info">
    <h2 class="top">CONTACTS</h2>
  </div>
  @foreach ($places as $place)
  <table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">{{$place->city}}</th>
        <th scope="col">Phone number</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$place->address}}</th>
        <td>{{$place->phone}}</td>
      </tr>
    </tbody>
  </table>
  @endforeach
</section>
</body>

</html>

