<!-- resources/views/formulario_adicionar_sensor.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar Sensor</div>

                <div class="card-body">
                    <!-- Exibir mensagens de erro de validação -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulário para adicionar um novo sensor -->
                    <form action="{{ route('sensor.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <input type="text" id="descricao" name="descricao" class="form-control" value="{{ old('descricao') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="umidade_minima">Umidade Mínima:</label>
                            <input type="number" id="umidade_minima" name="umidade_minima" class="form-control" step="0.01" value="{{ old('umidade_minima') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="umidade_maxima">Umidade Máxima:</label>
                            <input type="number" id="umidade_maxima" name="umidade_maxima" class="form-control" step="0.01" value="{{ old('umidade_maxima') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
