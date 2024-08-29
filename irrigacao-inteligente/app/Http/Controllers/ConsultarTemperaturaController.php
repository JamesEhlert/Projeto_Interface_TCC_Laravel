<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsultarTemperaturaController extends Controller
{
    public function exibirFormulario()
    {
        return view('consultar_temperatura');
    }

    public function consultarTemperatura(Request $request)
    {
        $cidade = $request->input('cidade');
        $pais = $request->input('pais');

        if (!$cidade || !$pais) {
            return view('consultar_temperatura', ['erro' => 'Cidade e país são obrigatórios.']);
        }

        try {
            // Consultar coordenadas
            $response = Http::withHeaders([
                'X-Api-Key' => env('API_KEY')
            ])->get(env('API_URL'), [
                'city' => $cidade,
                'country' => $pais,
            ]);

            if (!$response->successful()) {
                return view('consultar_temperatura', ['erro' => 'Erro ao consultar a API de Geocoding: ' . $response->body()]);
            }

            $coordenadas = $response->json();

            if (isset($coordenadas[0])) {
                $latitude = $coordenadas[0]['latitude'];
                $longitude = $coordenadas[0]['longitude'];

                // Consultar temperatura
                $weatherApiUrl = "https://api.open-meteo.com/v1/forecast?latitude=$latitude&longitude=$longitude&current=temperature_2m";
                $weatherResponse = Http::get($weatherApiUrl);

                if (!$weatherResponse->successful()) {
                    return view('consultar_temperatura', ['erro' => 'Erro ao consultar a API de previsão do tempo: ' . $weatherResponse->body()]);
                }

                $weatherData = $weatherResponse->json();

                if (isset($weatherData['current'])) {
                    $temperaturaAtual = $weatherData['current']['temperature_2m'];

                    return view('consultar_temperatura', [
                        'cidade' => $cidade,
                        'temperaturaAtual' => $temperaturaAtual,
                    ]);
                } else {
                    return view('consultar_temperatura', [
                        'cidade' => $cidade,
                        'erro' => 'Dados de temperatura não disponíveis.'
                    ]);
                }
            }

            return view('consultar_temperatura', ['erro' => 'Coordenadas não encontradas.']);
        } catch (\Exception $e) {
            return view('consultar_temperatura', ['erro' => 'Erro ao consultar a API: ' . $e->getMessage()]);
        }
    }
}
