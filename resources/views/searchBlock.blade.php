<form id="search-form" method="GET" action="result">
    <div class="row">
        <div class="cell col-xs-12 col-sm-6 col-lg-2">
            <select name="tourism" class="custom-select" id="selectTourism" required search-value="{{ $tourismId }}">
                <option value="0" selected>اماکن</option>
                {{--@foreach ($tourism as $row)--}}
                    {{--<option class="{{ $row['name'] }}" value="{{ $row['value'] }}">{{ $row['title'] }}</option>--}}
                {{--@endforeach--}}
            </select>
        </div>

        <div class="cell col-xs-12 col-sm-6 col-lg-2">
            <select name="cat" class="custom-select" id="selectCategory" disabled="disabled" required search-value="{{ $categoryId }}">
                <option value="0" selected>دسته بندی</option>
            </select>
        </div>

        <div class="cell col-xs-12 col-sm-6 col-lg-2">
            <select name="province" class="custom-select" id="selectProvince" required search-value="{{ $provinceId }}">
                <option value="0" selected>استان</option>
            </select>
        </div>

        <div class="cell col-xs-12 col-sm-6 col-lg-2">
            <select name="city" class="custom-select" id="selectCity" disabled="disabled" required search-value="{{ $cityId }}">
                <option value="0" selected>شهر</option>
            </select>
        </div>

        <div class="cell col-xs-12 col-lg-3">
            <input id="searchValue" type="text" name="text" class="form-control" maxlength="300" placeholder="کلمه مورد نظر را جستجو کنید ..." search-value="{{ $text }}">
        </div>

        <div class="cell col-xs-12 col-lg-1">
            <div class="search-btn">
                <button class="btn btn-primary" type="submit">جستجو</button>
            </div>
        </div>
    </div>
</form>