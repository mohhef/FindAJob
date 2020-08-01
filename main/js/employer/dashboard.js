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
    $.post("../../service/employee/insert_job.php", json, function(data){
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