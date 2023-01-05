
// search
    var formSearch = document.getElementById('formItem');
    formSearch.addEventListener("submit", function(event){
        event.preventDefault();
        var keyword = document.getElementById('keyword').value;
        var search = document.getElementsByClassName(keyword)
        console.log(keyword)
        console.log(search)
        if(search.length !== 0){
            $grid.isotope({
                filter: search
            })
        }else{
            $grid.isotope({
                filter: keyword
            })
        }
    });
    var $grid = $(".grid").isotope({
        itemSelector: ".all",
        percentPosition: false,
        masonry: {
            columnWidth: ".all"
        }
    })

    //tambah keranjang
    var keranjang = document.getElementById('cart');
    var keranjangNumber = keranjang.value;

    function tambahKeranjang(){
        keranjangNumber++;
        if (keranjangNumber > 9){
            keranjang.innerHTML = `<i class="fas fa-shopping-cart"></i>(9+)` 
        }else
        keranjang.innerHTML = `<i class="fas fa-shopping-cart"></i>(${keranjangNumber})`
    }
// function filter() {
//     var value, name, profile;
//     value = document.getElementById("value").value.toUpperCase();
//     profile = document.getElementsByClassName("all");
//     for (var i = 0; i < profile.length; i++) {
//         name = profile[i].getElementsByClassName("name");
//         if (name[0].innerHTML.toUpperCase().indexOf(value) > -1) {
//             profile[i].style.display = "flex"
//         } else {
//             profile[i].style.display = "none"
//         }
//     }
// }


// isotope js
$(window).on('load', function () {
    $('.filters_menu li').click(function () {
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');

        var data = $(this).attr('data-filter');
        $grid.isotope({
            filter: data
        })
    });

    var $grid = $(".grid").isotope({
        itemSelector: ".all",
        percentPosition: false,
        masonry: {
            columnWidth: ".all"
        }
    })
});

// nice select
$(document).ready(function () {
    $('select').niceSelect();
});

/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

// client section owl carousel
$(".client_owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});
// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();
