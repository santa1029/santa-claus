@extends('layouts.master')

@section('Kingsley_Markets Main')
@endsection

@section('content')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" />
@endsection
<div class="row">
    <!-- Fees DataTables Start -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="display: flex;">
                    <div style="width: 50%;">
                        <h4 class="card-title">Fees</h4>
                        <p class="card-title-desc">List all fees</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable-fees" class="table dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Account</th>
                                <th>Amount</th>
                                <th>Note</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fees as $fee)
                                <tr>
                                    <td>{{ $fee['account']['mt4_account'] }}</td>
                                    <td>{{ $fee['amount'] }}</td>
                                    <td>{{ $fee['note'] }}</td>
                                    <td>{{ $fee['date'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    <!-- Fees DataTables End -->
</div> <!-- end row -->
@endsection

@section('script')
<script>
    $(document).ready(() => {
        $('#datatable-fees').DataTable();
    })
</script>
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection
