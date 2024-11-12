<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Additive;

class GeminiController extends Controller
{
    public function generateContent(Request $request)
    {
        $apiKey = env('API_GOOGLE_GEMINI');
        $additive = Additive::whereNull('description')->inRandomOrder()->first();        $prompt = "Act as a copywriter specialist to create a structured article in JSON format with all EFSA knowledge. I want the article to be about $additive->additive_name $additive->additive_e_code and each section to have a title and quality content. The output format will be a JSON with this format:
{'id': $additive->id,
'description' : '<h2></h2><p></p>Lorem ipsum in HTML format',
'option_process' : '<h2></h2><p></p>Lorem ipsum in HTML format',
'food_uses' : '<h2></h2><p></p>Lorem ipsum in HTML format',
'industrial_uses' : '<h2></h2><p></p>Lorem ipsum in HTML format',
'beneficial_properties' : '<h2></h2><p></p>Lorem ipsum in HTML format',
'side_effects' : '<h2></h2><p></p>Lorem ipsum in HTML format'}";

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}";

        // Configura los datos de la solicitud
        $data = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $prompt]
                    ]
                ]
            ]
        ];

        // Realiza la solicitud POST a la API
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, $data);

        // Retorna la respuesta de la API
        if ($response->successful()) {

 $responseData = $response->json();
            $content = $responseData['candidates'][0]['content']['parts'][0]['text'];

            // Extrae el contenido JSON del bloque de código
            preg_match('/```json(.*)```/s', $content, $matches);
            $jsonData = isset($matches[1]) ? trim($matches[1]) : null;

            if ($jsonData) {
                // Decodifica el JSON del contenido
                $details = json_decode($jsonData, true);

                // Encuentra el registro de AdditiveDetail y actualiza sus campos
                $additive->description = $details['description'] ?? null;
                $additive->option_process = $details['option_process'] ?? null;
                $additive->food_uses = $details['food_uses'] ?? null;
                $additive->industrial_uses = $details['industrial_uses'] ?? null;
                $additive->beneficial_properties = $details['beneficial_properties'] ?? null;
                $additive->side_effects = $details['side_effects'] ?? null;

                // Guarda los cambios en la base de datos
                $additive->save();

                return response()->json(['message' => var_dump($additive)]);        } else {
            return response()->json(['error' => 'Failed to fetch data from Google Gemini API'], $response->status());
        }
    }
}
}