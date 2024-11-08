<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Additive;
use Illuminate\Support\Facades\Http;

class AdditiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // URL base de la API
          $url = 'https://api.datalake.sante.service.ec.europa.eu/food-additives/food_additives_list?format=json&api-version=v1.0';

          do {
              // Realizar la solicitud HTTP
              $response = Http::get($url);
  
              if ($response->successful()) {
                  $data = $response->json();
                  $additives = $data['value']; // Obtener los aditivos
  
                  // Guardar cada aditivo en la base de datos
                  foreach ($additives as $item) {
                      Additive::updateOrCreate(
                          ['policy_item_id' => $item['policy_item_id']], // Único por `policy_item_id`
                          [
                              'policy_item_code' => $item['policy_item_code'],
                              'additive_e_code' => $item['additive_e_code'],
                              'additive_inss_code' => $item['additive_inss_code'],
                              'additive_name' => $item['additive_name'],
                              'additive_type' => $item['additive_type'],
                              'fip_url' => $item['fip_url'],
                          ]
                      );
                  }
  
                  // Verificar si hay un enlace de "siguiente" para continuar
                  $url = $data['nextLink'] ?? null;
  
              } else {
                  $this->command->error('Error al obtener datos de la API');
                  $url = null; // Detener el bucle si falla
              }
  
          } while ($url); // Continuar hasta que no haya más `nextLink`
    }
}
