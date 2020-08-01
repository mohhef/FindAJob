const registerEmployee = () => {
    const email = $('input[id=employee_email_register]').val();
    const username = $('input[id=employee_username_register]').val();
    const password = $('input[id=employee_password_register]').val();
    if(email === "" && username === "" && password === ""){
        return;
    }
    const json = {
        "email": email,
        "username": username,
        "password": password,
    }
    $.post('./service/auth/employee_register.php', json, function(data){
        if(!data){
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if(res.result){
            setCookie("employee_username", username, 1);
            window.location.replace('index.php')
        }else{
            alert("Registration failed.");
        }
    })
}

const registerEmployer = () => {
    const email = $('input[id=employer_email_register]').val();
    const username = $('input[id=employer_username_register]').val();
    const password = $('input[id=employer_password_register]').val();
    if(email === "" && username === "" && password === ""){
        return;
    }
    const json = {
        "email": email,
        "username": username,
        "password": password,
    }
    $.post('./service/auth/employer_register.php', json, function(data){
        if(!data){
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if(res.result){
            setCookie("employer_username", username, 1);
            window.location.replace('index.php')
        }else{
            alert("Registration failed.");
        }
    })
}