@extends('templates.home')
@section('title', 'Libros')
@section('content')


<style type="text/css">
.bgimg {
    background-image: url('{{URL::asset("Images/libro2.png")}}');
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
</style>
<div class="container">
  <div class="row">
    <div class="left">
      <h5 class="light">Libros</h5>
    </div>
    <div class="right"><br>
      <a href="{{route('Libro.create')}}" class="modal-trigger btn-floating tooltipped btn-large waves-effect waves-light  light-blue darken-4" data-position="bottom" data-delay="50" data-tooltip="Agregar"><i class="material-icons">add</i></a>
    </div>
  </div>
  <nav>
   <div class="nav-wrapper cyan darken-1">
      <a href="#!" class="brand-logo"><i class="material-icons">find_in_page</i>Busqueda de libros</a>
     <ul class="right hide-on-med-and-down">
         <li>
           <ul id="dropdown" class="dropdown-content">
             @foreach($categorias as $categoria)
             <li><a href="{{route('Categoria.show',$categoria->id)}}">{{$categoria->nombre}}</a></li>
             @endforeach
           </ul>
             <a class="btn dropdown-button" href="#!" data-activates="dropdown">Categoria<i class="material-icons right">arrow_drop_down</i></a>
         </li>
         <li>
           <ul id="dropdown2" class="dropdown-content">
             @foreach($editoriales as $editorial)
             <li><a href="{{route('Editorial.show',$editorial->id)}}">{{$editorial->nombre}}</a></li>
             @endforeach
           </ul>
             <a class="btn dropdown-button" href="#!" data-activates="dropdown2">Editorial<i class="material-icons right">arrow_drop_down</i></a>
         </li>
         <li>
           <ul id="dropdown3" class="dropdown-content">
             @foreach($autores as $autor)
             <li><a href="{{route('Autor.show',$autor->id)}}">{{$autor->nombre}}</a></li>
             @endforeach
           </ul>
             <a class="btn dropdown-button" href="#!" data-activates="dropdown3">Autor<i class="material-icons right">arrow_drop_down</i></a>
         </li>
       </ul>

   </div>
 </nav>

  <div id="libros" class="row section scrollspy">
    <div class="row">
      @foreach ($libros as $libro)

        <div class="col s6 m6 l3">
          <div class="card bgimg z-depth-5">
            <div class="card-content white-text">
              <p class="card-title center">{{$libro->nombre}}</p>
              <p class="medium center"><a href="{{route('Autor.show',$libro->idaut)}}">{{$libro->aut}}</a></p>
              <div class="divider"></div>
              <p class="light left">Edicion: </p><p class="medium"> {{$libro->edicion}} </p>
              <p class="light left">Año: </p><p class="medium"> {{$libro->anio}} </p>
              <p class="light left">Páginas:</p><p class="medium "> {{$libro->paginas}} </p>
              <span class="light">Editorial: </span> <a href="{{route('Editorial.show',$libro->idedit)}}">{{$libro->edit}}</a><br>
              <span class="light">Categoria: </span> <a href="{{route('Categoria.show',$libro->idcat)}}">{{$libro->cat}}</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
  </div>

</div>

@endsection
@section('section')
<blockquote>
      Es una lista de los libros disponibles en la biblioteca.
</blockquote>
@endsection