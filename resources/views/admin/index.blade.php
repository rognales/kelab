@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
          @if (session('status'))
          <div class="alert alert-success">
          {{ session('status') }}
          </div>
          @endif

          <div class="col-md-4">
            <div class="thumbnail">
              <img src="http://placehold.it/320x125/EEE" class="">
              <div class="caption">
                <h4 class="">User</h4>

                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur,
                culpa itaque odio similique suscipit</p>
                <a href="{{route('admin_user')}}" class="btn btn-primary btn-md" role="button">Manage User</a>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail">
              <img src="http://placehold.it/320x125/EEE" class="">
              <div class="caption">
                <h4 class="">Payment</h4>

                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur,
                culpa itaque odio similique suscipit</p>
                <a href="{{route('admin_payment')}}" class="btn btn-primary btn-md" role="button">Update Payment</a>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="thumbnail">
              <img src="http://placehold.it/320x125/EEE" class="">
              <div class="caption">
                <h4 class="">Attendance</h4>

                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur,
                culpa itaque odio similique suscipit</p>
                <a href="{{route('admin_attendance')}}" class="btn btn-primary btn-md" role="button">Manage attendance</a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@push('style')
<style media="screen">
  .panel-table .panel-body{
  padding:0;
  }

  .panel-table .panel-body .table-bordered{
  border-style: none;
  margin:0;
  }

  .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type {
    text-align:center;
    width: 100px;
  }

  .panel-table .panel-body .table-bordered > thead > tr > th:last-of-type,
  .panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
  border-right: 0px;
  }

  .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type,
  .panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
  border-left: 0px;
  }

  .panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td{
  border-bottom: 0px;
  }

  .panel-table .panel-body .table-bordered > thead > tr:first-of-type > th{
  border-top: 0px;
  }

  .panel-table .panel-footer .pagination{
  margin:0;
  }

  /*
  used to vertically center elements, may need modification if you're not using default sizes.
  */
  .panel-table .panel-footer .col{
  line-height: 34px;
  height: 34px;
  }

  .panel-table .panel-heading .col h3{
  line-height: 30px;
  height: 30px;
  }

  .panel-table .panel-body .table-bordered > tbody > tr > td{
  line-height: 34px;
  }

</style>
@endpush
