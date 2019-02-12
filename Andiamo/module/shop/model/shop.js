$(document).ready(function(){
    if (document.getElementById('container_travels')) {
      var url = 
      $.get("module/shop/controller/controller_shop.php?&op=data_shop", function(data,status) {
        // console.log(data);
        var json = JSON.parse(data);
        $.each(json, function(index, list) {
              var ElementDiv = document.createElement('div');
              ElementDiv.id = "list_travels";
              ElementDiv.innerHTML = "<div id='prueba' class='block-4 text-center border'>"
                                      + "<figure class='block-4-image'>"
                                      + "<a id='details'><img class='img-fluid' src=view/assets/images/" + list.img + "></a>"
                                      + "</figure>" 
                                      + "<div class='block-4-text p-4'>"
                                      + "<h3><a>" + list.destination + "</a></h3>"
                                      + "<p class='mb-0'>" + list.country + "</p>"
                                      + "<p class='text-primary font-weight-bold'>" + list.price +"€</p>"
                                      + "</div>";
                                      + "</div>";
              document.getElementById("list_travels").appendChild(ElementDiv);
        });
        for(i=1;i<=20;i++){
          $( ".qtyprod" ).append("<option value='" + i +"'>" + i +"</option>");
        }
      });
  }
    if (document.getElementById('container_travels2')) {
      $.get("module/shop/controller/controller_shop.php?&op=data_shop2", function(data,status) {
        var json = JSON.parse(data);
        // console.log(json);
             $.each(json, function(index, list) {
              var ElementDiv = document.createElement('div');
              ElementDiv.id = "list_travels";
              ElementDiv.innerHTML = "<div id='prueba' class='block-4 text-center border'>"
                                      + "<figure class='block-4-image'>"
                                      + "<a><img class='img-fluid' src=view/assets/images/" + list.img + "></a>"
                                      + "</figure>" 
                                      + "<div class='block-4-text p-4'>"
                                      + "<h3><a>" + list.destination + "</a></h3>"
                                      + "<p class='mb-0'>" + list.country + "</p>"
                                      + "<p class='text-primary font-weight-bold'>" + list.price +"€</p>"
                                      + "</div>";
                                      + "</div>";
              document.getElementById("list_travels").appendChild(ElementDiv);
        });
        for(i=1;i<=20;i++){
          $( ".qtyprod" ).append("<option value='" + i +"'>" + i +"</option>");
        }
      });
  }


//   $('#details').click(function () {
//     $("#modal_products").empty();
//     $("#exampleModalLabel").empty();
//     var id = this.getAttribute('id');
      
//     $.get("module/shop/controller/controller_shop.php?op=data_shop_details&details=" + id, function (data, status) {
//           var json = JSON.parse(data);
//           $("#exampleModalLabel").append("Zapatillas " + json.brand + " " + json.model);
//           var ElementDiv = document.createElement('div');
//           ElementDiv.id = "modal_shop";
//           ElementDiv.innerHTML =  "<div style='width:46%; display:inline-block;' class='provamodal'><img src='" + json.img + "' style='width:100%;'></div>" +
//                                   "<div style='width:44%; display:inline-block; vertical-align:top; font-size:30px; margin-left:10%;'><div style='width:100%;'> Price: " + json.price + "€</div>" +
//                                   "<div style='width:100%;'> Size: " + json.size + "</div><div style='font-size: 18px;text-align:  justify;margin-top: 44px;margin-right: 33px'>" + json.description + "</div>" +
//                                   "<select id='qty" + json.cref + "modal' style='width: 60%; font-size:20px; margin-top: 53px; border: solid 3px #bbbbbb; background-color: #808080bd; color: white;'></select></div>";
//           document.getElementById("modal_products").appendChild(ElementDiv);

//           for(i=1;i<=20;i++){
//             $( "#qty" + json.cref + "modal" ).append("<option value='" + i +"'>" + i +"</option>");
//           }
//           $(".addmodal").attr("id",json.cref);
//     });
// });


  $('#buscar').click(function () {
      var origin = $('#origin').val();
      var price = $('#price').val();
      var currency = $('#currency').val();

      $.ajax({
        type: "GET",
        // url: 'https://test.api.amadeus.com/v1/shopping/flight-destinations?origin=' + origin + '&oneWay=false&nonStop=false&maxPrice=' + price + '&currency=' + currency,
        url: 'https://test.api.amadeus.com/v2/shopping/hotel-offers?cityCode=LON',
        crossDomain: true,
        contentType: "application/json",
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer 0qcxGomY7PPWcAF466TthNnNllU0');
        },
        success: function(data){
            // console.log(data[available]);
            // x = JSON.stringify(data);
            console.log(data);
              var html = [];
              html.push('<table width="100%" border="0" cellspacing="0" cellpadding="3"><tbody>');
                    for (var i = 0; i < 10; ++i)   {
                      html.push('<tr><td>' + '<img src="' + data[i]['type'] + '" border="0">' + '</td></tr>');
              }
              html.push('</tbody></table>');
              document.getElementById("results").innerHTML = html.join("");
        },
        error: function(){
            alert("Errorebay");
        }
    });

  });
});