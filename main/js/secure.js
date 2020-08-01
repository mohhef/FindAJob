function cookieset_employer(){
  var y = document.cookie.indexOf("employer_username=");
  console.log(y);
  if (y >= 0) { // if y >= 0, the key:value pair exists in the cookie
    // nothing happens, display the page
  
      document.cookie = 'employer_username' +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
      // alert("You are now logged out!");
  
      window.location.href = "http://127.0.0.1/comp-353/main/";
  
      return true;
  
  }
  }
  
function cookieset_employee(){
var y = document.cookie.indexOf("employee_username=");
console.log(y);
if (y >= 0) { // if y >= 0, the key:value pair exists in the cookie
  // nothing happens, display the page

    document.cookie = 'employee_username' +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    // alert("You are now logged out!");

    window.location.href = "http://127.0.0.1/comp-353/main/";

    return true;

}
}
function cookieset_admin(){
var y = document.cookie.indexOf("admin_username=");
console.log(y);
if (y >= 0) { // if y >= 0, the key:value pair exists in the cookie
  // nothing happens, display the page

    document.cookie = 'admin_username=' +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    // alert("You are now logged out!");

    window.location.href = "http://127.0.0.1/comp-353/main/";

    return true;

}
}

