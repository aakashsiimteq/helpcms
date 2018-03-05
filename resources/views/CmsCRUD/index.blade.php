@extends('layouts.default')


@section('content')
  <div class="row mb-5">
    <div class="col mt-3">
      <div class="float-left">
        <h2>Help content CRUD</h2>
      </div>
    </div>
    <div class="col">
      <div class="mt-3">
        <a class="btn btn-success float-right" href="{{ route('cmsCRUD.create') }}"> Create New Help Content</a>
      </div>
    </div>
  </div>

  <div class="row">
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
  </div>

  <table class="table table-bordered table-striped">
    <thead>
      <th># no.</th>
      <th>URL</th>
      <th>Title</th>
      <th width="40%">Content</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach ($content as $row)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $row->url}}</td>
          <td>{{ $row->title}}</td>
          <td>{{ str_limit(strip_tags($row->details), 100, '...')}}</td>
          <td>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('cmsCRUD.show',$row->id) }}">Show</a>
                <a class="dropdown-item" href="{{ route('cmsCRUD.edit',$row->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['cmsCRUD.destroy', $row->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'dropdown-item']) !!}
                {!! Form::close() !!}
              </div>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
    {{-- {!!html_entity_decode($content->body)!!} --}}
   {!! $content->render() !!}
@endsection
