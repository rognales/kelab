@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default panel-table">
            <div class="panel-heading">
              <div class="row">
                <div class="col col-xs-6">
                  <h3 class="panel-title">Panel Heading</h3>
                </div>
                <div class="col col-xs-6 text-right">
                  <a href="{{route('registration_create')}}"><button type="button" class="btn btn-sm btn-primary btn-create">Create New</button></a>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <table id="participants-table" class="table table-condensed">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                </thead>
              </table>

            </div>

            <div class="panel-footer">
              <div class="row">
                <div class="col col-xs-8">
                </div>
                <div class="col col-xs-4">
                  <p class="pull-right">Total records :<a href="#edit1" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

@stop

@push('scripts')
<script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
$(function() {
    $('#participants-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('admin_payment_ajax') !!}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush
