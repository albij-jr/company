<form id="add-form" class="form" method="POST">
    <div class="form-group row">
        <label for="name" class="col-sm-6 col-md-3 col-lg-3">First name</label>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <input type="text" class="form-control" name="first_name" placeholder="employee fist name" >
            <div id="first_name_error" class="error_div"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-6 col-md-3 col-lg-3">Last Name</label>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <input type="text" class="form-control" name="last_name" placeholder="employee last name" >
            <div id="last_name_error" class="error_div">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-6 col-md-3 col-lg-3">Company Email</label>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <input type="email" class="form-control" name="email" placeholder="Employee email" >
            <div id="email_error" class="error_div">
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
        <div id="fk_company_id_error" class="error_div"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="phone_number" class="col-sm-6 col-md-3 col-lg-3">Employee Phone number</label>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <input type="text" class="form-control" name="phone" placeholder="phone number" >
            <div id="phone_error" class="error_div"></div>
        </div>
    </div>
    <div class="form-group row text-center">
        <input type="submit" class="btn btn-success m-auto" value="Submit">
    </div>

</form>
