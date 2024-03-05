@extends('layouts.master')

@section('Kingsley_Markets Main')
@endsection

@section('content')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" />
@endsection
<div class="row">
    <!-- Referral Fees DataTables Start -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="display: flex;">
                    <div style="width: 50%;">
                        <h4 class="card-title">Referral Fees</h4>
                        <p class="card-title-desc">List all referral fees</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable-referral-fees" class="table dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Account</th>
                                <th>Amount</th>
                                <th>Note</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($referral_fees as $referral_fee)
                                <tr>
                                    <td>{{ $referral_fee['account']['mt4_account'] }}</td>
                                    <td>{{ $referral_fee['amount'] }}</td>
                                    <td>{{ $referral_fee['note'] }}</td>
                                    <td>{{ $referral_fee['date'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    <!-- Referral Fees DataTables End -->
</div> <!-- end row -->
@endsection

@section('script')
<script>
    $(document).ready(() => {
        $('#datatable-referral-fees').DataTable();
    })
</script>
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection
