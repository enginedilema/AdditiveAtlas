<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Additive;
use Illuminate\Support\Str;

class SitemapController extends Controller
{
    public function __invoke()
    {
        $languages = config('languages.available');
        // Obtenir tots els additius
        $additives = Additive::groupBy('additive_e_code')->get();

        // Generar el sitemap XML
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset></urlset>');
        $xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach ($additives as $additive) {
            foreach ($languages as $lang) {
            $url = $xml->addChild('url');
            $url->addChild('loc', route('additives.show', [
                'lang' => $lang,
                'name' => $additive->translation(session('locale'))->additive_name ? Str::slug($additive->translation(session('locale'))->additive_name) : 'no',
                'code' => Str::slug($additive->additive_e_code) ? Str::slug($additive->additive_e_code) : 'no-code',
                'id' => $additive->id
            ]));
            $url->addChild('lastmod', $additive->updated_at->toAtomString());
            $url->addChild('changefreq', 'weekly');
            $url->addChild('priority', '0.8');
        }
    }

        // Retornar la resposta amb el sitemap XML
        return response($xml->asXML(), 200)
            ->header('Content-Type', 'application/xml');
    }
}
