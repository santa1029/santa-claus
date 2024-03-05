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
    <!-- User DataTables Start -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="display: flex;">
                    <div style="width: 50%;">
                        <h4 class="card-title">Users</h4>
                        <p class="card-title-desc">List all users</p>
                    </div>
                    <div style="width: 50%;">
                        <a class="btn btn-outline-primary btn-lg" style="float: right" title="Add"
                            data-bs-toggle="modal" data-bs-target="#add-user-modal" id="addUserBtn">
                            <i class="fas fa-user-plus"></i>
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable-user" class="table dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Account</th>
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
    <!-- User DataTables End -->
</div> <!-- end row -->

<!-- Add User Modal Start -->
<div class="modal fade" id="add-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="add-user-form">
                    <div class="mb-3">
                        <label for="add_username">Name :</label>
                        <input type="text" class="form-control" id="add_username" name="add_username"
                            placeholder="Enter user name..." autocomplete="add_username"
                            value="{{ old('add_username') }}">
                        <div class="text-danger" id="add_usernameError" data-ajax-feedback="add_username"></div>
                    </div>

                    <div class="mb-3">
                        <label for="add_useremail">Email :</label>
                        <input type="text" class="form-control @error('add_useremail') is-invalid @enderror"
                            id="add_useremail" placeholder="Enter user email..." autocomplete="add_useremail"
                            value="{{ old('add_useremail') }}">
                        <div class="text-danger" id="add_useremailError" data-ajax-feedback="add_useremail"></div>
                    </div>

                    <div class="mb-3">
                        <label for="add_userpassword">Password :</label>
                        <input type="password" class="form-control @error('add_userpassword') is-invalid @enderror"
                            id="add_userpassword" placeholder="Enter user password..." autocomplete="add_userpassword">
                        <div class="text-danger" id="add_userpasswordError" data-ajax-feedback="add_userpassword">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="add_userpasswordconfirm">Confirm :</label>
                        <input type="password" class="form-control" id="add_userpasswordconfirm"
                            placeholder="Confirm user password..." autocomplete="add_userpasswordconfirm">
                        <div class="text-danger" id="add_userpasswordconfirmError"
                            data-ajax-feedback="add_userpasswordconfirm"></div>
                    </div>

                    <div class="mb-3">
                        <label>Role :</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="add_roleRadioOptions"
                                id="add_adminRole" value="admin">
                            <label class="form-check-label" for="add_adminRole">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="add_roleRadioOptions"
                                id="add_investorRole" value="investor" checked>
                            <label class="form-check-label" for="add_investorRole">Investor</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-flex" style="margin: auto">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Add User Modal End -->

<!-- View User Modal Start -->
<div class="modal fade" id="view-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="view-user-modal-body">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- View User Modal End -->

<!-- Edit User Modal Start -->
<div class="modal fade" id="edit-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="edit-user-form">
                    <input type="hidden" id="data-id" />
                    <div class="mb-3">
                        <label for="edit_username">Name :</label>
                        <input type="text" class="form-control" id="edit_username" name="edit_username"
                            placeholder="Enter user name..." autocomplete="edit_username"
                            value="{{ old('edit_username') }}">
                        <div class="text-danger" id="edit_usernameError" data-ajax-feedback="edit_username"></div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_useremail">Email :</label>
                        <input type="text" class="form-control @error('edit_useremail') is-invalid @enderror"
                            id="edit_useremail" placeholder="Enter user email..." autocomplete="edit_useremail"
                            value="{{ old('edit_useremail') }}">
                        <div class="text-danger" id="edit_useremailError" data-ajax-feedback="edit_useremail"></div>
                    </div>

                    <div class="form-check form-switch mb-3" dir="ltr">
                        <input class="form-check-input" type="checkbox" id="changePasswordSwitch">
                        <label class="form-check-label" for="changePasswordSwitch">Change password</label>
                    </div>

                    <div class="mb-3 password-section" style="display: none;">
                        <label for="edit_userpassword">Password :</label>
                        <input type="password" class="form-control @error('edit_userpassword') is-invalid @enderror"
                            id="edit_userpassword" placeholder="Enter user password..."
                            autocomplete="edit_userpassword">
                        <div class="text-danger" id="edit_userpasswordError" data-ajax-feedback="edit_userpassword">
                        </div>
                    </div>

                    <div class="mb-3 password-section" style="display: none;">
                        <label for="edit_userpasswordconfirm">Confirm :</label>
                        <input type="password" class="form-control" id="edit_userpasswordconfirm"
                            placeholder="Confirm user password..." autocomplete="edit_userpasswordconfirm">
                        <div class="text-danger" id="edit_userpasswordconfirmError"
                            data-ajax-feedback="edit_userpasswordconfirm"></div>
                    </div>

                    <div class="mb-3">
                        <label>Role :</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="edit_roleRadioOptions"
                                id="edit_adminRole" value="admin">
                            <label class="form-check-label" for="edit_adminRole">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="edit_roleRadioOptions"
                                id="edit_investorRole" value="investor" checked>
                            <label class="form-check-label" for="edit_investorRole">Investor</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-flex" style="margin: auto">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Edit User Modal End -->

<!-- Delete User Modal Start -->
<div class="modal fade" id="delete-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title" style="text-align: center">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <div class="modal-body">
                <input type="hidden" id="delete-id" />
                <h3 class="m-2" style="text-align: center; font-weight: normal">Are you sure?</h3>
                <h6 class="m-2" style="text-align: center; font-weight: normal">All information related to this
                    user will be
                    deleted!</h6>
                <div class="d-flex" style="justify-content: center">
                    <button class="btn btn-primary m-1" data-bs-dismiss="modal" id="delete-btn">Yes</button>
                    <button class="btn btn-danger m-1" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Delete User Modal End -->

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
                    <input type="hidden" id="account-id" />
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

                    <div class="form-check form-switch mb-3" dir="ltr">
                        <input class="form-check-input" type="checkbox" id="changeaccountPasswordSwitch" />
                        <label class="form-check-label" for="changeaccountPasswordSwitch">Change password</label>
                    </div>

                    <div class="mb-3 password-section" style="display: none;">
                        <label for="edit_accountpassword">Password :</label>
                        <input type="password"
                            class="form-control @error('edit_accountpassword') is-invalid @enderror"
                            id="edit_accountpassword" placeholder="Enter account password..."
                            autocomplete="edit_accountpassword">
                        <div class="text-danger" id="edit_accountpasswordError"
                            data-ajax-feedback="edit_accountpassword">
                        </div>
                    </div>

                    <div class="mb-3 password-section" style="display: none;">
                        <label for="edit_accountpasswordconfirm">Confirm :</label>
                        <input type="password" class="form-control" id="edit_accountpasswordconfirm"
                            placeholder="Confirm account password..." autocomplete="edit_accountpasswordconfirm">
                        <div class="text-danger" id="edit_accountpasswordconfirmError"
                            data-ajax-feedback="edit_accountpasswordconfirm"></div>
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
@endsection

@section('script')
<script>
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
                users.map((user, idx) => {
                    let accountStr = '';
                    user.accounts.map(account => {
                        accountStr += (
                            `<a href="#" title="${account.name || ''}" class="account_edit" data-id="${account.id}"" data-bs-toggle="modal" data-bs-target="#edit-account-modal">${account.mt4_account}</a>&nbsp;`
                        );
                    });

                    htmlStr +=
                        `<tr data-id="${idx}">
                            <td data-field="name">${user.name}</td>
                            <td data-field="email">${user.email}</td>
                            <td data-field="account">${accountStr}</td>
                            <td style="width: 130px; max-width: 130px">
                                <a class="btn btn-outline-info btn-sm info" title="Information" data-id="${user.id}" data-bs-toggle="modal" data-bs-target="#view-user-modal">
                                    <i class="fas fa-info"></i>
                                </a>
                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-id="${user.id}" data-bs-toggle="modal" data-bs-target="#edit-user-modal">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-outline-danger btn-sm delete" title="Delete" data-id="${user.id}" data-bs-toggle="modal" data-bs-target="#delete-user-modal">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>`;
                });

                $('#datatable-user tbody').html(htmlStr);

                $('#datatable-user .info').on('click', (e) => {
                    const userId = e.currentTarget.getAttribute('data-id');

                    $.ajax({
                        url: "{{ url('admin/api/users') }}" + `/${userId}`,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            const {
                                isSuccess,
                                user
                            } = response;

                            if (isSuccess) {
                                let htmlStr = '';
                                let total = 0;

                                user.accounts.map(account => {
                                    const eombalance = account
                                        .eombalance.length ? account
                                        .eombalance[account.eombalance
                                            .length - 1].eombalance : 0;
                                    total += eombalance;
                                    htmlStr += `<div class="d-flex">
                                                    <div style="width: 50%"><label>${account.mt4_account}</label></div>
                                                    <div style="width: 50%"><label>${format_value(eombalance)}€</label></div>
                                                </div>`
                                });

                                if (htmlStr) {
                                    htmlStr = `<div class="mb-1 d-flex" style="font-size: 16px">
                                                <div style="width: 50%"><label>Account</label></div>
                                                <div style="width: 50%"><label>Balance</label></div>
                                            </div>
                                            ${htmlStr}
                                            <hr />
                                            <div class="d-flex">
                                                <div style="width: 50%"><label>Total</label></div>
                                                <div style="width: 50%"><label>${format_value(total)}€</label></div>
                                            </div>`
                                } else {
                                    htmlStr =
                                        `<label>This user has no accounts yet.</label>`;
                                }
                                $('#view-user-modal-body').html(htmlStr);
                            }
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                });

                $('#datatable-user .edit').on('click', (e) => {
                    const userId = e.currentTarget.getAttribute('data-id');

                    $.ajax({
                        url: "{{ url('admin/api/users') }}" + `/${userId}`,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            const {
                                isSuccess,
                                user
                            } = response;

                            if (isSuccess) {
                                $('#edit-user-modal #edit_username').val(user
                                    .name);
                                $('#edit-user-modal #edit_useremail').val(user
                                    .email);
                                $('#edit-user-modal #edit_userpassword').val(
                                    '');
                                $('#edit-user-modal #data-id').val(userId);
                                if (user.admin)
                                    $('#edit_adminRole').click();
                                else if (user.trader)
                                    $('#edit_investorRole').click();
                            }
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                });

                $('#datatable-user .delete').on('click', (e) => {
                    const userId = e.currentTarget.getAttribute('data-id');
                    $('#delete-user-modal #delete-id').val(userId);
                });

                $('#datatable-user .account_edit').on('click', (e) => {
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
                                $('#edit-account-modal #edit_accountpassword')
                                    .val('');
                                $('#edit-account-modal #account-id').val(
                                    accountId);
                            }
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                });

                $('#datatable-user').DataTable();
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

                $('#edit-account-modal #edit_accountowner').append(htmlStr);
            },
            error: function(response) {
                console.log(response);
            }
        });

        $('#add-user-form').on('submit', function(event) {
            event.preventDefault();
            var username = $('#add_username').val();
            var useremail = $('#add_useremail').val();
            var password = $('#add_userpassword').val();
            var password_confirm = $('#add_userpasswordconfirm').val();
            var role = $('input[name="add_roleRadioOptions"]:checked').val();

            $('#add_usernameError').text('');
            $('#add_useremailError').text('');
            $('#add_userpasswordError').text('');
            $('#add_userpasswordconfirmError').text('');

            $.ajax({
                url: "{{ url('admin/api/users') }}",
                type: "POST",
                data: {
                    "user_name": username,
                    "email": useremail,
                    "user_password": password,
                    "user_password_confirmation": password_confirm,
                    "user_role": role,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#add_usernameError').text('');
                    $('#add_useremailError').text('');
                    $('#add_userpasswordError').text('');
                    $('#add_userpasswordconfirmError').text('');

                    toastr.success('Added successfully.');
                    setTimeout(function() {
                        window.location.href = "{{ route('root') }}";
                    }, 1000);
                },
                error: function(response) {
                    $('#add_usernameError').text(response.responseJSON.errors.user_name);
                    $('#add_useremailError').text(response.responseJSON.errors.email);
                    $('#add_userpasswordError').text(response.responseJSON.errors
                        .user_password);
                    $('#add_userpasswordconfirmError').text(response.responseJSON.errors
                        .user_password_confirmation);
                }
            });
        });

        $('#edit-user-form').on('submit', function(event) {
            event.preventDefault();
            var username = $('#edit_username').val();
            var useremail = $('#edit_useremail').val();
            var password = $('#edit_userpassword').val();
            var password_confirm = $('#edit_userpasswordconfirm').val();
            var role = $('input[name="edit_roleRadioOptions"]:checked').val();
            var userId = $('#edit-user-modal #data-id').val();

            $('#edit_usernameError').text('');
            $('#edit_useremailError').text('');
            $('#edit_userpasswordError').text('');
            $('#edit_userpasswordconfirmError').text('');

            $.ajax({
                url: "{{ url('admin/api/users') }}" + `/${userId}`,
                type: "PUT",
                data: {
                    "user_name": username,
                    "email": useremail,
                    "changePassword": $('#edit-user-modal #changePasswordSwitch')[0].checked,
                    "user_password": password,
                    "user_password_confirmation": password_confirm,
                    "user_role": role,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#edit_usernameError').text('');
                    $('#edit_useremailError').text('');
                    $('#edit_userpasswordError').text('');
                    $('#edit_userpasswordconfirmError').text('');

                    toastr.success('Updated successfully.');
                    setTimeout(function() {
                        window.location.href = "{{ route('root') }}";
                    }, 1000);
                },
                error: function(response) {
                    $('#edit_usernameError').text(response.responseJSON.errors.user_name);
                    $('#edit_useremailError').text(response.responseJSON.errors.email);
                    $('#edit_userpasswordError').text(response.responseJSON.errors
                        .user_password);
                    $('#edit_userpasswordconfirmError').text(response.responseJSON.errors
                        .user_password_confirmation);
                }
            });
        });

        $('#edit-user-modal #changePasswordSwitch').change(e => {
            $('#edit-user-modal .password-section').toggle();
        });

        $('#edit-account-modal #changeaccountPasswordSwitch').change(e => {
            $('#edit-account-modal .password-section').toggle();
        });

        $('#delete-user-modal #delete-btn').on('click', () => {
            const userId = $('#delete-user-modal #delete-id').val();
            $.ajax({
                url: "{{ url('admin/api/users') }}" + `/${userId}`,
                type: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.isSuccess) {
                        toastr.success('Deleted successfully.');
                        setTimeout(function() {
                            window.location.href = "{{ route('root') }}";
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

        $('#edit-account-form').on('submit', function(event) {
            event.preventDefault();
            var owner = $('#edit_accountowner').val();
            var accountno = $('#edit_accountno').val();
            var accountname = $('#edit_accountname').val();
            var password = $('#edit_accountpassword').val();
            var password_confirm = $('#edit_accountpasswordconfirm').val();
            var package = $('#edit_accountpackage').val();
            var accountId = $('#edit-account-modal #account-id').val();

            $('#edit_accountownerError').text('');
            $('#edit_accountnoError').text('');
            $('#edit_accountnameError').text('');
            $('#edit_accountpasswordError').text('');
            $('#edit_accountpasswordconfirmError').text('');
            $('#edit_accountpackageError').text('');

            $.ajax({
                url: "{{ url('admin/api/accounts') }}" + `/${accountId}`,
                type: "PUT",
                data: {
                    "owner": owner,
                    "mt4_account": accountno,
                    "name": accountname,
                    "password": password,
                    "password_confirmation": password_confirm,
                    "package": package,
                    "changePassword": $('#edit-account-modal #changeaccountPasswordSwitch')[0]
                        .checked,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#edit_accountownerError').text('');
                    $('#edit_accountnoError').text('');
                    $('#edit_accountnameError').text('');
                    $('#edit_accountpasswordError').text('');
                    $('#edit_accountpasswordconfirmError').text('');
                    $('#edit_accountpackageError').text('');

                    toastr.success('Updated successfully.');
                    setTimeout(function() {
                        window.location.href = "{{ route('root') }}";
                    }, 1000);
                },
                error: function(response) {
                    $('#edit_accountownerError').text(response.responseJSON.errors.owner);
                    $('#edit_accountnoError').text(response.responseJSON.errors
                        .mt4_account);
                    $('#edit_accountnameError').text(response.responseJSON.errors.name);
                    $('#edit_accountpasswordError').text(response.responseJSON.errors
                        .password);
                    $('#edit_accountpasswordconfirmError').text(response.responseJSON.errors
                        .password_confirmation);
                    $('#edit_accountpackageError').text(response.responseJSON.errors
                        .package);
                }
            });
        });

        $('#addUserBtn').on('click', () => {
            $('#add-user-modal #add_username').val('');
            $('#add-user-modal #add_userpassword').val('');
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
