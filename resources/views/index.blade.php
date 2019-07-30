@extends('layouts.base')

@section('content')
    <h1 class="text-center">Оставьте сообщение</h1>
    <hr/>
    @include('includes.alerts-block')
    @include('includes.form-message')
    <h1 class="text-center">Сообщения гостевой книги</h1>
        <div class="messages">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Имя</th>
                <th scope="col">Сообщение</th>
                <th scope="col">Тэги</th>
                <th scope="col">Дата</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($messages as $message)
                @include('layouts.message')
              @endforeach
            </tbody>
          </table>
        </div>

@endsection