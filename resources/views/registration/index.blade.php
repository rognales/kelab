@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Registration</div>

                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{route('registration_create')}}">
                      {{csrf_field()}}
                      <fieldset>
                        <legend>Participant</legend>

                        <div class="form-group">
                          <label for="staff_id" class="col-sm-2 control-label">Staff id</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="staff_id" name="staff_id" value="{{old('staff_id')}}" placeholder="TM12345">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 control-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Ali Bin Abu">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="email" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="kelab@tm.com.my">
                          </div>
                        </div>
                      </fieldset>
                      <fieldset id="dependant_set">
                        <legend>Dependant</legend>
                        <div class="form-group" name="dependants_header">
                          <div class="col-sm-2">
                            <label>Relationship</label>
                          </div>
                          <div class="col-sm-9">
                            <label>Name</label>
                          </div>
                        </div>
                        <div id="dependant_list" class="form-group">
                          <div class="col-sm-2">
                            <select class="form-control col-sm-2" name="dependant_relationship[]">
                              <option value="spouse">Spouse</option>
                              <option value="child">Child</option>
                              <option value="infant">Infant</option>
                              <option value="others">Others</option>
                            </select>
                          </div>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="dependant_name[]" placeholder="Ali Bin Abu">
                          </div>
                        </div>
                      </fieldset>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="button" id="add_dependant" class="btn btn-default">Add</button>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                      </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    //dynamically add dependant form
    $( "#add_dependant" ).click(function() {
      $( "#dependant_list" ).clone().find('input').val('').end().appendTo( "#dependant_set" );
    });

  });
</script>
@endpush
