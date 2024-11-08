<?php

namespace Database\Seeders;

use App\Models\AdditiveDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;


class AdditiveDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $url = 'https://api.datalake.sante.service.ec.europa.eu/food-additives/food_additives_details?format=json&api-version=v1.0';

        while ($url) {
            $response = Http::get($url);

            if ($response->failed()) {
                $this->command->error("Failed to fetch data from the API.");
                return;
            }

            $data = $response->json();

            // Procesar cada aditivo y guardarlo en la base de datos
            foreach ($data['value'] as $additiveData) {
                AdditiveDetail::Create(
                    [   'policy_item_id' => $additiveData['policy_item_id'],
                        'policy_item_code' => $additiveData['policy_item_code'],
                        'additive_e_code' => $additiveData['additive_e_code'],
                        'additive_inss_code' => $additiveData['additive_inss_code'],
                        'additive_note' => $additiveData['additive_note'],
                        'additive_name' => $additiveData['additive_name'],
                        'additive_is_a_group' => $additiveData['additive_is_a_group'],
                        'fip_url' => $additiveData['fip_url'],
                        'group_members' => $additiveData['group_members'],
                        'member_of_groups' => $additiveData['member_of_groups'],
                        'additive_message' => $additiveData['additive_message'],
                        'additive_synonyms' => $additiveData['additive_synonyms'],
                        'display_order' => $additiveData['display_order'],
                        'food_category_level' => $additiveData['food_category_level'],
                        'food_category' => $additiveData['food_category'],
                        'food_category_desc' => $additiveData['food_category_desc'],
                        'restriction_type' => $additiveData['restriction_type'],
                        'restriction_value' => $additiveData['restriction_value'],
                        'restriction_unit' => $additiveData['restriction_unit'],
                        'restriction_comment' => $additiveData['restriction_comment'],
                        'restriction_note' => $additiveData['restriction_note'],
                        'legislation_reference' => $additiveData['legislation_reference'],
                        'legislation_short' => $additiveData['legislation_short'],
                        'legislation_oj_ref' => $additiveData['legislation_oj_ref'],
                        'legislation_pub_date' => $additiveData['legislation_pub_date'],
                        'legislation_entry_into_force_date' => $additiveData['legislation_entry_into_force_date'],
                        'legislation_application_date' => $additiveData['legislation_application_date'],
                        'legislation_url' => $additiveData['legislation_url']
                    ]
                );
            }

            // Actualiza la URL para la siguiente página si existe
            $url = $data['nextLink'] ?? null;
            $this->command->info("Processed a page of additives.");
        }
    }
}
