$(document).ready(function(){
    console.log("holita");						
    setInterval(function(){ 
        $.ajax({
            type : 'POST',
            url  : 'module/login/controller/controller_login.php?&op=time',
            success :  function(response){
                console.log(response);						
                if(response=="inactivo"){
                    alert("Se ha cerrado la cuenta por inactividad")
                    setTimeout('window.location.href = "index.php?page=controller_login&op=logout";',1000);
                }
            }
        });
    }, 300000);
    if (document.getElementById('avatar')){
        $.ajax({
            type : 'POST',
            url  : 'module/login/controller/controller_login.php?&op=gravatar',
            success: function(data){		
                var json = JSON.parse(data);
                var Elementli = document.createElement('li');
                Elementli.li = "avatar";
                Elementli.innerHTML = "<img title='" + json['username'] + "' id='avatar_img' src='" + json['avatar'] + "'/>"
                document.getElementById("avatar").appendChild(Elementli);
            }
        });
    }
});