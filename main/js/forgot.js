const employeeForgotPassword = () => {
    const username = $('input[id=employee_username_forgot]').val();
    const json = {
        "username": username,
    }
    $.post('./service/auth/employee_forgot.php', json, function (data) {
        if (!data) {
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if (res.result) {
            alert("Email has been sent.");
            window.location.replace('index.php');
        } else {
            alert("Username is invalid.");
        }
    })
}

const employerForgotPassword = () => {
    const username = $('input[id=employer_username_forgot]').val();
    const json = {
        "username": username,
    }
    $.post('./service/auth/employer_forgot.php', json, function (data) {
        if (!data) {
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if (res.result) {
            alert("Email has been sent.");
            window.location.replace('index.php');
        } else {
            alert("Username is invalid.");
        }
    })
}

const adminForgotPassword = () => {
    const username = $('input[id=admin_username_forgot]').val();
    const password = $('input[id=admin_password_forgot]').val();
    const json = {
        "username": username,
        "password": password,
    }
    $.post('./service/auth/admin_forgot.php', json, function (data) {
        if (!data) {
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if (res.result) {
            setCookie("admin_username", username, 1);
            window.location.replace('index.php');
        } else {
            alert("Username or Password is incorrect.");
        }
    })
}