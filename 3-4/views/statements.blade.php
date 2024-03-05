@extends('layouts.master')

@section('Kingsley_Markets Main')
@endsection

@section('content')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" />
@endsection
<div class="row">
    <!-- Statements DataTables Start -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="display: flex;">
                    <div style="width: 50%;">
                        <h4 class="card-title">Statements</h4>
                     </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable-statements" class="table dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Account</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statements as $statement)
                                <tr>
                                    <td>{{ $statement['account']['mt4_account'] }}</td>
                                    <td>{{ $statement['date'] }}</td>
                                    <td style="width: 10px; max-width: 100px">
                                        <a class="btn btn-outline-secondary btn-sm view" title="View" target="_blank"
                                            href="statement/{{ $statement['id'] }}">
                                            <i class="far fa-file-pdf"></i>
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
    <!-- Monthly Profit DataTables End -->
</div> <!-- end row -->
@endsection

@section('script')
<script>
    $(document).ready(() => {
        $('#datatable-statements').DataTable();
    })
</script>
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection
