<!-- resources/views/lista_sensores_cadastrados.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Sensores</div>

                <div class="card-body">
                    <!-- Exibir mensagem de sucesso, se houver -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <!-- Botões -->
                    <!-- Botão de Adicionar Sensor -->
                    <a href="{{ route('sensor.adicionar') }}" class="btn btn-primary mb-3">Adicionar Sensor</a>
                    <!-- Botão para consultar temperatura -->
                    <a href="{{ route('consultar-temperatura') }}" class="btn btn-secondary mb-3">Consultar Temperatura</a>
                    <!-- Container para rolagem da tabela -->
                    <div class="table-container">
                        <!-- Tabela para listar sensores -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descrição</th> <!-- Alterado de "Nome" para "Descrição" -->
                                    <th>Umidade Mínima</th>
                                    <th>Umidade Máxima</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sensores as $sensor)
                                <tr>
                                    <td>{{ $sensor->id }}</td>
                                    <td>{{ $sensor->descricao }}</td> <!-- Alterado de "nome" para "descricao" -->
                                    <td>{{ $sensor->umidade_minima }}</td>
                                    <td>{{ $sensor->umidade_maxima }}</td>
                                    <td>
                                        <!-- Botão para configurar o sensor -->
                                        <a href="{{ route('sensor.configurar', $sensor->id) }}" class="btn btn-info">Configurar</a>
                                        
                                        <!-- Botão para ver agendamentos -->
                                        <a href="{{ route('sensor.agendamentos', $sensor->id) }}" class="btn btn-primary">Ver Agendamentos</a>

                                        <!-- Formulário de exclusão -->
                                        <form action="{{ route('sensor.excluir', $sensor->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este sensor e todos os agendamentos associados?')">Excluir</button>
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
</div>
@endsection
