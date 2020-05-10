<div class="modal fade edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Data</h4>

                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the selected company information?</p>
            </div>
            <div class="modal-footer">
                <div class="col-12">
                    <form id="edit-form" class="form" method="POST">
                    <input id="edit_employee_id" type="hidden" name="employee_id">
                    <div class="form-group row">
                        <label for="name" class="col-sm-6 col-md-3 col-lg-3">First name</label>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <input type="text" class="form-control" name="first_name" placeholder="employee fist name" >
                            <div id="edit_first_name_error" class="error_div"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-6 col-md-3 col-lg-3">Last Name</label>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <input type="text" class="form-control" name="last_name" placeholder="employee last name" >
                            <div id="edit_last_name_error" class="error_div">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-6 col-md-3 col-lg-3">Company Email</label>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <input type="email" class="form-control" name="email" placeholder="Employee email" >
                            <div id="edit_email_error" class="error_div">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fk_company_id" class="col-sm-6 col-md-3 col-lg-3">Select Company</label>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <select id="fk_company_id" name="fk_company_id" class="form-control select2" >
                            @foreach ($companies as $company)
                                <option value="{{ $company->company_id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                        <div id="edit_fk_company_id_error" class="error_div"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_number" class="col-sm-6 col-md-3 col-lg-3">Employee Phone number</label>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <input type="text" class="form-control" name="phone" placeholder="phone number" >
                            <div id="edit_phone_error" class="error_div"></div>
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <input type="submit" class="btn btn-success m-auto" value="Edit">
                    </div>

                </form>
                </div>

            </div>

        </div>
    </div>
</div>
