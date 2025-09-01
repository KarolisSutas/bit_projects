@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Confirm delete Book</h1></div>
                <div class="card-body">
                    <form action="{{ route('books-destroy', $book->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <p>Are you sure you want to delete the book titled "<strong>{{ $book->title }}</strong>"?</p>
                        <button type="submit" class="btn btn-danger me-2">Delete</button>
                        <a href="{{ route('books-index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection