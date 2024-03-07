@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
        <div class="card">
            <div class="card-header">Ajax DataTable</div>
            <div class="card-body">
                    <!-- <a class="btn btn-warning"
                       href="{{ route('export') }}">
                              Export Excel Data
                    </a>
                    <a class="btn btn-success"
                       href="{{ route('export-csv') }}">
                              Export Csv Data
                    </a>
                    <a class="btn btn-danger"
                       href="{{ route('export-pdf') }}">
                              Export Pdf Data
                    </a> -->
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Pin Code</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Program</th>
                        <th>Batch</th>
                        <th>Passing Year</th>
                        <th>University</th>
                    </thead>
                </table>
            </div>
        </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#dataTable').DataTable({
           processing: true,
           serverSide: true,
           ajax: '{{ route("user-ajaxtable") }}',
           columns: [
               { data: 'id' },
               { data: 'name' },
               { data: 'email' },
               {data: 'phone'},
               {data: 'address'},
               {data: 'city'},
               {data: 'pincode'},
               {data: 'state'},
               {data: 'country'},
               {data: 'program'},
               {data: 'batch'},
               {data: 'passing_year'},
               {data: 'university'},
           ],
           buttons: [
                    { extend: 'copy',  exportOptions: { modifier: { page: 'all', search: 'none' } } },
                    { extend: 'excel', exportOptions: { modifier: { page: 'all', search: 'none' } } },
                    { extend: 'csv',   exportOptions: { modifier: { page: 'all', search: 'none' } } },
                    { extend: 'pdf',   exportOptions: { modifier: { page: 'all', search: 'none' } } },
                    { extend: 'print', exportOptions: { modifier: { page: 'all', search: 'none' } } },
                ],
        });
    });
</script>
@endpush

