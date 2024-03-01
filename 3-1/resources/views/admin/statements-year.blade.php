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
                        <h4 class="card-title">Account Yearly Statements</h4>
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
                            <tr>
                                <td>{{ (new DateTime())->format('Y-m-d H:i:s') }}</td>
                                <td style="width: 100px; max-width: 200px">
                                    <a class="btn btn-outline-secondary btn-sm view" title="View" target="_blank"
                                        href="{{ url('admin/statement-year/') . '/' . $account_id}}">
                                        <i class="far fa-file-pdf"></i>&nbsp;&nbsp;View
                                    </a>
                                </td>
                            </tr>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    <!-- Statements DataTables End -->
</div> <!-- end row -->

@endsection

@section('script')
<script>
    $(document).ready(function() {
        // $('#datatable-account-statements').DataTable();

        $('#select-accounts').change(e => {
            const accountId = e.currentTarget.value;
            window.location.href = "{{ url('admin/statements-year') }}" + '/' + accountId;
        });

    });
</script>
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/toastr/toastr.min.js') }}"></script>
@endsection
