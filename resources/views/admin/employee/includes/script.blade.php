<script>

    function onEditClick(data) {
        $.each(data, (key,value) => {
            $(`#edit-form input[name=${key}]`).val(value);
        });

        $(".error_div").empty();
        $(`#edit-form select[name=fk_company_id] option[value=${data.fk_company_id}]`).prop({selected:true});
    }


    function onDeleteClick(id){
        $("#delete_form #js_employee_id").val(id);
    }


    $("#add-form").submit(($event) => {
        $('.error_div').empty();
        $event.preventDefault();
        const form = $('#add-form');

        const url = "{{ route('employee.store') }}";
        addEmployee(url, form.serialize());
    });

    $("#edit-form").submit(($event) => {
        $event.preventDefault();
        $('.error_div').empty();
        $event.preventDefault();
        const form = $('#edit-form');
        let url = "{{ route('employee.update',':id') }}";
        const relpaceId = $('#edit_employee_id').val();
        url = url.replace(':id',relpaceId);
        editEmployee(url, form.serialize());
    });


    $("#delete_form").submit( ($event) => {
        $event.preventDefault();

        id = $("#delete_form #js_employee_id").val();
        let url = "{{ route('employee.destroy',':id') }}";

        url = url.replace(':id',id);


        deleteEmployee(url,id);
    })


    function addEmployee(url,data){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            dataType: 'json',
            type:'POST',
            data: data,
            success: function(data) {
                $("#message-container").append(`<div class="alert alert-success">
                                                        <a class="close" data-dismiss="alert">&times;</a> ${data.message}
                                                    </div>`);
                    fadeMessage();
                    location.reload();
            },
            error: function(error) {
                if(error.status == 422){
                    console.log(error);
                    const errors = error.responseJSON.errors;
                    $.each(errors, (key,value) => {
                        let errorDiv = $(`#${key}_error`);
                        $.each(value, (key1,value1) => {
                            errorDiv.append(`<div>${value1}</div>`);
                        });
                    });
                } else {
                    $("#message-container").append(`<div class="alert alert-danger">
                                                        <a class="close" data-dismiss="alert">&times;</a> Error Storing employee record
                                                    </div>`);
                    fadeMessage();
                }
            }
        });

    }


    function editEmployee(url,data){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            dataType: 'json',
            type:'PUT',
            data: data,
            success: function(data) {
                $("#message-container").append(`<div class="alert alert-success">
                                                        <a class="close" data-dismiss="alert">&times;</a> ${data.message}
                                                    </div>`);
                    fadeMessage();
                    location.reload();
            },
            error: function(error) {
                if(error.status == 422){
                    console.log(error);
                    const errors = error.responseJSON.errors;
                    $.each(errors, (key,value) => {
                        let errorDiv = $(`#edit_${key}_error`);
                        $.each(value, (key1,value1) => {
                            errorDiv.append(`<div>${value1}</div>`);
                        });
                    });
                } else {
                    $("#message-container").append(`<div class="alert alert-danger">
                                                        <a class="close" data-dismiss="alert">&times;</a> Error Storing employee record
                                                    </div>`);
                    fadeMessage();
                }
            }
        });

    }

    function deleteEmployee(url,$id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            dataType: 'json',
            type:'DELETE',
            success: function(data) {
                $(".delete-modal").modal('hide');
                $("#message-container").append(`<div class="alert alert-success">
                                                        <a class="close" data-dismiss="alert">&times;</a> ${data.message}
                                                    </div>`);
                    fadeMessage();
                    $(`tr[data-id=${id}]`).remove();
            },
            error: function(error) {
                if(error.status == 422){
                } else {
                    $("#message-container").append(`<div class="alert alert-danger">
                                                        <a class="close" data-dismiss="alert">&times;</a> Error Deleting employee record
                                                    </div>`);
                    fadeMessage();
                }
            }
        });

    }

    function fadeMessage(){
        setTimeout(() => {
            $("#message-container div").fadeOut();
            setTimeout(() => {
                $("#message-container").empty();
            },1000);
        },2500);
    }
</script>
