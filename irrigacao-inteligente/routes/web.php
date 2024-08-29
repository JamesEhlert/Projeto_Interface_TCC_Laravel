<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ConsultarTemperaturaController;

// Redirecionar a raiz para a página de login
Route::get('/', function () {
    return redirect('/login');
});

// Rotas para autenticação
Route::get('/login', [UsuarioController::class, 'showLogin'])->name('login');
Route::post('/login', [UsuarioController::class, 'login'])->name('login.post');
Route::get('/register', [UsuarioController::class, 'showRegister'])->name('register');
Route::post('/register', [UsuarioController::class, 'register'])->name('register.post');

// Rota para a tela de boas-vindas
Route::get('/boas-vindas', [UsuarioController::class, 'showBoasVindas'])->name('boas-vindas');

// Rotas para gerenciamento de sensores
Route::get('/sensores/adicionar', [SensorController::class, 'showAddForm'])->name('sensor.adicionar');
Route::post('/sensores', [SensorController::class, 'store'])->name('sensor.store');
Route::get('/sensores', [SensorController::class, 'index'])->name('sensor.listar'); // Atualize para corresponder ao nome da rota
Route::get('/sensores/{id}/configurar', [SensorController::class, 'configurar'])->name('sensor.configurar');

// Rotas para agendamentos
Route::get('/sensores/{id}/agendar', [SensorController::class, 'agendar'])->name('sensor.agendar');
Route::post('/agendamentos', [AgendamentoController::class, 'store'])->name('agendamento.store');

// Rota para atualizar a faixa de umidade de um sensor específico
Route::put('/sensores/{id}', [SensorController::class, 'update'])->name('sensor.atualizar');

// Rota para listar agendamentos de um sensor específico
Route::get('/sensor/{id}/agendamentos', [SensorController::class, 'listarAgendamentos'])->name('sensor.agendamentos');

// Rotas para agendamentos
Route::delete('/agendamentos/{id}', [AgendamentoController::class, 'destroy'])->name('agendamento.destroy');

// Excluir sensor
Route::delete('/sensores/{id}', [SensorController::class, 'destroy'])->name('sensor.excluir');

// Rotas para consultar a temperatura
Route::get('/consultar-temperatura', [ConsultarTemperaturaController::class, 'exibirFormulario'])->name('consultar-temperatura');
Route::post('/consultar-temperatura', [ConsultarTemperaturaController::class, 'consultarTemperatura']);
