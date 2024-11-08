<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Additive;
use Illuminate\Support\Str;

class SitemapController extends Controller
{
    public function __invoke()
    {
        // Obtenir tots els additius
        $additives = Additive::groupBy('additive_e_code')->get();

        // Generar el sitemap XML
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset></urlset>');
        $xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach ($additives as $additive) {
            $url = $xml->addChild('url');
            $url->addChild('loc', route('additives.show', [
                'name' => Str::slug($additive->additive_name) ? Str::slug($additive->additive_name) : 'no-name',
                'code' => Str::slug($additive->additive_e_code) ? Str::slug($additive->additive_e_code) : 'no-code',
                'id' => $additive->id
            ]));
            $url->addChild('lastmod', $additive->updated_at->toAtomString());
            $url->addChild('changefreq', 'weekly');
            $url->addChild('priority', '0.8');
        }

        // Retornar la resposta amb el sitemap XML
        return response($xml->asXML(), 200)
            ->header('Content-Type', 'application/xml');
    }
}
