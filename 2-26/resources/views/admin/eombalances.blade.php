@extends('admin.layouts.master')

@section('content')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" />
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}" />
@endsection

<div class="row">
    <!-- EomBalances DataTables Start -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="display: flex;">
                    <div style="width: 50%;">
                        <h4 class="card-title">Account EOM Balances</h4>
                        <p class="card-title-desc">List all eom balances for an account</p>
                    </div>
                    <div style="width: 50%;">
                        <div style="float: right">
                            <a class="btn btn-outline-primary" title="Add" data-bs-toggle="modal"
                                data-bs-target="#add-eombalance-modal" id="addEomBalanceBtn">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable-eombalances" class="table dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>For Month</th>
                                <th>Balance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eomBalances as $eomBalance)
                                <tr>
                                    <td data-field="no">{{ $eomBalance->formonth }}</td>
                                    <td data-field="balance">
                                        {{ number_format($eomBalance->eombalance, 2, '.', ',') }}€
                                    </td>
                                    <td style="width: 130px; max-width: 100px">
                                        <a class="btn btn-outline-secondary btn-sm edit" title="Edit"
                                            data-id="{{ $eomBalance->id }}" data-bs-toggle="modal"
                                            data-bs-target="#edit-eombalance-modal">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm delete" title="Delete"
                                            data-id="{{ $eomBalance->id }}" data-bs-toggle="modal"
                                            data-bs-target="#delete-eombalance-modal">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    <!-- EomBalances DataTables End -->
</div> <!-- end row -->

<!-- Add EomBalance Modal Start -->
<div class="modal fade" id="add-eombalance-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add EOM Balance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="add-eombalance-form">
                    <div class="mb-3">
                        <label for="add_formonth">For Month :</label>
                        <input type="text" class="form-control" id="add_formonth" name="add_formonth"
                            placeholder="Enter For Month..." autocomplete="add_formonth"
                            value="{{ old('add_formonth') }}">
                        <div class="text-danger" id="add_formonthError" data-ajax-feedback="add_formonth"></div>
                    </div>
                    <div class="mb-3">
                        <label for="add_eombalance">Balance(€) :</label>
                        <input type="text" class="form-control" id="add_eombalance" name="add_eombalance"
                            placeholder="Enter Balance..." autocomplete="add_eombalance"
                            value="{{ old('add_eombalance') }}">
                        <div class="text-danger" id="add_eombalanceError" data-ajax-feedback="add_eombalance"></div>
                    </div>
                    <button type="submit" class="btn btn-primary d-flex" style="margin: auto">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Add EomBalance Modal End -->

<!-- Edit EomBalance Modal Start -->
<div class="modal fade" id="edit-eombalance-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit EOM Balance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="edit-eombalance-form">
                    <input type="hidden" id="data-id" />
                    <div class="mb-3">
                        <label for="edit_formonth">For Month :</label>
                        <input type="text" class="form-control" id="edit_formonth" name="edit_formonth"
                            placeholder="Enter For Month..." autocomplete="edit_formonth"
                            value="{{ old('edit_formonth') }}">
                        <div class="text-danger" id="edit_formonthError" data-ajax-feedback="edit_formonth"></div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_eombalance">Balance(€) :</label>
                        <input type="text" class="form-control" id="edit_eombalance" name="edit_eombalance"
                            placeholder="Enter balance..." autocomplete="edit_eombalance"
                            value="{{ old('edit_eombalance') }}">
                        <div class="text-danger" id="edit_eombalanceError" data-ajax-feedback="edit_eombalance">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-flex" style="margin: auto">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Edit EomBalance Modal End -->

<!-- Delete EomBalance Modal Start -->
<div class="modal fade" id="delete-eombalance-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <input type="hidden" id="delete-id" />
                <h3 class="m-2" style="text-align: center; font-weight: normal">Are you sure?</h3>
                <h6 class="m-2" style="text-align: center; font-weight: normal">All information related to this
                    EOM balance will be deleted!</h6>
                <div class="d-flex" style="justify-content: center">
                    <button class="btn btn-primary m-1" data-bs-dismiss="modal" id="delete-btn">Yes</button>
                    <button class="btn btn-danger m-1" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Delete EomBalance Modal End -->
@endsection

@section('script')
<script>
    let datatable = null;

    $(document).ready(() => {
        $('#datatable-eombalances .edit').on('click', (e) => {
            const eombalance_id = e.currentTarget.getAttribute('data-id');
            $('#edit-eombalance-modal #data-id').val(eombalance_id);

            $.ajax({
                url: "{{ url('admin/api/eombalances') }}" + `/${eombalance_id}`,
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#edit-eombalance-modal #edit_formonth').val(response.eomBalance
                        .formonth);
                    $('#edit-eombalance-modal #edit_eombalance').val(response.eomBalance
                        .eombalance);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

        $('#datatable-eombalances .delete').on('click', (e) => {
            const eombalance_id = e.currentTarget.getAttribute('data-id');
            $('#delete-eombalance-modal #delete-id').val(eombalance_id);
        });

        $('#add-eombalance-form').on('submit', function(event) {
            event.preventDefault();
            var formonth = $('#add_formonth').val();
            var eombalance = $('#add_eombalance').val();
            $('#add_formonthError').text('');
            $('#add_eombalanceError').text('');

            $.ajax({
                url: "{{ url('admin/api/eombalances') }}",
                type: "POST",
                data: {
                    "formonth": formonth,
                    "eombalance": eombalance,
                    "account_id": "{{ $account_id }}",
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#add_formonthError').text('');
                    $('#add_eombalanceError').text('');

                    toastr.success('Added successfully.');
                    setTimeout(function() {
                        window.location.href = "{{ url('admin/eombalances/') }}" +
                            "/{{ $account_id }}";
                    }, 1000);
                },
                error: function(response) {
                    $('#add_formonthError').text(response.responseJSON.errors.formonth);
                    $('#add_eombalanceError').text(response.responseJSON.errors.eombalance);
                }
            });
        });

        $('#edit-eombalance-form').on('submit', function(event) {
            event.preventDefault();
            const eombalance_id = $('#edit-eombalance-modal #data-id').val();
            var formonth = $('#edit_formonth').val();
            var eombalance = $('#edit_eombalance').val();

            $('#edit_formonthError').text('');
            $('#edit_eombalanceError').text('');

            $.ajax({
                url: "{{ url('admin/api/eombalances') }}" + `/${eombalance_id}`,
                type: "PUT",
                data: {
                    "formonth": formonth,
                    "eombalance": eombalance,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#edit_formonthError').text('');
                    $('#edit_eombalanceError').text('');

                    toastr.success('Updated successfully.');
                    setTimeout(function() {
                        window.location.href = "{{ url('admin/eombalances/') }}" +
                            "/{{ $account_id }}";
                    }, 1000);
                },
                error: function(response) {
                    $('#edit_formonthError').text(response.responseJSON.errors
                        .formonth);
                    $('#edit_eombalanceError').text(response.responseJSON.errors
                        .eombalance);
                }
            });
        });

        $('#delete-eombalance-modal #delete-btn').on('click', () => {
            const eombalanceId = $('#delete-eombalance-modal #delete-id').val();

            $.ajax({
                url: "{{ url('admin/api/eombalances') }}" + `/${eombalanceId}`,
                type: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.isSuccess) {
                        toastr.success('Deleted successfully.');
                        setTimeout(function() {
                            window.location.href =
                                "{{ url('admin/eombalances/') }}" +
                                "/{{ $account_id }}";
                        }, 1000);
                    } else {
                        toastr.error('Delete failed.');
                    }
                },
                error: function(response) {
                    console.log(response);
                    toastr.error('Something went wrong.');
                }
            });
        });

        $('#datatable-eombalances').DataTable();
    });

    function format_value(value) {
        return parseFloat(value).toLocaleString('de-DE', {
            style: 'decimal',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }
</script>
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
@endsection
