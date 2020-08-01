
const employeeLogin = () => {
    const username = $('input[id=employee_username]').val();
    const password = $('input[id=employee_password]').val();
    const json = {
        "username": username,
        "password": password,
    }
    $.post('./service/auth/employee_login.php', json, function(data){
        if(!data){
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if(res.result){
            setCookie("employee_username", username, 1);
            location.reload();
        }else{
            alert("Username or Password is incorrect.");
        }
    })
}

const employerLogin = () => {
    const username = $('input[id=employer_username]').val();
    const password = $('input[id=employer_password]').val();
    const json = {
        "username": username,
        "password": password,
    }
    $.post('./service/auth/employer_login.php', json, function(data){
        if(!data){
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if(res.result){
            setCookie("employer_username", username, 1);
            location.replace("view/employer/dashboard.php");
        }else{
            alert("Username or Password is incorrect.");
        }
    })
}

const adminLogin = () => {
    const username = $('input[id=admin_username]').val();
    const password = $('input[id=admin_password]').val();
    const json = {
        "username": username,
        "password": password,
    }
    $.post('./service/auth/admin_login.php', json, function(data){
        if(!data){
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if(res.result){
            setCookie("admin_username", username, 1);
            location.reload();
        }else{
            alert("Username or Password is incorrect.");
        }
    })
}