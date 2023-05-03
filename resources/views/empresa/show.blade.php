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
                            <div class="col-sm-6">
                                <strong>Razão Social</strong>: {{ $empresa->razao_social }} <br>
                                <strong>CNPJ/CPF</strong>:
                                @if (strlen($empresa->documento) === 11)
                                    {{ mascara($empresa->documento, '###.###.###-##') }}
                                @else
                                    {{ mascara($empresa->documento, '###.###.###/####-##')}}
                                @endif
                                <br>
                                <strong>IE/RG</strong>: {{ $empresa->ie_rg }} <br>
                                <strong>Observações</strong>: {{ $empresa->observacao }}
                            </div>
                            <div class="col-sm-6">
                                <address>
                                    {{ $empresa->logradouro }}, {{ $empresa->bairro }} <br>
                                    {{ $empresa->cidade }} - {{ $empresa->estado }} -
                                    {{ mascara($empresa->cep, '#####-###') }} <br>
                                    <strong>Nome Contato</strong>: {{ $empresa->nome_contato }} <br>
                                    <strong>Celular</strong>: {{ mascara($empresa->celular, '(##) # ####-####') }} <br>
                                    <strong>E-mail</strong>: {{ $empresa->email }} <br>
                                    <strong>Telefone</strong>: {{ mascara($empresa->telefone, '(##) ####-####') }}
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('empresas.destroy', $empresa) }}?tipo={{ $empresa->tipo }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Tem certeza que deseja apagar {{ $empresa->nome }}?')">Apagar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
