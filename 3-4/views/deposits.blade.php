@extends('layouts.master')

@section('Kingsley_Markets Main')
@endsection

@section('content')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" />
@endsection
<div class="row">
    <!-- Deposits DataTables Start -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="display: flex;">
                    <div style="width: 50%;">
                        <h4 class="card-title">Deposits</h4>
                        <p class="card-title-desc">List all deposits</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable-deposits" class="table dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Account</th>
                                <th>Amount</th>
                                <th>Note</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deposits as $deposit)
                                <tr>
                                    <td>{{ $deposit['account']['mt4_account'] }}</td>
                                    <td>{{ $deposit['amount'] }}</td>
                                    <td>{{ $deposit['note'] }}</td>
                                    <td>{{ $deposit['date'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    <!-- Deposits DataTables End -->
</div> <!-- end row -->
@endsection

@section('script')
<script>
    $(document).ready(() => {
        $('#datatable-deposits').DataTable();
    })
</script>
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection
