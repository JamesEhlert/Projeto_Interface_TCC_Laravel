<!-- resources/views/configuracao_sensor_especifico.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Configuração do Sensor</div>

                <div class="card-body">
                    <!-- Formulário para editar a faixa de umidade e descrição -->
                    <form method="POST" action="{{ route('sensor.atualizar', $sensor->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $sensor->descricao }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="umidade_minima">Umidade Mínima</label>
                            <input type="number" step="0.01" name="umidade_minima" id="umidade_minima" class="form-control" value="{{ $sensor->umidade_minima }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="umidade_maxima">Umidade Máxima</label>
                            <input type="number" step="0.01" name="umidade_maxima" id="umidade_maxima" class="form-control" value="{{ $sensor->umidade_maxima }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Atualizar Sensor</button>
                    </form>

                    <!-- Botão para criar agendamento -->
                    <div class="mt-4">
                        <a href="{{ route('sensor.agendar', $sensor->id) }}" class="btn btn-success">Criar Agendamento</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
