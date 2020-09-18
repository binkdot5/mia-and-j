// jQuery(document).ready(function($) {

//     $('.button.alt').on('click', function(e){ 

//     e.preventDefault();

//     $thisbutton = $(this),

//                 $form = $thisbutton.closest('form.woocommerce-cart-form'),

//                 id = $thisbutton.val(),

//                 product_qty = $form.find('input[name=quantity]').val() || 1,

//                 product_id = $form.find('input[name=product_id]').val() || id,

//                 variation_id = $form.find('input[name=variation_id]').val() || 0;

//     var data = {

//             action: 'woocommerce_ajax_add_to_cart',

//             product_id: product_id,

//             product_sku: '',

//             quantity: product_qty,

//             variation_id: variation_id

//         };

//     $.ajax({

//             type: 'post',

//             url: wc_add_to_cart_params.ajax_url,

//             data: data,

//             beforeSend: function (response) {

//                 $thisbutton.removeClass('added').addClass('loading');
//                 console.log("I am here");

//             },

//             complete: function (response) {

//                 $thisbutton.addClass('added').removeClass('loading');
//                 console.log("No, I am here");

//             }, 

//             success: function (response) { 

//                 if (response.error & response.product_url) {

//                     window.location = response.product_url;

//                     return;

//                 } else { 

//                     $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);

//                 } 

//             }, 

//         }); 

//      }); 

// });