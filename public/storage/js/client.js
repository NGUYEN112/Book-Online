// $(document).ready(function() {
//     $.ajax({
//         url: 'get-category',
//         type: 'get',
//         dataType: 'json',
//         success: function(categoriesData) {
//             var categories = categoriesData['data'];
//             console.log(categoriesData)
//             menuInner = "";
//             if (categories != null) {
//                 $.each(categories, function(index, row) {
//                     menuInner += '<li class="navbar__item nav-item {{ (request()->segment(1) == ' + row.category_name + ') ? "navbar-active" : ""}}"><a href="/' + row.category_name + '">' + row.category_name + '</a> </li>'
//                 })
//                 // console.log(selectInner)
//                 $(".nav-menu").html(menuInner);
//             }
//         }
//     })
// })
loadCart();
function loadCart() {


    $(document).ready(function () {
        $.ajax({
            url: '/get-cart',
            type: 'get',
            dataType: 'json',
            success: function (cartData) {
                var cart = cartData['data']
                var count = parseInt($('.count-item').html())
                var total_price = 0
                if (cart == null) {
                    $('.count-item').html(count)
                    $('.total_price').html(total_price)
                } else {
                    $.each(cart, function (index, row) {
                        count += 1
                        total_price += row.price * row.count
                    })
                    $('.count-item').html(count)
                    $('.total_price').html(total_price)
                }
            },
            error: function () {
                alert("Error:");
            }
        })
    })
}

$('.btn').click(function () {
    $(this).toggleClass("click");
    $('.sidebar').toggleClass("show");
});

$('.menu-btn').click(function () {
    $(this).toggleClass("open");
    $('.menubar').toggleClass("show-menu");
});


$('.tab-link').each(function () {
    var element = $(this).attr('id')
    if ($(this).hasClass("active")) {
        $('.tab-content#' + element).addClass("show-content");
    } else {
        $('.tab-content#' + element).removeClass("show-content");
    }

})
$('.tab-link').click(function () {
    var ele = $(this).attr('id')
    if (!$(this).hasClass("active")) {
        $('.tab-link').removeClass('active');
        $(this).addClass("active");
        // $('.tab-content').removeAttr('id','show-content');
        // $('.tab-content#'+ id).toggleClass('show-content');
        $('.tab-link').each(function () {
            var element = $(this).attr('id')
            if ($(this).hasClass("active")) {
                $('.tab-content#' + element).addClass("show-cart");
            } else {
                $('.tab-content#' + element).removeClass("show-cart");
            }

        })


    }
});

$('.categories__category-item-parent').click(function () {
    $('.categories__category-item-parent').removeClass("sidebar-active")
    $(this).addClass("sidebar-active")
})

$('.categories__category-item-child').click(function () {
    $('.categories__category-item-child').removeClass("sidebar-active")
    $(this).addClass("sidebar-active")
})


// $('#exampleSlider').multislider();

// $('#exampleSlider').multislider({
//     interval: 5000,
//     // slideAll: true
// });

const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

$('.cart').click(function () {
    $(this).toggleClass("swich");
    $('.nav-cart').toggleClass("swich");
})




//add to card

$('.my-btn').click(function () {
    var prd_id = parseInt($('.product_id').val())
    var dsc_id = parseInt($('.discount_id').val())
    var price = parseInt($('.product-price').html())
    console.log(jQuery.type(prd_id))
    $.ajax({
        url: '/add-to-cart',
        type: 'post',
        data: {
            _token: $('[name="_token"]').val(),
            product_id: prd_id,
            discount_id: dsc_id,
            price: price,
        },
        
        success: function (response) {
            loadCart();
            alert("Add product to Cart Successfully ");
        },
        error: function(err){
            alert('failed')
        }
    })
})




