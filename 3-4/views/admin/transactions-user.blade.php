@extends('admin.layouts.master')

@section('content')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" />
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}" />
    <!-- Date picker -->
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />
@endsection

<div class="row">
    <!-- User Transactions DataTables Start -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="display: flex;">
                    <div style="width: 50%;">
                        <h4 class="card-title">User Transactions</h4>
                        <p class="card-title-desc">List all user transactions</p>
                    </div>
                    <div style="width: 50%;">
                        <div style="float: right">
                            <a class="btn btn-outline-primary" title="Add" data-bs-toggle="modal"
                                data-bs-target="#add-transaction-modal" id="addTransactionBtn">
                                <i class="fas fa-plus-circle"></i>
                            </a>&nbsp;
                            <label for="select-users">Select User</label>&nbsp;
                            <select id="select-users" class="form-select" style=" display: unset; width: auto ">
                            </select>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable-user-transactions" class="table dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Account</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Note</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    <!-- User Transactions DataTables End -->
</div> <!-- end row -->

<!-- Add Transaction Modal Start -->
<div class="modal fade" id="add-transaction-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="add-transaction-form">
                    <input type="hidden" id="user_id" />
                    <div class="mb-3">
                        <label for="add_account">Account :</label>
                        <select id="add_account" class="form-select">
                        </select>
                        <div class="text-danger" id="add_accountError" data-ajax-feedback="add_account">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="add_type">Type :</label>
                        <select class="form-select" id="add_type">
                            <option value="">Select</option>
                            <option value="deposit">deposit</option>
                            <option value="Fees paid">Fees paid</option>
                            <option value="Referral Fees received">Referral Fees received</option>
                            <option value="withdrawal">withdrawal</option>
                        </select>
                        <div class="text-danger" id="add_typeError" data-ajax-feedback="add_type">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="add_amount">Amount :</label>
                        <input type="text" class="form-control" id="add_amount" name="add_amount"
                            placeholder="Enter amount..." autocomplete="add_amount" value="{{ old('add_amount') }}">
                        <div class="text-danger" id="add_amountError" data-ajax-feedback="add_amount"></div>
                    </div>

                    <div class="mb-3">
                        <label for="add_note">Note :</label>
                        <textarea class="form-control" id="add_note" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Date :</label>
                        <div class="input-group" id="add_date">
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="add_datepicker"
                                data-date-format="yyyy-mm-dd" data-date-container='#add_date' data-provide="datepicker"
                                data-date-autoclose="true">
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                        </div><!-- input-group -->
                        <div class="text-danger" id="add_dateError" data-ajax-feedback="add_date"></div>
                    </div>
                    <button type="submit" class="btn btn-primary d-flex" style="margin: auto">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Add Transaction Modal End -->

<!-- Edit Transaction Modal Start -->
<div class="modal fade" id="edit-transaction-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="edit-transaction-form">
                    <input type="hidden" id="data-id" />
                    <div class="mb-3">
                        <label for="edit_account">Account :</label>
                        <select id="edit_account" class="form-select">
                        </select>
                        <div class="text-danger" id="edit_accountError" data-ajax-feedback="edit_account">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_type">Type :</label>
                        <select class="form-select" id="edit_type">
                            <option value="">Select</option>
                            <option value="deposit">deposit</option>
                            <option value="Fees paid">Fees paid</option>
                            <option value="Referral Fees received">Referral Fees received</option>
                            <option value="withdrawal">withdrawal</option>
                        </select>
                        <div class="text-danger" id="edit_typeError" data-ajax-feedback="edit_type">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_amount">Amount :</label>
                        <input type="text" class="form-control" id="edit_amount" name="edit_amount"
                            placeholder="Enter amount..." autocomplete="edit_amount"
                            value="{{ old('edit_amount') }}">
                        <div class="text-danger" id="edit_amountError" data-ajax-feedback="edit_amount"></div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_note">Note :</label>
                        <textarea class="form-control" id="edit_note" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Date :</label>
                        <div class="input-group" id="edit_date">
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="edit_datepicker"
                                data-date-format="yyyy-mm-dd" data-date-container='#edit_date'
                                data-provide="datepicker" data-date-autoclose="true">
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                        </div><!-- input-group -->
                        <div class="text-danger" id="edit_dateError" data-ajax-feedback="edit_date"></div>
                    </div>
                    <button type="submit" class="btn btn-primary d-flex" style="margin: auto">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Edit Transaction Modal End -->

<!-- Delete Transaction Modal Start -->
<div class="modal fade" id="delete-transaction-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <input type="hidden" id="delete-id" />
                <h3 class="m-2" style="text-align: center; font-weight: normal">Are you sure?</h3>
                <h6 class="m-2" style="text-align: center; font-weight: normal">All information related to this
                    transaction will be deleted!</h6>
                <div class="d-flex" style="justify-content: center">
                    <button class="btn btn-primary m-1" data-bs-dismiss="modal" id="delete-btn">Yes</button>
                    <button class="btn btn-danger m-1" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Delete Transaction Modal End -->
@endsection

@section('script')
<script>
    let datatable = null;

    $(document).ready(() => {
        $.ajax({
            url: "{{ url('admin/api/users') }}",
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function(response) {
                const {
                    users
                } = response;
                let htmlStr = '';
                users.map((user) => {
                    htmlStr += `<option value=${user.id}>${user.name}</option>`;
                });

                $('#select-users').append(htmlStr);
                if (htmlStr)
                    $('#select-users').trigger('change');
            },
            error: function(response) {
                console.log(response);
            }
        });

        $('#select-users').change(e => {
            const userId = e.currentTarget.value;
            if (userId) {
                $('#user_id').val(userId);
                $.ajax({
                    url: "{{ url('admin/api/user-transactions') }}" + `/${userId}`,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        const {
                            transactions,
                            accounts
                        } = response;
                        let htmlStr = '';
                        transactions.map((transaction, idx) => {
                            htmlStr +=
                                `<tr data-id="${idx}">
                                    <td data-field="account">${transaction.account.mt4_account}</td>
                                    <td data-field="type">${transaction.type}</td>
                                    <td data-field="amount">${format_value(transaction.amount)}</td>
                                    <td data-field="note">${transaction.note ? transaction.note : ''}</td>
                                    <td data-field="date">${transaction.date}</td>
                                    <td style="width: 130px; max-width: 100px">
                                        <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-id="${transaction.id}" data-bs-toggle="modal" data-bs-target="#edit-transaction-modal">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm delete" title="Delete" data-id="${transaction.id}" data-bs-toggle="modal" data-bs-target="#delete-transaction-modal">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>`;
                        });

                        if (datatable) {
                            datatable.clear().destroy();
                        }
                        $('#datatable-user-transactions tbody').html(htmlStr);
                        datatable = $('#datatable-user-transactions').DataTable();

                        $('#datatable-user-transactions .edit').on('click', (e) => {
                            const transactionId = e.currentTarget.getAttribute(
                                'data-id');

                            $.ajax({
                                url: "{{ url('admin/api/transactions') }}" +
                                    `/${transactionId}`,
                                type: "GET",
                                data: {
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function(response) {
                                    const {
                                        isSuccess,
                                        transaction
                                    } = response;

                                    if (isSuccess) {
                                        htmlStr =
                                            '<option value="">Select</option>';
                                        accounts.map((account) => {
                                            htmlStr +=
                                                `<option value=${account.id} ${account.id == transaction.account_id ? 'selected' : ''}>${account.mt4_account}</option>`;
                                        });

                                        $('#edit-transaction-modal #edit_account')
                                            .html(htmlStr);
                                        $('#edit-transaction-modal #edit_type')
                                            .val(transaction.type);
                                        $('#edit-transaction-modal #edit_amount')
                                            .val(transaction.amount);
                                        $('#edit-transaction-modal #edit_note')
                                            .val(transaction.note);
                                        $('#edit-transaction-modal #edit_datepicker')
                                            .val(transaction.date);
                                        $('#edit-transaction-modal #data-id')
                                            .val(transactionId);
                                    }
                                },
                                error: function(response) {
                                    console.log(response);
                                }
                            });
                        });

                        $('#datatable-user-transactions .delete').on('click', (e) => {
                            const transactiontId = e.currentTarget.getAttribute(
                                'data-id');
                            $('#delete-transaction-modal #delete-id').val(
                                transactiontId);
                        });

                        datatable = $('#datatable-user-transactions').DataTable();

                        htmlStr = '<option value="">Select</option>';
                        accounts.map((account) => {
                            htmlStr +=
                                `<option value=${account.id}>${account.mt4_account}</option>`;
                        });

                        $('#add_account').html(htmlStr);
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }
        });

        $('#add-transaction-form').on('submit', function(event) {
            event.preventDefault();
            var account_id = $("#add_account").val();
            var type = $('#add_type').val();
            var amount = $('#add_amount').val();
            var note = $('#add_note').val();
            var date = $("#add_datepicker").val();
            var user_id = $('#user_id').val();

            $('#add_accountError').text('');
            $('#add_typeError').text('');
            $('#add_amountError').text('');
            $('#add_dateError').text('');

            $.ajax({
                url: "{{ url('admin/api/user-transactions') }}",
                type: "POST",
                data: {
                    "account_id": account_id,
                    "type": type,
                    "amount": amount,
                    "note": note,
                    "date": date,
                    "user_id": user_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#add_accountError').text('');
                    $('#add_typeError').text('');
                    $('#add_amountError').text('');
                    $('#add_dateError').text('');

                    toastr.success('Added successfully.');
                    setTimeout(function() {
                        window.location.href =
                            "{{ url('admin/transactions/user') }}";
                    }, 1000);
                },
                error: function(response) {
                    $('#add_accountError').text(response.responseJSON.errors.account_id);
                    $('#add_typeError').text(response.responseJSON.errors.type);
                    $('#add_amountError').text(response.responseJSON.errors.amount);
                    $('#add_dateError').text(response.responseJSON.errors.date);
                }
            });
        });

        $('#edit-transaction-form').on('submit', function(event) {
            event.preventDefault();

            var account_id = $("#edit_account").val();
            var type = $('#edit_type').val();
            var amount = $('#edit_amount').val();
            var note = $('#edit_note').val();
            var date = $("#edit_datepicker").val();
            var transaction_id = $('#edit-transaction-modal #data-id').val();

            $('#edit_accountError').text('');
            $('#edit_typeError').text('');
            $('#edit_amountError').text('');
            $('#edit_dateError').text('');

            $.ajax({
                url: "{{ url('admin/api/transactions') }}" + `/${transaction_id}`,
                type: "PUT",
                data: {
                    "account_id": account_id,
                    "type": type,
                    "amount": amount,
                    "note": note,
                    "date": date,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#edit_accountError').text('');
                    $('#edit_typeError').text('');
                    $('#edit_amountError').text('');
                    $('#edit_dateError').text('');

                    toastr.success('Updated successfully.');
                    setTimeout(function() {
                        window.location.href =
                            "{{ url('admin/transactions/user') }}";
                    }, 1000);
                },
                error: function(response) {
                    $('#edit_accountError').text(response.responseJSON.errors.account_id);
                    $('#edit_typeError').text(response.responseJSON.errors.type);
                    $('#edit_amountError').text(response.responseJSON.errors.amount);
                    $('#edit_dateError').text(response.responseJSON.errors.date);
                }
            });
        });

        $('#delete-transaction-modal #delete-btn').on('click', () => {
            const transactionId = $('#delete-transaction-modal #delete-id').val();

            $.ajax({
                url: "{{ url('admin/api/transactions') }}" + `/${transactionId}`,
                type: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.isSuccess) {
                        toastr.success('Deleted successfully.');
                        setTimeout(function() {
                            window.location.href =
                                "{{ url('admin/transactions/user') }}";
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

        function format_value(value) {
            return parseFloat(value).toLocaleString('de-DE', {
                style: 'decimal',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }
    });
</script>
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@endsection
