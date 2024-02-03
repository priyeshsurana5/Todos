@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    @if(Session::has('alert-info'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('alert-info') }}
                        </div>
                    @endif
                    <a href="{{ route('todos.create')}}" class="btn btn-primary">Create</a>
                    @if(count($todos) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Completed</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($todos as $todo)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $todo->title }}</td>
                                        <td>{{ $todo->description }}</td>
                                        <td>
                                        	@if($todo->is_completed==1)
                                        	 <a class="btn btn-sm btn-success" href="">Completed</a>
                                        	@else
                                        	 <a class="btn btn-sm btn-info" href="">In-completed</a>
                                        	@endif
                                        </td>
									    <td class="d-flex">
									    <a class="btn btn-sm btn-success mr-2" style="margin-right: 10px;" href="{{ route('todos.edit', $todo->id) }}">Edit</a>
									    <a class="btn btn-sm btn-danger mr-2" style="margin-right: 10px;"  href="{{ route('todos.show', $todo->id) }}">View</a>

									    <form method="post" action="{{ route('todos.destroy',$todo->id) }}">
									        @csrf
									        @method('DELETE')
									        <input type="hidden" name="todos_id" value="{{ $todo->id }}">
									        <button type="submit" class="btn btn-danger mr-2" style="margin-right: 10px;">Delete</button>
									    </form>
									</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4>No Todos Are Created Yet</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
