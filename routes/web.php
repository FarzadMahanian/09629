<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

function createData($searchResult)
{
    $data = [
        'tourism' => [
            [
                'name' => 'eghamati',
                'title' => 'مراکز اقامتی',
                'value' => '1'
            ],
            [
                'name' => 'tourism',
                'title' => 'مناطق گردشگری',
                'value' => '2'
            ],

            [
                'name' => 'payane',
                'title' => 'پایانه های مسافرتی',
                'value' => '3'
            ],
            [
                'name' => 'refahi',
                'title' => 'خدمات رفاهی',
                'value' => '4'
            ],
            [
                'name' => 'darmani',
                'title' => 'مراکز درمانی',
                'value' => '5'
            ]
        ],
        'services' => [
            [
                'name' => 'eghamati',
                'title' => 'مراکز اقامتی',
                'color' => '#9c27b0',
                'icon' => 'eghamati.svg',
                'id' => '1'
            ],
            [
                'name' => 'gardeshgari',
                'title' => 'مناطق گردشگری',
                'color' => '#673ab7',
                'icon' => 'gardeshgari.svg',
                'id' => '2'
            ],
            [
                'name' => 'payane',
                'title' => 'پایانه های مسافرتی',
                'color' => '#e91e63',
                'icon' => 'payane.svg',
                'id' => '3'
            ],
            [
                'name' => 'refahi',
                'title' => 'خدمات رفاهی',
                'color' => '#2196f3',
                'icon' => 'refahi.svg',
                'id' => '4'
            ],
            [
                'name' => 'darmani',
                'title' => 'مراکز درمانی',
                'color' => '#03a9f4',
                'icon' => 'darmani.svg',
                'id' => '5'
            ],
            [
                'name' => 'search',
                'title' => 'جستجوی کلی',
                'color' => '#00bcd4',
                'icon' => 'search.svg',
                'id' => '-1'
            ]
        ],
        'searchResult' => $searchResult
    ];
    return $data;
}

function get_request($url, $query)
{
    $client = new Client();
    $base_url = 'http://09629.ir/webservice/webservice1.asmx/';
    $res = $client->request('GET', $base_url . $url, [
        'query' => $query
    ]);
    $xml_str = $res->getBody();
    $xml = simplexml_load_string($xml_str);
    $json = json_encode($xml);
    return json_decode($json);
}

function json_response($input)
{
    return response(json_encode($input))
        ->header('Content-Type', 'application/json')
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'PUT, DELETE, POST, GET, OPTIONS');
}

function get_base_data()
{
    $tourismList = [
        [
            'Type' => 'eghamati',
            'Name' => 'مراکز اقامتی',
            'Id' => '1'
        ],
        [
            'Type' => 'tourism',
            'Name' => 'مناطق گردشگری',
            'Id' => '2'
        ],

        [
            'Type' => 'payane',
            'Name' => 'پایانه های مسافرتی',
            'Id' => '3'
        ],
        [
            'Type' => 'refahi',
            'Name' => 'خدمات رفاهی',
            'Id' => '4'
        ],
        [
            'Type' => 'darmani',
            'Name' => 'مراکز درمانی',
            'Id' => '5'
        ]
    ];
    $categoryList = [];
    $provinceList = [];
    $cityList = [];
    foreach ($tourismList as $tourism) {
        $categories = get_request('GetCategory', ['tourism' => $tourism['Id']]);
        $categoryList[$tourism['Id']] = $categories->Details;
    }
    $provinceList = get_request('GetProvince', [])->Details;
    foreach ($provinceList as $province) {
        $cities = get_request('GetCity', ['province' => $province->Id]);
        $cityList[$province->Id] = $cities->Details;
    }
    return [
        "TourismList" => $tourismList,
        "CategoryList" => $categoryList,
        "ProvinceList" => $provinceList,
        "CityList" => $cityList
    ];
}

function get_base_data_cached()
{
    if (Cache::has('BASE_DATA')) {
        return json_decode(Cache::get('BASE_DATA'));
    } else {
        $baseData = get_base_data();
        Cache::put('BASE_DATA', json_encode($baseData), 3600);
        return $baseData;
    }
}

Route::get('/', function () {
    return view('welcome')->with([
        'data' => createData([]),
        'tourism' => NULL,
        'city' => NULL,
        'category' => NULL,
        'text' => NULL,
        'province' => NULL,
        'baseData' => get_base_data_cached()
    ]);
});


Route::get('/basedata', function (Request $request) {
    return json_response(get_base_data_cached());
});

function get_tourism_data_cached($tourism)
{
    switch ($tourism) {
        case '1':
            return get_request('GetResidential', []);
        case '2':
            return get_request('GetTourismArea', []);
        case '3':
            return get_request('GetTerminal', []);
        case '4':
            return get_request('GetWelfare', []);
        case '5':
            return get_request('GetMedical', []);
        default:
            return [];
    }
}


Route::get('/result', function (Request $request) {
    $text = $request->input('text');
    $category = $request->input('cat');
    $tourism = $request->input('tourism');
    $city = $request->input('city');
    $province = $request->input('province');

    $data = [];
    if (isset($tourism) && isset($category) && isset($text) && isset($city) && isset($province)) {
        $result = get_request('GetSearch', [
            'tourism' => $tourism,
            'cat' => $category,
            'city' => $city,
            'txtSearch' => $text,
            'province' => $province
        ]);
        $data = createData($result);
    } elseif (empty($tourism) && isset($text)) {
        $result = get_request('GetAllSearch', [
            'txtSearch' => $text
        ]);
        $data = createData($result);
    } elseif (isset($tourism)) {
        $data = createData(get_tourism_data_cached($tourism));
    }

    return view('result')->with([
        'data' => $data,
        'tourism' => $tourism,
        'city' => $city,
        'category' => $category,
        'text' => $text,
        'province' => $province,
        'baseData' => get_base_data_cached()
    ]);
});







