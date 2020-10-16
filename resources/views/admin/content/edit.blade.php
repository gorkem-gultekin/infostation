@extends('layouts.admin-master')
@section('page-title')
    Edit Content
@endsection
@section('content-active')
    active
@endsection
@section('edit-active')
    active
@endsection
@section('title')
    <h4 class="page-title pull-left">Edit Content</h4>
    <ul class="breadcrumbs pull-left">
        <li><a href="{{route('home')}}">Home</a></li>
        <li><span>Edit Content</span></li>
    </ul>
@endsection
@section('content')

    <div class="main-content-inner">
        @if (session('content-published'))
            <br>
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Notification:</strong>&nbsp;{{ session('content-published') }}
            </div>
            <br>
        @endif
        @if (session('content-delete'))
            <br>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Notification:</strong>&nbsp;{{ session('content-delete') }}
            </div>
            <br>
        @endif
        @if (session('content-edit'))
            <br><div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Notification:</strong>&nbsp;{{ session('content-edit') }}
            </div>
        @endif
        <center>
            @foreach($contents as $content)
                <div class="col-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <form class="was-validated" action="{{route('content-edit',$content->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <img class="img-fluid mr-4" src="{{asset('/uploads/content/').'/'.$content->photo}}"
                                     alt="image" width="80%" height="80%">
                                <div class="form-group">
                                    <p align="left"><label for="example-text-input" class="col-form-label">Title</label>
                                    </p>
                                    <input class="form-control" name="title" type="text" id="example-text-input"
                                           required value="{{$content->title}}">
                                    <div class="invalid-feedback">Please enter title.</div>
                                </div>
                                <div class="form-group">
                                    <p align="left"><label for="exampleFormControlTextarea1">Text</label></p>
                                    <textarea class="form-control" id="editor" name="text" id="exampleFormControlTextarea1" rows="10"
                                              required>{{$content->text}}</textarea>
                                    <div class="invalid-feedback">Please enter content.</div>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="photo" class="custom-file-input" id="validatedCustomFile"
                                    >
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Please select Picture.</div>
                                </div>
                                <div class="form-group">
                                    <p align="center">
                                        <br>
                                        <button type="submit" class="btn btn-rounded btn-success mb-3">Save</button>
                                        <a href="{{route('home')}}"><button type="button" class="btn btn-rounded btn-danger mb-3">Cancel</button>
                                        </a>
                                    </p>
                                </div>
                            </form>
                                <p align="right">
                                <button type="button" class="btn btn-outline-success mb-3"
                                        onclick="location.href='/content-published/{{$content->id}}'">PUBLISH
                                </button>
                                <button type="button" class="btn btn-outline-danger mb-3"
                                        onclick="location.href='/content-delete/{{$content->id}}'">DELETE
                                </button>
                                </p>

                        </div>
                    </div>
                </div>
        @endforeach
    </div>
    </center>
@endsection

