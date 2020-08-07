const employeeResetPassword = () => {
    const password = $('input[id=employee_reset_password]').val();
    const url = window.location;
    const token = new URLSearchParams(url.search).get('token')
    const json = {
        "token": token,
        "password": password,
    }
    $.post('./service/auth/employee_reset_password.php', json, function(data){

        if(!data){
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if(res.result){
            window.location.replace('index.php')
        }else{
            alert("Registration failed.");
        }
    })
}
