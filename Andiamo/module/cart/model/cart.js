var cart = [];
$(function () {
    if (localStorage.cart){
        cart = JSON.parse(localStorage.cart);
        showCart();
    }
});

function showCart() {
    if (cart.length == 0) {
        console.log(cart);
        $("#cartBody").css("visibility", "hidden");
        return;
    }

    $("#cartBody").css("visibility", "visible");
    $("#cartBody").empty();
    for (var i in cart) {
        var item = cart[i];
        console.log(item);
        var row = "<div class='site-section'>"
        +"<div class='container'>"
          +"<div class='row mb-5'>"
            +"<form class='col-md-12' method='post'>"
              +"<div class='site-blocks-table'>"
                +"<table class='table table-bordered'>"
                  +"<thead>"
                    +"<tr>"
                      +"<th class='product-name'>Product</th>"
                      +"<th class='product-price'>Price</th>"
                      +"<th class='product-quantity'>Quantity</th>"
                      +"<th class='product-total'>Total</th>"
                      +"<th class='product-remove'>Remove</th>"
                    +"</tr>"
                    +"</thead>"
                    +"<tbody>"
                    +"<tr>"
                      +"<td class='product-name'>"
                          +"<h2 id='prodname' class='h5 text-black'>" + item.Product + "</h2>"
                          +"</td>"
                          +"<td id='price'>" + item.Price + "</td>"
                          +"<td style='width: 162px;'>"
                        +"<div class='qty input-group mb-3' style='max-width: 120px;'>"
                          +"<div class='input-group-prepend'>"
                              +"<button class='btn btn-outline-primary js-btn-minus' type='button'>&minus;</button>"
                              +"</div>"
                              +"<input id='qty' type='text' class='qty form-control text-center' value='" + item.Qty + "' placeholder='' aria-label='Example text with button addon' aria-describedby='button-addon1' readonly='readonly'>"
                          +"<div class='input-group-append'>"
                              +"<button class='btn btn-outline-primary js-btn-plus' type='button'>&plus;</button>"
                              +"</div>"
                              +"</div>"
                              +"</td>"
                              +"<td>" + item.Qty * item.Price + "</td>"
                              +"<td onclick='deleteItem(" + i + ")' class='btn btn-primary btn-sm'>X</td>"
                              +"</tr>"
                              +"</tbody>"
                              +"</table>"
                              +"</div>"
                              +"</form>"
                              +"</div>"
          +"<div class='row'>"
            +"<div class='col-md-6'>"
                +"</div>"
            +"<div class='col-md-6 pl-5'>"
              +"<div class='row justify-content-end'>"
                +"<div class='col-md-7'>"
                  +"<div class='row'>"
                    +"<div class='col-md-12 text-right border-bottom mb-5'>"
                        +"<h3 class='text-black h4 text-uppercase'>Cart Totals</h3>"
                        +"</div>"
                        +"</div>"
                  +"<div class='row mb-3'>"
                    +"<div class='col-md-6'>"
                        +"<span class='text-black'>Subtotal</span>"
                        +"</div>"
                    +"<div class='col-md-6 text-right'>"
                        +"<strong class='text-black'>$230.00</strong>"
                        +"</div>"
                        +"</div>"
                  +"<div class='row mb-5'>"
                    +"<div class='col-md-6'>"
                        +"<span class='text-black'>Total</span>"
                        +"</div>"
                    +"<div class='col-md-6 text-right'>"
                        +"<strong class='text-black'>$230.00</strong>"
                        +"</div>"
                        +"</div>"
      
                  +"<div class='row'>"
                    +"<div class='col-md-12'>"
                        +"<button class='btn btn-primary btn-lg py-3 btn-block' onclick='window.location='checkout.html''>Checkout</button>"
                        +"</div>"
                        +"</div>"
                        +"</div>"
                        +"</div>"
                        +"</div>"
                        +"</div>"
        +"</div>"
      +"</div>";
    $("#cartBody").append(row);
    }
}

$(document).on('click','.InsertCarr',function () {
    var id = $(this).attr("id");
    console.log(id);
    $.get("module/cart/controller/controller_cart.php?op=addcart&id=" + id, function (data, status) {
      datos = JSON.parse(data);
      // console.log(datos['destination']);
    var name = datos['destination'];
    var price = datos['price'];
    var qty = 1;
    

    // update qty if product is already present
    for (var i in cart) {
        if(cart[i].Product == name){
            cart[i].Qty = qty;
            showCart();
            saveCart();
            return;
        }
    }
    // create JavaScript Object
    var item = { Product: name,  Price: price, Qty: qty, ID: id }; 
    cart.push(item);
    saveCart();
    showCart();
    });
});
// $(document).on('click','.qty', function() {  
//   var changeqty = JSON.parse(localStorage.cart); 
//   var nqty = $(this).val();
//   for (var i in cart) {
//     console.log(cart[i].ID);
//     console.log($(this).attr("id"));
//     if(cart[i].ID ===  $(this).attr("id")){
//           cart[i].qty = nqty;
//           showCart();
//           saveCart();
//           return;
//       }
//   }
// });

function saveCart() {
    if ( window.localStorage){
        localStorage.cart = JSON.stringify(cart);
    }
}

function deleteItem(index){
    cart.splice(index,1); // delete item at index
    showCart();
    saveCart();
}
// function addToCart() {
//     $(document).ready(function(){
//         $("#check").click(function() {
//           var datos = JSON.stringify(cart)
//             $.ajax({
//                    type: "POST",
//                    url: "module/cart/controller/controller_cart.php?op=checkout",
//                    data: {data : datos},
//                    success: function(data, status) {
//                      var stringdata = JSON.parse(data);
//                      // alert (data);
//                      if (stringdata == "correcto"){
//                        alert("Compra realizada correctamente");
//                        window.location.href="index.php?page=controller_moviles&op=moviles";
//                        localStorage.clear();
//                     }else{
//                         alert("Error interno, pruebe mas tarde");
//                     };
//                    }
//                  });
//               });
// });