@extends('layouts.app')

@section('title')
    <h1>Detalhes de {{ $empresa->nome }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('empresas.index') }}?tipo=={{ $empresa->tipo }}">Listagem de {{ $empresa->tipo }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('empresas.show', $empresa) }}">Detalhes</a>
    </li>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4><i class="fas fa-globe"></i> {{ $empresa->nome }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('empresas.destroy', $empresa) }}?tipo={{$empresa->tipo}}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar {{$empresa->nome}}?')">Apagar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
