@extends('layouts.base')

@section('content')
    <h1 class="text-center">Оставьте сообщение</h1>
    <hr/>
    @include('includes.form-message')
    <h1 class="text-center">Сообщения гостевой книги</h1>
    @include('includes.form-search')
    <div id="pagination-messages">
      @include('includes.pagination-messages')
    </div>
@endsection

