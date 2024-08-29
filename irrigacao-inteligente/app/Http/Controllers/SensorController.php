<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;
use App\Models\Agendamento;

class SensorController extends Controller
{
    // Mostrar o formulário para adicionar um sensor
    public function showAddForm()
    {
        return view('formulario_adicionar_sensor');
    }

    // Salvar o novo sensor no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'umidade_minima' => 'required|numeric',
            'umidade_maxima' => 'required|numeric',
        ]);

        // Criar o novo sensor
        Sensor::create([
            'descricao' => $request->input('descricao'),
            'umidade_minima' => $request->input('umidade_minima'),
            'umidade_maxima' => $request->input('umidade_maxima'),
        ]);

        // Redirecionar para a página de listagem com uma mensagem de sucesso
        return redirect()->route('sensor.listar')->with('success', 'Sensor adicionado com sucesso.');
    }

    // Listar todos os sensores
    public function index()
    {
        $sensores = Sensor::all();
        return view('lista_sensores_cadastrados', compact('sensores'));
    }

    // Configurar um sensor específico
    public function configurar($id)
    {
        $sensor = Sensor::findOrFail($id);
        return view('configuracao_sensor_especifico', compact('sensor'));
    }

    // Criar um agendamento para um sensor específico
    public function agendar($id)
    {
        $sensor = Sensor::findOrFail($id);
        return view('formulario_criar_agendamento_sensor', compact('sensor'));
    }

    // Atualizar a faixa de umidade de um sensor específico
    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $request->validate([
            'descricao' => 'required|string|max:255',
            'umidade_minima' => 'required|numeric|min:0',
            'umidade_maxima' => 'required|numeric|min:0',
        ]);
    
        // Encontrar o sensor pelo ID
        $sensor = Sensor::findOrFail($id);
    
        // Atualizar os dados do sensor
        $sensor->descricao = $request->input('descricao');
        $sensor->umidade_minima = $request->input('umidade_minima');
        $sensor->umidade_maxima = $request->input('umidade_maxima');
        $sensor->save();
    
        // Redirecionar para a lista de sensores com uma mensagem de sucesso
        return redirect()->route('sensor.listar')->with('success', 'Sensor atualizado com sucesso.');
    }

    // Listar agendamentos de um sensor específico
    public function listarAgendamentos($id)
    {
        // Buscar o sensor pelo ID
        $sensor = Sensor::findOrFail($id);

        // Buscar agendamentos associados a esse sensor
        $agendamentos = $sensor->agendamentos; // Utilize o relacionamento definido no modelo

        // Retornar a view com os dados do sensor e os agendamentos
        return view('lista_agendamentos_sensor', compact('sensor', 'agendamentos'));
    }

    // Excluir um sensor e seus agendamentos associados
    public function destroy($id)
    {
        // Encontre o sensor pelo ID
        $sensor = Sensor::findOrFail($id);

        // Exclua todos os agendamentos associados
        $sensor->agendamentos()->delete();

        // Exclua o sensor
        $sensor->delete();

        // Redirecione de volta para a lista de sensores com uma mensagem de sucesso
        return redirect()->route('sensor.listar')->with('success', 'Sensor e seus agendamentos foram excluídos com sucesso.');
    }
}
