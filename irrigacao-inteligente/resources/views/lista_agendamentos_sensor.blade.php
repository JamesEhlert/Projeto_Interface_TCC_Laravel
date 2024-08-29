@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Agendamentos do Sensor: {{ $sensor->descricao }}
                    <!-- Botão de Voltar -->
                    <a href="{{ route('sensor.listar') }}" class="btn btn-secondary float-right">Voltar</a>
                </div>

                <div class="card-body">
                    <!-- Exibir mensagem de sucesso, se houver -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Botão para criar novo agendamento -->
                    <div class="mb-3">
                        <a href="{{ route('sensor.agendar', $sensor->id) }}" class="btn btn-success">Criar Novo Agendamento</a>
                    </div>

                    <!-- Tabela para listar agendamentos -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hora de Início</th>
                                <th>Duração</th>
                                <th>Dias da Semana</th>
                                <th>Ações</th> <!-- Nova coluna para o botão de exclusão -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agendamentos as $agendamento)
                            <tr>
                                <!-- Hora de início -->
                                <td>{{ \Carbon\Carbon::parse($agendamento->horario_inicio)->format('H:i') }}</td>
                                
                                <!-- Duração -->
                                <td>
                                    @php
                                        // Converte a duração para minutos e segundos
                                        $duracao = \Carbon\Carbon::parse($agendamento->duracao);
                                        $totalSegundos = $duracao->hour * 3600 + $duracao->minute * 60 + $duracao->second;
                                        $minutos = floor($totalSegundos / 60);
                                        $segundos = $totalSegundos % 60;
                                    @endphp
                                    {{ $minutos }}m {{ str_pad($segundos, 2, '0', STR_PAD_LEFT) }}s
                                </td>
                                
                                <!-- Dias da Semana -->
                                <td>
                                    @foreach (json_decode($agendamento->dia_semana) as $dia)
                                        {{ ucfirst($dia) }}<br>
                                    @endforeach
                                </td>

                                <!-- Botão de exclusão -->
                                <td>
                                    <form action="{{ route('agendamento.destroy', $agendamento->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este agendamento?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
