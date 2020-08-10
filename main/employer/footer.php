<script>
window.onload = function() {
  check();
  frozen();
  deactivate();
  }

function check(){
  var y = document.cookie.indexOf("employer_username=");
    if (y < 0) {
      // if cookie doesn't exist, ask for password
      var input = bootbox.alert({
        message: "You arent logged in!",
        callback: function() {
            location.href = "http://127.0.0.1/comp-353/main/";
          }
      })
    }
}

function frozen(){
    var id = getCookie("employer_username");
    $.ajax({
    url:'../database/get_frozen_account.php',
    method:"POST",
    data:{id:id},
    error: function(xhr, error){
        console.log(xhr); console.log(error);
    },
    success:function(data){
      
      if(data == 1){
       
        if ( document.URL.includes("subscription.php") ||document.URL.includes("profile.php") || document.URL.includes("payment.php")  || document.URL.includes("chequing_table.php")  || document.URL.includes("card_table.php")) {
        }else{
         redirect_to_subscription();
        }
        
          var elements = document.getElementsByClassName("frozen");
          console.log(elements);
          
           elements[0].style.display = 'none';
           elements[1].style.display = 'none';
           elements[2].style.display = 'none';   
      } 
    }
   });
}

function deactivate(){
    var id = getCookie("employer_username");
    $.ajax({
    url:'../database/get_deactivated_account.php',
    method:"POST",
    data:{id:id},
    error: function(xhr, error){
        console.log(xhr); console.log(error);
    },
    success:function(data){
      
      if(data == 2){
       
        if ( document.URL.includes("subscription.php") ||document.URL.includes("profile.php") || document.URL.includes("payment.php")  || document.URL.includes("chequing_table.php")  || document.URL.includes("card_table.php")) {
        }else{
         redirect_to_subscription();
        }
        
          var elements = document.getElementsByClassName("frozen");
          console.log(elements);
          
           elements[0].style.display = 'none';
           elements[1].style.display = 'none';
           elements[2].style.display = 'none';
           elements[3].style.display = 'none';
           elements[4].style.display = 'none';   
           elements[5].style.display = 'none';   
      } 
    }
   })
  };

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function redirect_to_subscription(){
  location.href = "subscription.php";
}

</script>

</body>
</html>
