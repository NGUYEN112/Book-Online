


//quanlity
$('.minus-btn').click(function() {
    var id = $(this).attr('id')
    var count = parseInt($('.count-product','#'+id).val())
    var price = parseInt($('.price','#'+id).html()) / count
    var total_price = parseInt($('.cart_price-inner').html())
    if(count == 1){
        return
    }else {
        count -= 1
        if($('input[name=choose]','#'+id).is(':checked') == true){
            total_price -= price
            $('.cart_price-inner').html(total_price)
        }
        total = price*count
        $('.count-product','#'+id).val(count)
        $('.price','#'+id).html(total)
    }
})

$('.plus-btn').click(function() {
    var id = $(this).attr('id')
    var count = parseInt($('.count-product','#'+id).val())
    var price = parseInt($('.price','#'+id).html()) / count
    var total_price = parseInt($('.cart_price-inner').html())
    count += 1
    total = price*count
    if($('input[name=choose]','#'+id).is(':checked') == true){
        total_price += price
        $('.cart_price-inner').html(total_price)
    }

    $('.count-product','#'+id).val(count)
    $('.price','#'+id).html(total)

})

//checked
$('input[name=choose]').click(function(){
    var id = $(this).attr('id')
    var price = parseInt($('.price','#'+id).html())
    var total_price = parseInt($('.cart_price-inner').html())
    if($(this).is(':checked') == true) {
        total_price += price
        $('.cart_price-inner').html(total_price)
    }else {
        total_price -= price
        $('.cart_price-inner').html(total_price)
    }
})


//checkout
$('.checkout-button').click(function() {
    var datas = new Array()
    // var check = $('input[name=choose]:checked')[1].attr('id')
    // var count_check = $('input[name=choose]:checked').length
    // var order_id = $('input[name=choose]:checked')[0].val()
    // for(i = 0; i< count_check; i++) {
    //     item = new Array()
    //     var order_id = $('input[name=choose]:checked')[0].val()
    // }
    // var checked = $('input[name=choose]:checked')
    // var count = $('.count-product','#'+checked).val()
    // var total_price = $('.price','#'+checked).html()

    $(':checkbox:checked').each(function(){
        var order_id = parseInt($(this).val())
        var id = $(this).attr('id')
        var count = parseInt($('.count-product','#'+id).val())
        var item = {}
        item = {
            id : order_id,
            count : count
        }
        datas.push(item)
      });
      $.ajax({
          url: '/checkout',
          type: 'post',
          data: {
            _token: $('[name="_token"]').val(),
            data : datas
          },
        success: function() {
            alert('Checkout Successfully')
            window.location.href = '/checkout'
        },
        error : function(err) {
            alert('Failer')
        }
      })
})

$('.cart-tab').each(function () {
    var element = $(this).attr('id')
    if ($(this).hasClass("active")) {
        $('.cart-content#' + element).addClass("show-cart");
    } else {
        $('.cart-content#' + element).removeClass("show-cart");
    }

})

$('.cart-tab').click(function () {
    var ele = $(this).attr('id')
    if (!$(this).hasClass("active")) {
        $('.cart-tab').removeClass('active');
        $(this).addClass("active");

        $('.cart-tab').each(function () {
            var element = $(this).attr('id')
            if ($(this).hasClass("active")) {
                $('.cart-content#' + element).addClass("show-cart");
            } else {
                $('.cart-content#' + element).removeClass("show-cart");
            }

        })


    }
});
