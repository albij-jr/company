<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Delete Company Data</h4>

                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the selected company information?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('company.destroy') }}" method="POST">
                    @method('DELETE')
                    @csrf
                <input id="js_company_id" name="company_id" type="hidden">
                <button type="submit" class="btn btn-primary btn-sm">Delete</button>
            </form>
            </div>

        </div>
    </div>
</div>
