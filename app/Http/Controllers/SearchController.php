<?php

namespace App\Http\Controllers;
use App\Models\Additive;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $query = $request->input('query'); // Obtener el texto de búsqueda desde el request

        // Realizar la consulta en varios campos
        $additives = Additive::groupBy('additive_e_code')->where('additive_name', 'like', '%' . $query . '%')
            ->orWhere('additive_message', 'like', '%' . $query . '%')
            ->orWhere('food_category_desc', 'like', '%' . $query . '%')
            ->get();

        // Retornar la vista con los resultados
        return view('search', compact('additives', 'query'));
    }
}
