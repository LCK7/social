<!-- Ahora, extendemos la plantilla creada -->
@extends('layouts.app')

<!-- Luego vamos a personalizar la seccion CONTENT-->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card border-0">
                    <form action="{{ route('statuses.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <textarea class="form-control border-0" name="body" placeholder="¿Que estas pensando?" cols="30" rows="10"></textarea>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="create-status">Publicar Estado</button>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

