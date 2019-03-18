@extends('layouts.layout')

@section('content')
<form action="/test" enctype="multipart/form-data" method="POST">
    <p>
        <label for="photo">
           <input type="file" name="photos[]" id="photo" multiple>
        </label>
    </p>
    <button>Upload</button>
    {{ csrf_field() }}
</form>
@endsection