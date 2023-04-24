<?php

namespace App\Http\Controllers;

use App\Models\Criminality;
use App\Models\Municipality;
use App\Models\RegionIncome;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    // Fetch infobox from the Wikipedia page
    public function getRegionFromWiki($regionID): \Illuminate\Http\JsonResponse
    {
        $path = 'athens.paths.'.$regionID;
        $region = Config::get($path);
        $name = $region;

        if (!str_contains($region, '-')) {
            if($region == 'Alimos') {
                $region = 'Alimos';
            } else if($region == 'Irakleio') {
                $region .= ',_Attica';
            } else {
                $region .= ',_Greece';
            }

        }

        // Fetch the Wikipedia page
        $response = Http::get('https://en.wikipedia.org/wiki/' . $region);
        $html = $response->body();

        // Create a new DOMDocument object
        $dom = new \DOMDocument();

        // Suppress warnings caused by HTML5 tags
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);

        // Create a new XPath object
        $xpath = new \DOMXPath($dom);

        // Extract the infobox data
        $data = array();
        $rows = $xpath->query('//table[contains(@class,"infobox")]/tbody/tr');
        foreach ($rows as $row) {
            $header_node = $xpath->query('th', $row)->item(0);
            $value_node = $xpath->query('td', $row)->item(0);

            // Check if the header and value nodes are not null
            if ($header_node && $value_node) {
                $header = $header_node->textContent;
                $value = $value_node->textContent;

                $data[$header] = $value;
            }
        }

        $final = collect();
        foreach ($data as $key => $value){
            $key = str_replace(' ', '', $key); // Replaces all spaces with hyphens.
            $key = preg_replace('/[^A-Za-z0-9\-]/', '', $key); // Removes special chars.
            if($key == 'Municipality' || $key == 'Capitalcityandmunicipality'){
                $key = 'Population';
            }
            $final[$key] = $value;
        }
        $final['Name'] = $name;
        $final = $final->only(['Name', 'Regionalunit', 'Population', 'Mayor']);

        return response()->json($final);
    }

    public static function getColor($path)
    {
        $municipalityName = Config::get('athens.paths.' . $path);
        $municipality = Municipality::query()->where('name', '=', $municipalityName)->first();
        $index = $municipality->sustainability;

        if ($index > 0.00 && $index <= 1.00) {
            $color = Config::get('pallete')[0];
        } elseif ($index > 1.00 && $index <= 2.00) {
            $color = Config::get('pallete')[1];
        } elseif ($index > 2.00 && $index <= 2.75) {
            $color = Config::get('pallete')[2];
        } elseif ($index > 2.75 && $index <= 3.50) {
            $color = Config::get('pallete')[3];
        } elseif ($index > 3.50 && $index <= 4.00) {
            $color = Config::get('pallete')[4];
        } elseif ($index > 4.00 && $index <= 4.50) {
            $color = Config::get('pallete')[5];
        } elseif ($index > 4.50 && $index <= 4.75) {
            $color = Config::get('pallete')[6];
        } elseif ($index > 4.75 && $index <= 5.00) {
            $color = Config::get('pallete')[7];
        } else {
            $color = '#000000'; // some error
        }

        return $color;
    }

    public function getSustainability($regionID)
    {
        $path = 'athens.paths.'.$regionID;
        $region = Config::get($path);
        $name = $region;
        $municipality = Municipality::query()->where('name', '=', $name)->first();

        return $municipality->sustainability;
    }
}
