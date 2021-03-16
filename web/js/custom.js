jQuery(document).ready(function($) {
    $(".scroll").click(function(event){		
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });

    // script-for sticky-nav
    var navoffeset=$(".agileits_header").offset().top;
    $(window).scroll(function(){
       var scrollpos=$(window).scrollTop(); 
       if(scrollpos >=navoffeset){
           $(".agileits_header").addClass("fixed");
       }else{
           $(".agileits_header").removeClass("fixed");
       }
    });    

    //
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
                        
   $().UItoTop({ easingType: 'easeOutQuart' });		
   
   // About - Testimonials
   $('.example1').wmuSlider();
});

$(function () {
    // product image zoom
    $('#productImage').okzoom({
        width: 150,
        height: 150,
        border: "1px solid black",
        shadow: "0 0 5px #000"
  });
})

// flexSlider
$(window).load(function(){
  $('.flexslider').flexslider({
    animation: "slide",
    start: function(slider){
      $('body').removeClass('loading');
    }
  });
});

// Cart
$(function() {
    
    function showCartSum() {
        let cartSum = $('#cart-sum').text()
        
        cartSum = (cartSum != '') ? cartSum : '0' 

        $('.cart-sum').text(cartSum)
    }

    function showCart(cart) {
        const modalCart = $('#modal-cart')
        modalCart.find('.modal-body').html(cart)
        modalCart.modal()
    }

    function reloadedCartList() {
        if (document.location.pathname == '/cart/list') {
            document.location.reload();
        }
    }

    $( '.show-cart-btn').on('click', function () {
        let id = $(this).data('id');
        $.ajax({
            url: 'cart/show',
            type: 'GET',
            success: (res) => {
                if (!res) alert('Ошибка')

                showCart(res)
                showCartSum()
            },
            error: (res) => {
                alert('Error!!!')
            }
        })

        return false

    })

    $( '.add-to-cart').on('click', function () {
        let id = $(this).data('id');
        $.ajax({
            url: 'cart/add',
            data: {product_id: id},
            type: 'GET',
            success: (res) => {
                if (!res) alert('Ошибка')

                showCart(res)
                showCartSum()
            },
            error: (res) => {
                alert('Error!!!')
            }
        })
    
        return false;
    })

    $( '.product_list_header .modal-body' ).on( 'click', '.del-item', function () {
        let id = $(this).data('id')

        $.ajax({
            url: 'cart/del-item',
            data: {product_id: id},
            type: 'GET',
            success: (res) => {
                if (!res) alert('Ошибка')

                reloadedCartList()
                showCart(res)
                showCartSum()
            },
            error: (res) => {
                alert('Error!!!')
            }
        })
    
        // return false;
    })

    $('#cart-remove').on('click', function () {
        $.ajax({
            url: 'cart/remove',
            type: 'GET',
            success: (res) => {
                if (!res) alert('Ошибка')

                reloadedCartList()
                showCart(res)
                showCartSum()
            },
            error: (res) => {
                alert('Error!!!')
            }
        })
    
        return false;
    })

    $('.value-minus').on('click', function () {
        let id = $(this).data('id');
        $.ajax({
            dataType: "json",
            url: 'cart/qty-minus',
            data: {product_id: id},
            type: 'GET',
            success: (res) => {
                if (!res) alert('Ошибка')
                $("#" + id + ".qty").text(res.list[id].qty)
                $("#" + id + ".sum").text("$" + res.list[id].sum)
                $(".total-sum").text("$" + res.total_sum)
            },
            error: (res) => {
                alert('Error!!!')
            }
        })
    
        return false;
    })

    $('.value-plus').on('click', function () {
        let id = $(this).data('id');
        $.ajax({
            dataType: "json",
            url: 'cart/qty-plus',
            data: {product_id: id},
            type: 'GET',
            success: (res) => {
                if (!res) alert('Ошибка')
                $("#" + id + ".qty").text(res.list[id].qty)
                $("#" + id + ".sum").text("$" + res.list[id].sum)
                $(".total-sum").text("$" + res.total_sum)
            },
            error: (res) => {
                alert('Error!!!')
            }
        })
    
        return false;
    })

})
