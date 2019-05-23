@component('headSection')
    <strong>Whoops!</strong> Something went wrong!
@endcomponent

<body>
<header class="header front-page container-fluid">

    @component('headerSection')
        <strong>Whoops!</strong> Something went wrong!
    @endcomponent

    <div id="search-block" class="container search-block" data-depth="0.5">
        @component('searchBlock',['tourismId' => $tourism, 'categoryId' => $category, 'provinceId' => $province, 'cityId' => $city, 'text' => $text])
            <strong>Whoops!</strong> Something went wrong!
        @endcomponent
    </div>

</header>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div id="front-boxes" class="row">
                    @foreach ($data['services'] as $row)
                        <div class="box {{ $row['name'] }} col-xs-12 col-sm-6 col-lg-4">
                            @if($row['id'] <= 0)
                                <a class="link" href="#">
                                    <img class="image" src="{{ url('/') }}/images/{{ $row['icon'] }}" style="background-color: {{ $row['color'] }}; border-color: {{ $row['color'] }}">
                                    <h2 class="title">{{ $row['title'] }}</h2>
                                </a>
                            @else
                                <a class="link" href="/result?tourism={{ $row['id'] }}">
                                    <img class="image" src="{{ url('/') }}/images/{{ $row['icon'] }}" style="background-color: {{ $row['color'] }}; border-color: {{ $row['color'] }}">
                                    <h2 class="title">{{ $row['title'] }}</h2>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@component('footerSection', ['baseData' => $baseData ])
    <strong>Whoops!</strong> Something went wrong!
@endcomponent

</body>
</html>
