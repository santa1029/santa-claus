@extends('admin.layouts.master')

@section('content')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" />
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}" />
@endsection

<div class="row">
    <!-- Statements DataTables Start -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="display: flex;">
                    <div style="width: 50%;">
                        <h4 class="card-title">Account Statements</h4>
                        <p class="card-title-desc">List all account statements</p>
                    </div>
                    <div style="width: 50%;">
                        <div style="float: right">
                            <label for="select-accounts">Select account</label>&nbsp;
                            <select id="select-accounts" class="form-select" style=" display: unset; width: auto ">
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}"
                                        @if ($account->id == $account_id) selected @endif>{{ $account->mt4_account }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable-account-statements" class="table dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach ($statements as $statement)
                            <tr>
                                <td>{{ $statement['date'] }}</td>
                                <td style="width: 100px; max-width: 200px">
                                    <a class="btn btn-outline-secondary btn-sm view" title="View" target="_blank"
                                        href="{{ url('admin/statement/') . '/' . $statement['id'] }}">
                                        <i class="far fa-file-pdf"></i>&nbsp;&nbsp;View
                                    </a>
                                    <a class="btn btn-outline-danger btn-sm delete" title="Delete"
                                        data-id="{{ $statement['id'] }}" data-bs-toggle="modal"
                                        data-bs-target="#delete-statement-modal">
                                        <i class="fas fa-trash"></i>&nbsp;&nbsp;Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    <!-- Statements DataTables End -->
</div> <!-- end row -->

<!-- Delete Statement Modal Start -->
<div class="modal fade" id="delete-statement-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <input type="hidden" id="delete-id" />
                <h3 class="m-2" style="text-align: center; font-weight: normal">Are you sure?</h3>
                <h6 class="m-2" style="text-align: center; font-weight: normal">All information related to this
                    statement will be deleted!</h6>
                <div class="d-flex" style="justify-content: center">
                    <button class="btn btn-primary m-1" data-bs-dismiss="modal" id="delete-btn">Yes</button>
                    <button class="btn btn-danger m-1" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Delete Statement Modal End -->

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#datatable-account-statements').DataTable();

        $('#select-accounts').change(e => {
            const accountId = e.currentTarget.value;
            window.location.href = "{{ url('admin/statements') }}" + '/' + accountId;
        });

        $('#datatable-account-statements .delete').on('click', (e) => {
            const statementId = e.currentTarget.getAttribute('data-id');
            $('#delete-statement-modal #delete-id').val(statementId);
        });

        $('#delete-statement-modal #delete-btn').on('click', () => {
            const statementId = $('#delete-statement-modal #delete-id').val();

            $.ajax({
                url: "{{ url('admin/api/statement') }}" + `/${statementId}`,
                type: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    toastr.success('Deleted successfully.');
                    setTimeout(function() {
                        window.location.href = "{{ url('admin/statements') }}";
                    }, 1000);
                },
                error: function(response) {
                    console.log(response);
                    toastr.error('Something went wrong.');
                }
            });
        });

    });
</script>
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
@endsection
