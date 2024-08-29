<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;

class AgendamentoController extends Controller
{
    public function store(Request $request)
    {
        // Validar os dados do formulário
        $request->validate([
            'sensor_id' => 'required|exists:sensors,id',
            'horario_inicio' => 'required|date_format:H:i',
            'duracao' => 'required|integer|min:1',
            'dia_da_semana' => 'required|array',
            'dia_da_semana.*' => 'string',
        ]);

        // Converter a duração de minutos para segundos
        $duracaoEmSegundos = $request->input('duracao') * 60;

        // Criar um novo agendamento
        Agendamento::create([
            'sensor_id' => $request->input('sensor_id'),
            'horario_inicio' => $request->input('horario_inicio'),
            'duracao' => gmdate('H:i:s', $duracaoEmSegundos), // Formato 'H:i:s' para o banco de dados
            'dia_semana' => json_encode($request->input('dia_da_semana')), // Armazenar os dias da semana como JSON
        ]);

        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('sensor.listar')->with('success', 'Agendamento criado com sucesso.');
    }

        // Excluir um agendamento específico
        public function destroy($id)
        {
            // Encontrar o agendamento pelo ID
            $agendamento = Agendamento::findOrFail($id);
    
            // Excluir o agendamento
            $agendamento->delete();
    
            // Redirecionar de volta para a lista de agendamentos com uma mensagem de sucesso
            return redirect()->route('sensor.agendamentos', $agendamento->sensor_id)->with('success', 'Agendamento excluído com sucesso.');
        }

    
}
