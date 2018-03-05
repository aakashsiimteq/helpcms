@extends('layouts.default')

@section('content')
  <div class="row mb-5">
    <div class="col mt-3">
      <div class="float-left">
        <h2>Edit help content</h2>
      </div>
    </div>
    <div class="col">
      <div class="mt-3">
        <a class="btn btn-info float-right" href="{{ route('cmsCRUD.index') }}"> Back to home page</a>
      </div>
    </div>
  </div>

  @if (count($errors) > 0)
     <div class="alert alert-danger">
         <strong>Whoops!</strong> There were some problems with your input.<br><br>
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
   @endif

   {!! Form::model($content, ['method' => 'PATCH','route' => ['cmsCRUD.update', $content->id]]) !!}
        @include('cmsCRUD.form')
   {!! Form::close() !!}
@endsection
