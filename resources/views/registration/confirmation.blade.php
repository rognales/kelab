@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Confirmation Page</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
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

                  <div class="col-sm-12">
                    <p><strong>Staff ID :</strong> {{$participant->staff_id}}</p>
                    <p><strong>Name :</strong> {{$participant->name}}</p>
                    <p><strong>Email :</strong> {{$participant->email}}</p>

                    @if ($participant->dependants->count() > 0)
                    <table class="table">
                      <thead>
                        <th class="col-sm-2">Relationship</th>
                        <th>Name</th>
                      </thead>
                      <tbody>
                        @foreach ($participant->dependants as $dependant)
                        <tr>
                          <td>{{$dependant['relationship']}}</td>
                          <td>{{$dependant['name']}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @endif
                    @if (isset($qr))
                    <img class="media-object" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($qr)) !!} ">
                    <p><button type="button" name="button">Print</button></p>

                    <a href="{{$qr}}">QR</a>
                    @endif
                    </div>

            </div>
        </div>
    </div>
</div>

@endsection
