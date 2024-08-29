@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criar Agendamento para Sensor: {{ $sensor->nome }}</div>

                <div class="card-body">
                    <!-- Exibindo mensagens de sucesso ou erro -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('agendamento.store') }}">
                        @csrf

                        <!-- Campo para o ID do sensor -->
                        <input type="hidden" name="sensor_id" value="{{ $sensor->id }}">

                        <!-- Campo para Horário de Início -->
                        <div class="form-group">
                            <label for="horario_inicio">Horário de Início:</label>
                            <input type="time" class="form-control @error('horario_inicio') is-invalid @enderror" id="horario_inicio" name="horario_inicio" value="{{ old('horario_inicio') }}" required>
                            @error('horario_inicio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Campo para Duração -->
                        <div class="form-group">
                            <label for="duracao">Duração (em minutos):</label>
                            <input type="number" class="form-control @error('duracao') is-invalid @enderror" id="duracao" name="duracao" value="{{ old('duracao') }}" required>
                            @error('duracao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Campo para Seleção dos Dias da Semana -->
                        <div class="form-group">
                            <label for="dia_da_semana">Dias da Semana:</label><br>
                            @foreach(['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo'] as $dia)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="{{ $dia }}" name="dia_da_semana[]" value="{{ $dia }}" {{ in_array($dia, old('dia_da_semana', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $dia }}">{{ ucfirst($dia) }}</label>
                                </div>
                            @endforeach
                            @error('dia_da_semana')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Botão de Criação do Agendamento -->
                        <button type="submit" class="btn btn-primary">Criar Agendamento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
