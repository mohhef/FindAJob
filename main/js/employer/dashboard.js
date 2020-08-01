const postJob = () => {
    const title = $('input[id=job_title]').val();
    const description = $('#job_description').val();
    const employeesNeeded = $('input[id=job_employee_needed]').val();
    const category = $("#dropdownMenuButton:first-child").val();

    if(title === "" && description === "" && employeesNeeded === "" && category === ""){
        alert("all fields must be filled.");
        return;
    }

    const json = {
        "title": title,
        "description": description,
        "employeesNeeded": employeesNeeded,
        "category": category
    }
    $.post("../../service/employer/insert_job.php", json, function(data){
        if(!data){
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if(res.result){
            alert("Job was added.");
            location.reload();
        }else{
            alert("Unable to add job.");
        }
    })
}

const updateJob = () => {
    const job_id = $('input[id=update_job_id]').val();
    const title = $('input[id=update_job_title]').val();
    const description = $('#update_job_description').val();
    const employeesNeeded = $('input[id=update_job_employee_needed]').val();
    const category = $("#update_dropdown").val();
    const json = {
        "job_id": job_id,
        "title": title,
        "description": description,
        "employeesNeeded": employeesNeeded,
        "category": category
    }
    $.post("../../service/employer/update_job.php", json, function(data){
        if(!data){
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if(res.result){
            alert("Job was updated.");
            location.reload();
        }else{
            alert("Unable to update job.");
        }
    })
}

const deleteJob = () => {
    const job_id = $('input[id=delete_job_id]').val();
    const json = {
        "job_id": job_id
    }
    $.post("../../service/employer/delete_job.php", json, function(data){
        if(!data){
            alert("could not fulfill request.");
            return;
        }
        const res = JSON.parse(data);
        if(res.result){
            alert("Job was deleted.");
            location.reload();
        }else{
            alert("Unable to delete job.");
        }
    })
}