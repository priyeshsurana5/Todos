@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todos App</div>

                <div class="card-body">
                	<h4>Edit Form</h4>
                  <form method="post" action="{{ route('todos.update',$todos->id) }}">
                  	
                  	@method('PUT')
                  	@csrf
					  <div class="mb-3">
					    <label  class="form-label">Title</label>
					      <input type="hidden" name="todos_id"  value="{{$todos->id}}">
					    <input type="text" name="title" class="form-control" value="{{$todos->title}}">
					   
					  </div>
					  <div class="mb-3">
					    <label class="form-label">Description</label>
					   <textarea name="description" class="form-control" cols="5" rows="5">{{$todos->description}}</textarea>
					  </div>
					  <div class="mb-3">
					    <label for="">Status</label>
					  <select class="form-control" name="is_completed">
					  	 <option disabled selected>Select Option</option>
					  	 <option value="1">Completed</option>
					  	 <option value="0">In Completed</option>
					  </select>
					  </div>
					 
					  <button type="submit" class="btn btn-primary">Update</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
