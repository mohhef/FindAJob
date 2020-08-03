<script>
window.onload = function() {
    var y = document.cookie.indexOf("employee_username=");
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


    window.onload = function() {
    var id = getCookie("employee_username");
    $.ajax({
    url:'../database/get_frozen_account.php',
    method:"POST",
    data:{id:id},
    error: function(xhr, error){
        console.log(xhr); console.log(error);
    },
    success:function(data){
       
      if(data == 1){
       
        if ( document.URL.includes("job_offers.php")) {
        }else{
         redirect_to_job_offers();
        }
        
          var elements = document.getElementsByClassName("frozen");
          console.log(elements.length);
          
           elements[0].style.display = 'none';
           elements[1].style.display = 'none';
           elements[2].style.display = 'none';
     
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

function redirect_to_job_offers(){
  location.href = "job_offers.php";
}
</script>
</body>
</html>