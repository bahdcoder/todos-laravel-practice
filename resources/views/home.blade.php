@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new todo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <ul class="list-group mb-3">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item text-danger">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="/store-todo" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" placeholder="Title" name="title" class="form-control" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <textarea name="description" id="" class="form-control" placeholder="Todo description ..."></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success btn-sm" type="submit">
                                Create Todo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card my-5">
                <ul class="list-group">
                    @foreach($todos as $todo)
                        <li class="list-group-item">
                            {{ $todo->title }}
                            <a href="/delete/{{ $todo->id }}" class="text-white btn btn-sm float-right btn-danger">X</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- <div class="row justify-content-center">
                 <div class="col-md-12">
                    {{ $todos->links() }}
                 </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
