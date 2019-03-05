var cart = [];
$(function () {
    if (localStorage.cart){
        cart = JSON.parse(localStorage.cart);
        showCart();
    }
});

// function addToCart() {
    $(document).ready(function(){
        $("#check").click(function() {
          var datos = JSON.stringify(cart)
            $.ajax({
                   type: "POST",
                   url: "module/cart/controller/controller_cart.php?op=checkout",
                   data: {data : datos},
                   success: function(data, status) {
                     var stringdata = JSON.parse(data);
                     // alert (data);
                     if (stringdata == "correcto"){
                       alert("Compra realizada correctamente");
                       window.location.href="index.php?page=controller_moviles&op=moviles";
                       localStorage.clear();
                    }else{
                        alert("Error interno, pruebe mas tarde");
                    };
                   }
                 });
              });
});