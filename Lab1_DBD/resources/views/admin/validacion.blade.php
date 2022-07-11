@extends('admin.usercreate')

@section('validator')


@if ($validator->fails())
<div class="alert alert-danger">
    <ul>
        @foreach ($validator->errors()->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif

@endsection