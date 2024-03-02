@extends('admin.layouts.master')

@section('content')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" />
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}" />
    <style>
        .btn-sm.info,
        .btn-sm.edit,
        .btn-sm.delet {
            width: 30px;
        }
    </style>
@endsection

<div class="row">
    <!-- Account DataTables Start -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="display: flex;">
                    <div style="width: 50%;">
                        <h4 class="card-title">Accounts</h4>
                        <p class="card-title-desc">List all accounts</p>
                    </div>
                    <div style="width: 50%;">
                        <div style="float: right">
                            <a class="btn btn-outline-primary btn-lg" title="Add" data-bs-toggle="modal"
                                data-bs-target="#add-account-modal" id="addAccountBtn">
                                <i class="fas fa-user-plus"></i>
                            </a>
                            <a class="btn btn-outline-primary btn-lg" title="Performance" data-bs-toggle="modal"
                                data-bs-target="#add-performance-modal" id="addPerformanceBtn">
                                <i class="bx bx-list-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable-account" class="table dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Account</th>
                                <th>Owner</th>
                                <th>Last Balance</th>
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
    <!-- Account DataTables End -->
</div> <!-- end row -->

<!-- Add Account Modal Start -->
<div class="modal fade" id="add-account-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="add-account-form">
                    <div class="mb-3">
                        <label for="add_accountowner">Owner :</label>
                        <select class="form-select" id="add_accountowner">
                            <option value="">Select</option>
                        </select>
                        <div class="text-danger" id="add_accountownerError" data-ajax-feedback="add_accountowner"></div>
                    </div>

                    <div class="mb-3">
                        <label for="add_accountno">Account No :</label>
                        <input type="text" class="form-control" id="add_accountno" name="add_accountno"
                            placeholder="Enter account no..." autocomplete="add_accountno"
                            value="{{ old('add_accountno') }}">
                        <div class="text-danger" id="add_accountnoError" data-ajax-feedback="add_accountno"></div>
                    </div>

                    <div class="mb-3">
                        <label for="add_accountname">Account Name :</label>
                        <input type="text" class="form-control" id="add_accountname" name="add_accountname"
                            placeholder="Enter account name..." autocomplete="add_accountname"
                            value="{{ old('add_accountname') }}">
                        <div class="text-danger" id="add_accountnameError" data-ajax-feedback="add_accountname"></div>
                    </div>

                    <div class="mb-3">
                        <label for="add_accountpackage">Package :</label>
                        <select class="form-select" id="add_accountpackage">
                            <option value="">Select</option>
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="A3">A3</option>
                            <option value="B1">B1</option>
                            <option value="B2">B2</option>
                            <option value="B3">B3</option>
                        </select>
                        <div class="text-danger" id="add_accountpackageError"
                            data-ajax-feedback="add_accountpackage">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-flex" style="margin: auto">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Add Account Modal End -->

<!-- View Account Modal Start -->
<div class="modal fade" id="view-account-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Account Transactions(the last 6)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="view-account-modal-body">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- View Account Modal End -->

<!-- Edit Account Modal Start -->
<div class="modal fade" id="edit-account-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="edit-account-form">
                    <input type="hidden" id="data-id" />
                    <div class="mb-3">
                        <label for="edit_accountowner">Owner :</label>
                        <select class="form-select" id="edit_accountowner">
                            <option value="">Select</option>
                        </select>
                        <div class="text-danger" id="edit_accountownerError" data-ajax-feedback="edit_accountowner">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_accountno">Account No :</label>
                        <input type="text" class="form-control" id="edit_accountno" name="edit_accountno"
                            placeholder="Enter account no..." autocomplete="edit_accountno"
                            value="{{ old('edit_accountno') }}">
                        <div class="text-danger" id="edit_accountnoError" data-ajax-feedback="edit_accountno"></div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_accountname">Account Name :</label>
                        <input type="text" class="form-control" id="edit_accountname" name="edit_accountname"
                            placeholder="Enter account name..." autocomplete="edit_accountname"
                            value="{{ old('edit_accountname') }}">
                        <div class="text-danger" id="edit_accountnameError" data-ajax-feedback="edit_accountname">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_accountpackage">Package :</label>
                        <select class="form-select" id="edit_accountpackage">
                            <option value="">Select</option>
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="A3">A3</option>
                            <option value="B1">B1</option>
                            <option value="B2">B2</option>
                            <option value="B3">B3</option>
                        </select>
                        <div class="text-danger" id="edit_accountpackageError"
                            data-ajax-feedback="edit_accountpackage">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-flex" style="margin: auto">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Edit Account Modal End -->

<!-- Delete Account Modal Start -->
<div class="modal fade" id="delete-account-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <input type="hidden" id="delete-id" />
                <h3 class="m-2" style="text-align: center; font-weight: normal">Are you sure?</h3>
                <h6 class="m-2" style="text-align: center; font-weight: normal">All information related to this
                    account will be deleted!</h6>
                <div class="d-flex" style="justify-content: center">
                    <button class="btn btn-primary m-1" data-bs-dismiss="modal" id="delete-btn">Yes</button>
                    <button class="btn btn-danger m-1" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Delete Account Modal End -->

<!-- Add Performance Modal Start -->
<div class="modal fade" id="add-performance-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Performance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="add-performance-form">
                    <div class="mb-3">
                        <label for="percentage">Percentage :</label>
                        <input type="number" required step="0.01" class="form-control" id="percentage"
                            placeholder="Enter percentage...">
                        <div class="text-danger" id="percentageError"></div>
                    </div>
                    <button type="submit" class="btn btn-primary d-flex" style="margin: auto">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Add Peformance Modal End -->
@endsection

@section('script')
<script>
    $(document).ready(() => {
        $.ajax({
            url: "{{ url('admin/api/accounts') }}",
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function(response) {
                const {
                    accounts
                } = response;
                let htmlStr = '';
                accounts.map((account, idx) => {
                    htmlStr +=
                        `<tr data-id="${idx}">
                            <td data-field="owner">${account.mt4_account}</td>
                            <td data-field="account">${account.user.name}</td>
                            <td data-field="balance">${account.eombalance.length ? format_value(account.eombalance[account.eombalance.length-1].eombalance) + '€':''}</td>
                            <td style="width: 130px; max-width: 130px">
                                <a class="btn btn-outline-dark btn-sm" title="EOM Balances" href="{{ url('admin/eombalances') }}/${account.id}">
                                    <i class="fas fa-dollar-sign"></i>
                                </a>
                                <a class="btn btn-outline-info btn-sm info" title="Information" data-id="${account.id}" data-bs-toggle="modal" data-bs-target="#view-account-modal">
                                    <i class="fas fa-info"></i>
                                </a>
                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-id="${account.id}" data-bs-toggle="modal" data-bs-target="#edit-account-modal">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-outline-danger btn-sm delete" title="Delete" data-id="${account.id}" data-bs-toggle="modal" data-bs-target="#delete-account-modal">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>`;
                });

                $('#datatable-account tbody').html(htmlStr);

                $('#datatable-account .info').on('click', (e) => {
                    const accountId = e.currentTarget.getAttribute('data-id');

                    $.ajax({
                        url: "{{ url('admin/api/account-transactions') }}" +
                            `/${accountId}`,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            let {
                                transactions,
                            } = response;

                            let htmlStr = '';
                            transactions = transactions.slice(0, 6);
                            transactions.map(transaction => {
                                htmlStr += `<div class="d-flex">
                                                    <div style="width: 30%"><label>${transaction.type}</label></div>
                                                    <div style="width: 30%"><label>${transaction.amount}</label></div>
                                                    <div style="width: 40%"><label>${new Date(transaction.created_at.split('.')[0]).toLocaleString()}</label></div>
                                                </div>`
                            });

                            if (htmlStr) {
                                htmlStr = `<div class="mb-1 d-flex" style="font-size: 16px">
                                                <div style="width: 30%"><label>Type</label></div>
                                                <div style="width: 30%"><label>Balance</label></div>
                                                <div style="width: 40%"><label>Time</label></div>
                                            </div>
                                            ${htmlStr}`
                            } else {
                                htmlStr =
                                    `<label>This account has no transactions yet.</label>`;
                            }
                            $('#view-account-modal-body').html(htmlStr);
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                });

                $('#datatable-account .edit').on('click', (e) => {
                    const accountId = e.currentTarget.getAttribute('data-id');

                    $.ajax({
                        url: "{{ url('admin/api/accounts') }}" + `/${accountId}`,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            const {
                                isSuccess,
                                account
                            } = response;

                            if (isSuccess) {
                                $('#edit-account-modal #edit_accountowner').val(
                                    account.user_id);
                                $('#edit-account-modal #edit_accountno').val(
                                    account.mt4_account);
                                $('#edit-account-modal #edit_accountname').val(
                                    account.name);
                                $('#edit-account-modal #edit_accountpackage')
                                    .val(account.package);
                                $('#edit-account-modal #data-id').val(
                                    accountId);
                            }
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                });

                $('#datatable-account .delete').on('click', (e) => {
                    const accountId = e.currentTarget.getAttribute('data-id');
                    $('#delete-account-modal #delete-id').val(accountId);
                });

                $('#datatable-account').DataTable();
            },
            error: function(response) {
                console.log(response);
            }
        });

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

                $('#add-account-modal #add_accountowner').append(htmlStr);
                $('#edit-account-modal #edit_accountowner').append(htmlStr);
            },
            error: function(response) {
                console.log(response);
            }
        });

        $('#add-account-form').on('submit', function(event) {
            event.preventDefault();
            var owner = $('#add_accountowner').val();
            var accountno = $('#add_accountno').val();
            var accountname = $('#add_accountname').val();
            var package = $('#add_accountpackage').val();

            $('#add_accountownerError').text('');
            $('#add_accountnoError').text('');
            $('#add_accountnameError').text('');
            $('#add_accountpackageError').text('');

            $.ajax({
                url: "{{ url('admin/api/accounts') }}",
                type: "POST",
                data: {
                    "owner": owner,
                    "mt4_account": accountno,
                    "name": accountname,
                    accountname,
                    "package": package,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#add_accountownerError').text('');
                    $('#add_accountnoError').text('');
                    $('#add_accountnameError').text('');
                    $('#add_accountpackageError').text('');

                    toastr.success('Added successfully.');
                    setTimeout(function() {
                        window.location.href = "{{ url('admin/accounts') }}";
                    }, 1000);
                },
                error: function(response) {
                    $('#add_accountownerError').text(response.responseJSON.errors.owner);
                    $('#add_accountnoError').text(response.responseJSON.errors.mt4_account);
                    $('#add_accountnameError').text(response.responseJSON.errors.name);
                    $('#add_accountpackageError').text(response.responseJSON.errors
                        .package);
                }
            });
        });

        $('#edit-account-form').on('submit', function(event) {
            event.preventDefault();
            var owner = $('#edit_accountowner').val();
            var accountno = $('#edit_accountno').val();
            var accountname = $('#edit_accountname').val();
            var package = $('#edit_accountpackage').val();
            var accountId = $('#edit-account-modal #data-id').val();

            $('#edit_accountownerError').text('');
            $('#edit_accountnoError').text('');
            $('#edit_accountnameError').text('');
            $('#edit_accountpackageError').text('');

            $.ajax({
                url: "{{ url('admin/api/accounts') }}" + `/${accountId}`,
                type: "PUT",
                data: {
                    "owner": owner,
                    "mt4_account": accountno,
                    "name": accountname,
                    "package": package,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#edit_accountownerError').text('');
                    $('#edit_accountnoError').text('');
                    $('#edit_accountnameError').text('');
                    $('#edit_accountpackageError').text('');

                    toastr.success('Updated successfully.');
                    setTimeout(function() {
                        window.location.href = "{{ url('admin/accounts') }}";
                    }, 1000);
                },
                error: function(response) {
                    $('#edit_accountownerError').text(response.responseJSON.errors.owner);
                    $('#edit_accountnoError').text(response.responseJSON.errors
                        .mt4_account);
                    $('#edit_accountnameError').text(response.responseJSON.errors.name);
                    $('#edit_accountpackageError').text(response.responseJSON.errors
                        .package);
                }
            });
        });

        $('#addAccountBtn').on('click', () => {
            $('#add-account-modal #add_accountno').val('');
        });

        $('#delete-account-modal #delete-btn').on('click', () => {
            const accountId = $('#delete-account-modal #delete-id').val();

            $.ajax({
                url: "{{ url('admin/api/accounts') }}" + `/${accountId}`,
                type: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.isSuccess) {
                        toastr.success('Deleted successfully.');
                        setTimeout(function() {
                            window.location.href = "{{ url('admin/accounts') }}";
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

        $('#add-performance-form').on('submit', (event) => {
            event.preventDefault();
            const percentage = $('#percentage').val();
            $.ajax({
                url: "{{ url('admin/api/performance') }}",
                type: "POST",
                data: {
                    percentage,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.isSuccess) {
                        toastr.success('Added performance successfully.');
                        setTimeout(function() {
                            window.location.href = "{{ url('admin/accounts') }}";
                        }, 1000);
                    } else {
                        toastr.error('Action failed.');
                    }
                },
                error: function(response) {
                    console.log(response);
                    toastr.error('Something went wrong.');
                }
            });
        });
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
