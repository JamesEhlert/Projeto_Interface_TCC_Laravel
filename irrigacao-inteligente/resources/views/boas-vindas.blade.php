<!-- resources/views/boas-vindas.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tela de Boas-Vindas</div>

                <div class="card-body">
                    <!-- Botão para ver a lista de sensores -->
                    <a href="{{ route('sensor.listar') }}" class="btn btn-primary mb-3">Ver Lista de Sensores</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
