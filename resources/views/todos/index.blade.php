@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
				Todo List
					<div class="pull-right">
						<a href="{{ route('todos.create') }}" class="btn btn-primary btn-sm">Add Todo</a>
					</div>
					<div class="clearfix"></div>
				</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<table class="table">
						<thead>
							<th>ID</th>
							<th>Description</th>
							<th>Is Completed?</th>
							<th>Action</th>
						</thead>
						<tbody>
							@forelse ($todos as $todo)
								<td>{{ $todo->id }}</td>
								<td>{{ $todo->description }}</td>
								<td>{{ $todo->is_completed }}</td>
								<td>
									<a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-md btn-success">Edit</a>
									<form style="display:inline" action="{{ route('todos.destroy', $todo->id) }}" onsubmit='return confirm("Are you sure want to delete todo?");' method="post">
										{!! csrf_field() !!}
										{!! method_field('DELETE') !!}
										<input type="submit" class="btn btn-danger" value="Delete" />
									</form>
								</td>
							@empty
								<td colspan="3" class="text-center">No todos</td>
							@endforelse
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection