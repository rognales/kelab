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
              <table class="table table-striped table-bordered table-list">
                <thead>
                  <tr>
                      <th class=""><em class="fa fa-cog"></em></th>
                      <th class="col col-xs-2">Staff ID</th>
                      <th class="col col-xs-4">Name</th>
                      <th class="col col-xs-4">Email</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($participants as $participant)
                  <tr>
                    <td align="center">
                      <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                      <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                    </td>
                    <td>@if(!$participant->member)
                    <em class="fa fa-users">&nbsp;
                    @endif
                    {{$participant->staff_id}}</td>
                    <td>{{$participant->name}}</td>
                    <td>{{$participant->email}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>

            <div class="panel-footer">
              <div class="row">
                <div class="col col-xs-8">{{ $participants->links() }}
                </div>
                <div class="col col-xs-4">
                  <p class="pull-right">Total records : {{ $participants->total() }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
