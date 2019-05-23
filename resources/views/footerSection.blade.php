<div id="base-data" style="display: none">
    @php
        echo json_encode($baseData);
    @endphp
</div>

<footer class="footer d-none d-sm-block">
    <div class="container">
        <a class="item" href="http://www.rai.ir">
            <img class="icon" src="{{ url('/') }}/images/rail.png">
            <h2 class="title">راه آهن</h2>
        </a>

        <a class="item" href="http://www.rahvar120.ir">
            <img class="icon" src="{{ url('/') }}/images/Layer 6.png">
            <h2 class="title">راهور ناجا</h2>
        </a>

        <a class="item" href="http://www.141.ir">
            <img class="icon" src="{{ url('/') }}/images/rmto-site-icon.png">
            <h2 class="title">سازمان راهداری</h2>
        </a>

        <a class="item" href="http://stsi.ir/">
            <img class="icon" src="{{ url('/') }}/images/Layer 4.png">
            <h2 class="title">خدمات سفر</h2>
        </a>

        <a class="item" href="http://www.airport.ir">
            <img class="icon" src="{{ url('/') }}/images/Iac_(1).png">
            <h2 class="title">فرودگاه های کشور</h2>
        </a>

        <a class="item" href="http://www.irimo.ir/far">
            <img class="icon" src="{{ url('/') }}/images/Layer 5.png">
            <h2 class="title">آب و هوا</h2>
        </a>

        <a class="item" href="http://www.behrah.com">
            <img class="icon" src="{{ url('/') }}/images/behrah-header.png">
            <h2 class="title">سامانه بهراه</h2>
        </a>

        <a class="item" href="http://map.google.com">
            <img class="icon" src="{{ url('/') }}/images/google-maps.png">
            <h2 class="title">نقشه گوگل</h2>
        </a>

        <a class="item" href="../../../webforms/fa/link/link.aspx">
            <img class="icon" src="{{ url('/') }}/images/chains.png">
            <h2 class="title">پیوندها</h2>
        </a>
    </div>
</footer>


<div id="go-to-top">
</div>

<script type="text/javascript" src="modules/jPages-master/js/jPages.js"></script>


<script type="text/javascript">

    function getTourism(data, searchValue) {
        $('#selectTourism').empty();
        if (searchValue && searchValue > 0) {
            $('#selectTourism').append('<option value="0">اماکن</option>');
            $.each(data, function (index, item) {
                if (searchValue == item.Id) {
                    $('#selectTourism').append('<option value="' + item.Id + '" selected>' + item.Name + '</option>');
                } else {
                    $('#selectTourism').append('<option value="' + item.Id + '">' + item.Name + '</option>');
                }
            });
        } else {
            $('#selectTourism').append('<option value="0" selected>اماکن</option>');
            $.each(data, function (index, item) {
                $('#selectTourism').append('<option value="' + item.Id + '">' + item.Name + '</option>');
            });
        }
    }

    function getCategory(tourismId, data, searchValue) {
        if (searchValue && searchValue > 0) {
            $('#selectCategory').attr('disabled', 'disabled');
            $('#selectCategory').empty();
            $('#selectCategory').append('<option value="0">دسته بندی</option>');
            $('#selectCategory').removeAttr('disabled');
            $.each(data, function(index, item) {
                if (searchValue == item.Id) {
                    $('#selectCategory').append('<option value="' + item.Id + '" selected>' + item.Name + '</option>');
                } else {
                    $('#selectCategory').append('<option value="' + item.Id + '">' + item.Name + '</option>');
                }
            });
        } else {
            $('#selectCategory').attr('disabled', 'disabled');
            $('#selectCategory').empty();
            $('#selectCategory').append('<option value="0" selected>دسته بندی</option>');
            $('#selectCategory').removeAttr('disabled');
            $.each(data, function(index, item) {
                $('#selectCategory').append('<option value="' + item.Id + '">' + item.Name + '</option>');
            });
        }
//        $.ajax({
//            url: 'http://127.0.0.1:8000/api/09629/category?tourism=' + tourismId,
//            method: 'GET',
//            contentType: 'application/json',
//            success: function(result) {
//                $('#selectCategory').empty();
//                $('#selectCategory').append('<option value="0" selected>دسته بندی</option>');
//                $('#selectCategory').removeAttr('disabled');
//                $.each(result.Details, function(index, item) {
//                    $('#selectCategory').append('<option value="' + item.Id + '">' + item.Name + '</option>');
//                });
//            },
//            error: function(errorLog) {
//                console.log(errorLog);
//            }
//        });
    }

    function getProvince(data, searchValue) {
        $('#selectProvince').empty();
        if (searchValue && searchValue > 0) {
            $('#selectProvince').append('<option value="0">استان</option>');
            $.each(data, function (index, item) {
                if (searchValue == item.Id) {
                    $('#selectProvince').append('<option value="' + item.Id + '" selected>' + item.Name + '</option>');
                } else {
                    $('#selectProvince').append('<option value="' + item.Id + '">' + item.Name + '</option>');
                }
            });
        } else {
            $('#selectProvince').append('<option value="0" selected>استان</option>');
            $.each(data, function (index, item) {
                $('#selectProvince').append('<option value="' + item.Id + '">' + item.Name + '</option>');
            });
        }

//        $.ajax({
//            url: 'http://127.0.0.1:8000/api/09629/province',
//            method: 'GET',
//            contentType: 'application/json',
//            success: function(result) {
//                $('#selectProvince').empty();
//                $('#selectProvince').append('<option value="0" selected>استان</option>');
//                $.each(result.Details, function(index, item) {
//                    $('#selectProvince').append('<option value="' + item.Id + '">' + item.Name + '</option>');
//                });
//            },
//            error: function(errorLog) {
//                console.log(errorLog);
//            }
//        });
    }

    function getCity(provinceId, data, searchValue) {
        if (searchValue && searchValue > 0) {
            $('#selectCity').attr('disabled', 'disabled');
            $('#selectCity').empty();
            $('#selectCity').append('<option value="0">شهر</option>');
            $('#selectCity').removeAttr('disabled');
            $.each(data, function(index, item) {
                if (searchValue == item.Id) {
                    $('#selectCity').append('<option value="' + item.Id + '" selected>' + item.Name + '</option>');
                } else {
                    $('#selectCity').append('<option value="' + item.Id + '">' + item.Name + '</option>');
                }
            });
        } else {
            $('#selectCity').attr('disabled', 'disabled');
            $('#selectCity').empty();
            $('#selectCity').append('<option value="0" selected>شهر</option>');
            $('#selectCity').removeAttr('disabled');
            $.each(data, function(index, item) {
                $('#selectCity').append('<option value="' + item.Id + '">' + item.Name + '</option>');
            });
        }

//        $.ajax({
//            url: 'http://127.0.0.1:8000/api/09629/city?province=' + provinceId,
//            method: 'GET',
//            contentType: 'application/json',
//            success: function(result) {
//                $('#selectCity').empty();
//                $('#selectCity').append('<option value="0" selected>شهر</option>');
//                $('#selectCity').removeAttr('disabled');
//                $.each(result.Details, function(index, item) {
//                    $('#selectCity').append('<option value="' + item.Id + '">' + item.Name + '</option>');
//                });
//            },
//            error: function(errorLog) {
//                console.log(errorLog);
//            }
//        });
    }

    $(document).ready(function() {

        var baseData = JSON.parse($('#base-data').html());
//        console.log(baseData);

        $('#search-block').css('margin-top', -$('#search-block').innerHeight());
        getTourism(baseData.TourismList, $('#search-form').find('#selectTourism').attr('search-value'));
        getProvince(baseData.ProvinceList, $('#search-form').find('#selectProvince').attr('search-value'));
        if ($('#search-form').find('#selectCategory').attr('search-value')) {
            getCategory($('#search-form').find('#selectTourism').attr('search-value'), baseData.CategoryList[$('#search-form').find('#selectTourism').attr('search-value')], $('#search-form').find('#selectCategory').attr('search-value'));
        }
        if ($('#search-form').find('#selectCity').attr('search-value')) {
            getCity($('#search-form').find('#selectProvince').attr('search-value'), baseData.CityList[$('#search-form').find('#selectProvince').attr('search-value')], $('#search-form').find('#selectCity').attr('search-value'));
        }
        if ($('#search-form').find('#searchValue').attr('search-value')) {
            ($('#search-form').find('#searchValue').val($('#search-form').find('#searchValue').attr('search-value')));
        }

        $('#searchValue').keyup(function() {
            if ($('#searchValue').val()) {
                $('#searchValue').removeClass('is-invalid');
            } else {
                $('#searchValue').addClass('is-invalid');
            }
        });

        $('#selectTourism').on('change', function() {
            if(this.value == 0) {
                $('#selectTourism').addClass('is-invalid');
                $('#selectCategory').empty();
                $('#selectCategory').append('<option value="0" selected>دسته بندی</option>');
                $('#selectCategory').attr('disabled', 'disabled');
                $('#selectCategory').removeClass('is-invalid');
            } else {
                $('#selectTourism').removeClass('is-invalid');
                getCategory(this.value, baseData.CategoryList[this.value], null);
            }
        });

        $('#selectCategory').on('change', function() {
            if(this.value == 0) {
                $('#selectCategory').addClass('is-invalid');
            } else {
                $('#selectCategory').removeClass('is-invalid');
            }
        });

        $('#selectProvince').on('change', function() {
            if(this.value == 0) {
                $('#selectProvince').addClass('is-invalid');
                $('#selectCity').empty();
                $('#selectCity').append('<option value="0" selected>شهر</option>');
                $('#selectCity').attr('disabled', 'disabled');
                $('#selectCity').removeClass('is-invalid');
            } else {
                $('#selectProvince').removeClass('is-invalid');
                getCity(this.value, baseData.CityList[this.value], null);
            }
        });

        $('#selectCity').on('change', function() {
            if(this.value == 0) {
                $('#selectCity').addClass('is-invalid');
            } else {
                $('#selectCity').removeClass('is-invalid');
            }
        });


        $('#search-form').submit(function () {

            if ($('#selectTourism').val() > 0 || $('#selectCategory').val() > 0 || $('#selectProvince').val() > 0 || $('#selectCity').val() > 0) {
                if ($('#selectTourism').val() == 0) {
                    $('#selectTourism').addClass('is-invalid');
                    return false;
                } else if ($('#selectCategory').val() == 0) {
                    $('#selectCategory').addClass('is-invalid');
                    return false;
                } else if ($('#selectProvince').val() == 0) {
                    $('#selectProvince').addClass('is-invalid');
                    return false;
                } else if ($('#selectCity').val() == 0) {
                    $('#selectCity').addClass('is-invalid');
                    return false;
                } else if ($('#searchValue').val().length == 0) {
                    $('#searchValue').addClass('is-invalid');
                    return false;
                }
            } else if ($('#searchValue').val().length > 0) {

            } else {
                if ($('#selectTourism').val() == 0) {
                    $('#selectTourism').addClass('is-invalid');
                    return false;
                } else if ($('#selectCategory').val() == 0) {
                    $('#selectCategory').addClass('is-invalid');
                    return false;
                } else if ($('#selectProvince').val() == 0) {
                    $('#selectProvince').addClass('is-invalid');
                    return false;
                } else if ($('#selectCity').val() == 0) {
                    $('#selectCity').addClass('is-invalid');
                    return false;
                } else if ($('#searchValue').val().length == 0) {
                    $('#searchValue').addClass('is-invalid');
                    return false;
                } else {

                }
            }

            console.log('&tourism=' + $('#selectTourism').val() + '&cat=' + $('#selectCategory').val() + '&city=' + $('#selectCity').val() + '&text=' + $('#searchValue').val());

        });

        $("div.holder").jPages({
            containerID: "itemContainer",
            previous    : "←",
            next        : "→",
//            first       : "|←",
//            last        : "→|"
        });

        $('#front-boxes .box.search, .extra-links .row .search').click(function () {
            $('html,body').animate({ scrollTop: 0 }, 'slow');
            $.each($('#search-form .cell'), function () {
                if ($(this).hasClass('col-lg-3')) {
                    $(this).removeClass('col-lg-3');
                    $(this).addClass('col-lg-11');
                } else if ($(this).hasClass('col-lg-1') || $(this).hasClass('col-lg-11')) {

                } else {
                    $(this).remove();
                }
            });
            return false;
        });

        $('#go-to-top').each(function(){
            $(this).click(function(){
                $('html,body').animate({ scrollTop: 0 }, 'slow');
                return false;
            });
        });

        if ($(window).scrollTop() > 200) {
            $('#go-to-top').addClass('come-in');
        } else {
            $('#go-to-top').removeClass('come-in');
        }

    });

    $(window).resize(function () {
        $('#search-block').css('margin-top', -$('#search-block').innerHeight());
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() > 200) {
            $('#go-to-top').addClass('come-in');
        } else {
            $('#go-to-top').removeClass('come-in');
        }
    });

    // Pretty simple huh?
    var scene = document.getElementById('scene');
    var parallax = new Parallax(scene);
</script>
