@extends('layouts.main')

@section('content')
<div class="container">


<form action="{{url('/users/'.$users->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}



@include('admin.form',['modo'=>'Editar'])


</div>
@endsection
