<!-- resources/views/forgot-password.blade.php -->
@extends('layouts.app')

@section('title', 'Esqueci minha senha')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Esqueci minha senha</div>
            <div class="card-body">
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar link de recuperação</button>
                    <a href="{{ route('login') }}" class="btn btn-link">Voltar ao login</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
