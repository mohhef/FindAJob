<script>
window.onload = function() {
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
</script>
</body>
</html>
