@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
				Edit Todo
				</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<form class="form-horizontal" action="{{ route('todos.update', $todo->id) }}" method="post">
						{!! csrf_field() !!}
						{!! method_field('PUT') !!}
					  <div class="form-group">
						<label for="description" class="col-sm-2 control-label">Description</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="description" value="{{ $todo->description }}" name="description" placeholder="Description">
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
							<label>
							  <input type="checkbox" name="is_completed" value="1" {{ $todo->is_completed == 1 ? 'checked':'' }}> Is completed?
							</label>
							</div>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-primary">Update</button>
						  <a href="{{ route('todos.index') }}" class="btn btn-default">Back</a>
						</div>
					  </div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection