@isset($company)
<form class="form" method="POST" action="{{ route('company.update' ,$company->company_id) }}" enctype="multipart/form-data">
    @method('PUT')
@else
<form class="form" method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
@endisset
    @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-6 col-md-3 col-lg-3">Company name</label>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <input type="text" class="form-control" name="name" placeholder="company-name" @isset($company) value="{{ $company->name }}" @else value="{{ old('name') }}" @endisset required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-6 col-md-3 col-lg-3">Company Email</label>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <input type="text" class="form-control" name="email" placeholder="company email" @isset($company) value="{{ $company->email }}"  @else value="{{ old('email') }}" @endisset required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-6 col-md-3 col-lg-3">Company logo</label>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div id="image-holder">
                <img id="image-holder-img" @isset($company) src="{{ asset('storage/images/companies/'. $company->logo) }}" @else src=""  @endisset onerror="this.src='{{ asset('assets/images/no-image.jpg') }}'">
            </div>
            <input id="logo" type="file" class="form-control hide" name="logo" placeholder="company-logo" accept="image/png,image/jpeg,image/bmp">
            @error('logo')
                <div class="alert alert-danger">{{ $message ."The image must have greater than 100 x 100 dimension" }}</div>
        @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-6 col-md-3 col-lg-3">Company website</label>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <input type="text" class="form-control" name="website" placeholder="http://" @isset($company) value="{{ $company->website }}"  @else value="{{ old('website') }}" @endisset required>
            @error('website')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row text-center">
        <input type="submit" class="btn btn-success m-auto" value="Submit">
    </div>

</form>
