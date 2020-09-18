@extends('layouts.admin-master')
@section('title')
    <h4 class="page-title pull-left">New Content</h4>
    <ul class="breadcrumbs pull-left">
        <li><a href="{{route('home')}}">Home</a></li>
        <li><span>New Content</span></li>
    </ul>
@endsection
@section('content')
    <div class="col-6 mt-5">
        <div class="card">
            <div class="card-body">
                <form class="was-validated" action="{{route('content-create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Title</label>
                    <input class="form-control" name="title" type="text" id="example-text-input" required>
                    <div class="invalid-feedback">Please enter title.</div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Text</label>
                    <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    <div class="invalid-feedback">Please enter content.</div>
                </div>
                <div class="custom-file">
                    <input type="file" name="photo" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">Please select Picture.</div>
                </div>
                    <div class="form-group">
                        <p align="center">
                            <br><button type="submit" class="btn btn-rounded btn-success mb-3">Save</button>
                            <a href="{{route('home')}}"><button type="button" class="btn btn-rounded btn-danger mb-3">Cancel</button></a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection