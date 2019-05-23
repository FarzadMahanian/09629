@component('headSection')
    <strong>Whoops!</strong> Something went wrong!
@endcomponent
<body>
<header class="header container-fluid">

    @component('headerSection')
        <strong>Whoops!</strong> Something went wrong!
    @endcomponent

    <div id="search-block" class="container search-block" data-depth="0.5">
        @component('searchBlock',['tourismId' => $tourism, 'categoryId' => $category, 'provinceId' => $province, 'cityId' => $city, 'text' => $text])
            <strong>Whoops!</strong> Something went wrong!
        @endcomponent
    </div>

    <div class="extra-links">
        <div class="container">
            <div class="row">
                @foreach ($data['services'] as $row)
                    <div class="link {{ $row['name'] }} col-xs-12 col-md-6 col-lg-2">
                        <a class="btn" href="/result?tourism={{ $row['id'] }}"
                           style="background-color: {{ $row['color'] }}; background-image: url('{{ url('/') }}/images/{{ $row['icon'] }}')">{{ $row['title'] }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</header>

<div class="content content-text search-result-page">
    <div class="container-fluid">
        @if($tourism <= 0 )
            <h2 class="page-title">نتایج جستجو</h2>
        @else
            <h2 class="page-title">{{ $data['tourism'][$tourism-1]['title'] }}</h2>
        @endif

        <div class="search-results">


            @if(isset($data['searchResult'] -> AllDetails))
                <!-- navigation holder -->
                <div class="holder above">
                </div>

                <ul id="itemContainer" style="padding: 0">
                @foreach ($data['searchResult'] -> AllDetails as $row)
                    <li class="row">
                        <div class="container">
                            @if($tourism > 0 )
                                <img class="cat-icon"
                                     src="{{ url('/') }}/images/catIcons/catIcon-{{ $data['services'][$tourism-1]['id'] }}-{{ $row -> CatID }}.svg">
                                <div style="margin-right: 130px">
                                    <div class="category">{{ $row -> CatName }}</div>
                                    <div class="title">{{ $row -> Name }} - {{ $row -> CityName }}</div>
                                    <div class="body">
                                        <p>{{ $row->Address }}</p>
                                        <p>{{ is_object($row->Description) ? "..." : $row->Description }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="category">{{ $row -> CatName }}</div>
                                <div class="title">{{ $row -> Name }} - {{ $row -> CityName }}</div>
                                <div class="body">
                                    <p>{{ $row->Address }}</p>
                                    <p>{{ is_object($row->Description) ? "..." : $row->Description }}</p>
                                </div>
                            @endif
                        </div>
                    </li>
                @endforeach
                </ul>

                <!-- navigation holder -->
                <div class="holder below">
                </div>
            @else
                <div class="container">
                    <div class="no-result" style="text-align: center">
                        {{--<img src="{{ url('/') }}/images/noResult.svg">--}}
                        <h2>متأسفانه نتیجه ای یافت نشد!</h2>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@component('footerSection', ['baseData' => $baseData ])
    <strong>Whoops!</strong> Something went wrong!
@endcomponent

</body>
</html>
