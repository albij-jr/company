<div class="container">
    <div class="row">
        <div>
        <h3>List of All Employees</h3>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <table class="table table-striped table-bordered bulk_action">
                <thead class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                    <tr>
                        <th>S.No</th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> company </th>
                        <th> phone </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                    @forelse ($employees as $index=>$employee)
                    <tr data-id="{{ $employee->employee_id }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->company->name }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>
                        <button type="button" class="btn btn-primary btn-xs"
                                        data-toggle="modal" data-target=".edit-modal"
                                        onclick="onEditClick({{ json_encode($employee) }})"
                                        title="Edit"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-xs"
                                        data-toggle="modal" data-target=".delete-modal"
                                        id="{{ $employee->employee_id }}" onclick="onDeleteClick(id)"
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
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
