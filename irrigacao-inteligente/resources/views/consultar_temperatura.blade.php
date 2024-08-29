<!-- resources/views/consultar_temperatura.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Consultar Temperatura</div>

                <div class="card-body">
                    <!-- Botões de navegação -->
                    <div class="mb-3">
                        <a href="{{ route('sensor.listar') }}" class="btn btn-secondary">Voltar para Lista de Sensores</a>
                    </div>

                    <!-- Formulário de consulta de temperatura -->
                    <form action="{{ route('consultar-temperatura') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" id="cidade" name="cidade" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="pais">País:</label>
                            <input type="text" id="pais" name="pais" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Consultar Temperatura</button>
                    </form>

                    <!-- Exibir resultado -->
                    @if (isset($temperaturaAtual))
                        <div class="alert alert-info">
                            <h4>Temperatura Atual:</h4>
                            <p>Temperatura em {{ $cidade }}: {{ $temperaturaAtual }}°C</p>
                        </div>
                    @elseif (isset($erro))
                        <div class="alert alert-danger">
                            <p>{{ $erro }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
