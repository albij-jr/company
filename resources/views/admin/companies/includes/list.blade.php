<div class="container">
    <div class="row">
        <div>
        <h3>List of All Companies</h3>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <table class="table table-striped table-bordered bulk_action">
                <thead class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                    <tr>
                        <th>S.No</th>
                        <th> Name </th>
                        <th> Logo </th>
                        <th>Email</th>
                        <th> website </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                    @forelse ($companies as $index=>$company)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $company->name }}</td>
                        <td><div class="image-container">
                            <img src="{{ asset('storage/images/companies/'. $company->logo) }}"></div></td>
                        <td>{{ $company->email }}</td>
                        <td><a href="{{ $company->website }}">{{ $company->website }}</a></td>
                        <td> <a class="btn btn-primary" href="{{ route('company.edit',$company->company_id) }}"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-danger btn-xs"
                                        data-toggle="modal" data-target=".bs-example-modal-lg"
                                        id="{{ $company->company_id }}" onclick="onDeleteButton(id)"
                                        title="Delete"><i class="fa fa-trash"></i></button>
                                    </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6"> No record available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="container">
                <div class="row">
                    <div class="ml-auto">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
