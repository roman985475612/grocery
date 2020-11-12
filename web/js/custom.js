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

//
paypal.minicart.render();
paypal.minicart.cart.on('checkout', function (evt) {
    var items = this.items(),
        len = items.length,
        total = 0,
        i;

    // Count the number of each item in the cart
    for (i = 0; i < len; i++) {
        total += items[i].get('quantity');
    }

    if (total < 3) {
        alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
        evt.preventDefault();
    }
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

    $('.show-cart-btn').on('click', function () {
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

    $('.add-to-cart').on('click', function () {
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

    $('#cart-destroy').on('click', function () {
        $.ajax({
            url: 'cart/destroy',
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

})
