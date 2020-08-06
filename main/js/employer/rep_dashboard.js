function createRep(){
    const username = $('input[id=insert_rep_username]').val();
    const email = $('input[id=insert_rep_email]').val();
    const password = $('input[id=insert_rep_password]').val();
    const confirm_password = $('input[id=insert_rep_confirm_password]').val();
    if( password !== confirm_password) {
        alert("passwords don't match");
        return;
    }
    const json = {
        "username": username,
        "password": password,
        "email": email,
    }
    $.post('../service/employer/insert_rep.php', json, function(data){
        if(!data){
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if(res.result){
            location.reload();
        }else{
            alert("Failed to create rep.");
        }
    })
}

function updateRep(){
    const username = $('input[id=update_username]').val();
    const password = $('input[id=update_password]').val();
    const json = {
        "username": username,
        "password": password,
    }
    $.post('../service/employer/update_rep.php', json, function(data){
        console.log(data);
        if(!data){
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if(res.result){
            location.reload();
        }else{
            alert("Failed to update rep.");
        }
    })
}

function deleteRep(){
    const username = $('input[id=delete_username]').val();
    const json = {
        "username": username,
    }
    $.post('../service/employer/delete_rep.php', json, function(data){
        console.log(data);
        if(!data){
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if(res.result){
            location.reload();
        }else{
            alert("Could not delete the rep.");
        }
    })
}