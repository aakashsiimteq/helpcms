@extends('layouts.default')

@section('content')
  <div class="row mb-5">
    <div class="col mt-3">
      <div class="float-left">
        <h2>Show Help content</h2>
      </div>
    </div>
    <div class="col">

      <div class="mt-3">
        <div class="btn-group float-right" role="group" aria-label="Basic example">
          <a class="btn btn-warning" href="{{ route('cmsCRUD.edit',$content->id) }}">Edit</a>
          {!! Form::open(['method' => 'DELETE','route' => ['cmsCRUD.destroy', $content->id],'style'=>'display:inline']) !!}
          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
          <a class="btn btn-info" href="{{ route('cmsCRUD.index') }}">Go Back</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Url:</strong>
            {{ $content->url}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {{ $content->title}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Content:</strong>
            {!! $content->details !!}
        </div>
    </div>
  </div>
@endsection
