@extends('layouts.master')

@section('title','Inicio')

@section('content')

<div id="carousel-ejemplo" class="carousel slide margenMenu" data-ride="carousel" >
          <ol class="carousel-indicators">

            <li data-target="#carousel-ejemplo" data-slide-to="0" class="active" ></li>
            <li data-target="#carousel-ejemplo" data-slide-to="1"></li>
            <li data-target="#carousel-ejemplo" data-slide-to="2"></li>
            <li data-target="#carousel-ejemplo" data-slide-to="3"></li>

            <li data-target="#carousel-ejemplo" data-slide-to="4"></li>
            <li data-target="#carousel-ejemplo" data-slide-to="5"></li>
            <li data-target="#carousel-ejemplo" data-slide-to="6"></li>
            <li data-target="#carousel-ejemplo" data-slide-to="7"></li>

          </ol>

          <div class="carousel-inner" role="listbox">


            <div class="item active">
              <center><img  src="ucab/2.png"></center>
              <div class="carousel-caption">
                <h3></h3>
              </div>
            </div>

            <div class="item">
               <center><img  src="ucab/3.png"></center>
              <div class="carousel-caption">
                <h3></h3>
              </div>
            </div>


            <div class="item">
              <center><img  src="ucab/7.jpg"></center>
              <div class="carousel-caption">
                <h3></h3>
              </div>
            </div>
             <div class="item">
              <center><img  src="ucab/8.jpg"></center>
              <div class="carousel-caption">
                <h3></h3>
              </div>
            </div>
            <div class="item">
              <center><img  src="ucab/9.jpg"></center>
              <div class="carousel-caption">
                <h3></h3>
              </div>
            </div>
            <div class="item">
              <center><img  src="ucab/11.jpg"></center>
              <div class="carousel-caption">
                <h3></h3>
              </div>
            </div>



          </div>

          <a class="left carousel-control" href="#carousel-ejemplo" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previo</span>
            </a>

            <a class="right carousel-control" href="#carousel-ejemplo" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">siguiente</span>
            </a>

        </div>

        <div class="container-fluid margenTitulo" id="colorFondo">
          <div class="row">
            <div class="col-lg-12 ">
              <img src="ucab/logoWellP.png">
              <h3>EMSABLAJE A TU MEDIDA</h3>
            </div>
          </div>
      </div>

    <div class="container-fluid margenTabla"  >
      <div class="container" id="bordeTotalA" >



            <div class="row" id="margenAmarillo" >
              <div class=" col-lg-6" >
                <center><h3 id="colorh3">AU80</h3></center>
              </div>
              <div class=" col-lg-6" >
                <center><h3 id="colorh3">AU801</h3></center>
              </div>
            </div>


      <div class="row" id="margenA">
        <div class="col-lg-6" id="bordeAmarillo">
          <img src="ucab/2.png" class="img-responsive">
          <strong><p>•Capacidad: 179 pasajeros</p></strong>
          <strong><p>•Longitud: 44,1 m.</p></strong>
          <strong><p>•Envergadura: 39,9 m.</p></strong>
          <strong><p>•Altura: 12,9 m.</p></strong>
          <strong><p>•Peso vacío: 55.580 KG</p></strong>
          <strong><p>•Peso máximo al despegue: 116570 KG</p></strong>
          <strong><p>•Planta motriz: 4× turborreactores Pratt & Whitney JT3D­1.</p></strong>

        </div>
        <div class="col-lg-6" >
          <img src="ucab/9.jpg" class="img-responsive">
           <strong><p>•Tripulación: 7 tripulantes</p></strong>
          <strong><p>•Capacidad: 189 pasajeros.</p></strong>
          <strong><p>•Longitud: 46,7 m.</p></strong>
          <strong><p>•Envergadura: 32,9 m.</p></strong>
          <strong><p>•Altura: 10,4 m</p></strong>
          <strong><p>•Superficie alar: 153 m2</p></strong>
          <strong><p>•Planta motriz: 3× turborreactores Pratt & Whitney JT8D.</p></strong>
        </div>
    </div>
    </div>
    </div>


    <div class="container-fluid margenTabla" id="colorFondo" >
      <div class="container bordeTotalAz" id="fondoBlanco"  >



            <div class="row" id="margenAzul" >
              <div class=" col-lg-6" >
                <center><h3 id="colorh3A">AU802</h3></center>
              </div>
              <div class=" col-lg-6" >
                <center><h3 id="colorh3A">AU747 PLUS</h3></center>
              </div>
            </div>


      <div class="row" id="margenAz">
        <div class="col-lg-6" id="bordeAzul" >
          <img src="ucab/8.jpg" class="img-responsive">
          <strong><p>•Capacidad: 222 pasajeros</p></strong>
          <strong><p>•Longitud: 28,6 m.</p></strong>
          <strong><p>•Envergadura: 28,3 m.</p></strong>
          <strong><p>•Altura: 11,3 m.</p></strong>
          <strong><p>•Peso vacío: 28.120 KG</p></strong>
          <strong><p>•Peso máximo al despegue: 49.190 KG</p></strong>
          <strong><p>•Planta motriz: Pratt & Whitney
JT8D­7</p></strong>
        </div>

        <div class="col-lg-6" >
          <img src="ucab/11.jpg" class="img-responsive">
          <strong><p>•Capacidad: 366 pasajeros</p></strong>
          <strong><p>•Longitud: 70,66 m.</p></strong>
          <strong><p>•Envergadura: 59,64 m.</p></strong>
          <strong><p>•Altura: 19,3 m.</p></strong>
          <strong><p>•Peso vacío: 55.580 KG</p></strong>
          <strong><p>•Peso máximo al despegue: 333400 KG</p></strong>
          <strong><p>•Planta motriz: Rolls­Royce
RB211­524B2</p></strong>
        </div>
    </div>
    </div>
    </div>

     <div class="container-fluid margenTabla" >
      <div class="container bordeTotalV">

            <div class="row" id="margenVerde">
              <div class=" col-lg-6" >
               <center> <h3 id="colorh3A">AU380</h3></center>
              </div>
              <div class=" col-lg-6" >
               <center> <h3 id="colorh3A">AU320</h3></center>
              </div>
            </div>


      <div class="row" id="margenV">
        <div class="col-lg-6" id="bordeVerde">
          <img src="ucab/7.jpg" class="img-responsive">
          <strong><p>•Capacidad: 191 pasajeros</p></strong>
          <strong><p>•Longitud: 30,2 m.</p></strong>
          <strong><p>•Envergadura: 29,9 m.</p></strong>
          <strong><p>•Altura: 11,9 m.</p></strong>
          <strong><p>•Peso vacío: 50.170 KG</p></strong>
          <strong><p>•Peso máximo al despegue: 116570 KG</p></strong>
          <strong><p>•Planta motriz: 4× turborreactores Pratt & Whitney JT3D­1.</p></strong>
        </div>
        <div class="col-lg-6" >
          <img src="ucab/3.png" class="img-responsive margenMenu">
          <strong><p>•Capacidad: 179 pasajeros</p></strong>
          <strong><p>•Longitud: 44,1 m.</p></strong>
          <strong><p>•Envergadura: 39,9 m.</p></strong>
          <strong><p>•Altura: 12,9 m.</p></strong>
          <strong><p>•Peso vacío: 55.580 KG</p></strong>
          <strong><p>•Peso máximo al despegue: 116570 KG</p></strong>
          <strong><p>•Planta motriz: 4× turborreactores Pratt & Whitney JT3D­1.</p></strong>

      </div>

    </div>
    </div>
    </div>
@endsection