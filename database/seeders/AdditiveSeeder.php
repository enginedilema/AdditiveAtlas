<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Additive;

class AdditiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Ruta del archivo JSON
        $jsonPath = database_path('seeders/food_additives_list.json');

        // Leer el archivo JSON
        $jsonData = File::get($jsonPath);
        $additives = json_decode($jsonData, true);

        // Insertar cada aditivo en la base de datos
        foreach ($additives as $additive) {
            Additive::create([
                'policy_item_id' => $additive['policy_item_id'],
                'policy_item_code' => $additive['policy_item_code'],
                'additive_e_code' => $additive['additive_e_code'],
                'additive_inss_code' => $additive['additive_inss_code'],
                'additive_note' => $additive['additive_note'],
                'additive_name' => $additive['additive_name'],
                'additive_is_a_group' => $additive['additive_is_a_group'] === 'YES',
                'fip_url' => $additive['fip_url'],
                'group_members' => $additive['group_members'],
                'member_of_groups' => $additive['member_of_groups'],
                'additive_message' => $additive['additive_message'],
                'additive_synonyms' => $additive['additive_synonyms'],
                'display_order' => $additive['display_order'],
                'food_category_level' => $additive['food_category_level'],
                'food_category' => $additive['food_category'],
                'food_category_desc' => $additive['food_category_desc'],
                'restriction_type' => $additive['restriction_type'],
                'restriction_value' => $additive['restriction_value'],
                'restriction_unit' => $additive['restriction_unit'],
                'restriction_comment' => $additive['restriction_comment'],
                'restriction_note' => $additive['restriction_note'],
                'legislation_reference' => $additive['legislation_reference'],
                'legislation_short' => $additive['legislation_short'],
                'legislation_oj_ref' => $additive['legislation_oj_ref'],
                'legislation_pub_date' => $additive['legislation_pub_date'],
                'legislation_entry_into_force_date' => $additive['legislation_entry_into_force_date'],
                'legislation_application_date' => $additive['legislation_application_date'],
                'legislation_url' => $additive['legislation_url'],
                'hash_column' => $additive['hash_column'],
            ]);
        }
    }
}
