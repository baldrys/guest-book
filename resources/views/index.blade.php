@extends('layouts.base')

@section('content')
    <h1 class="text-center">Оставьте сообщение</h1>
    <hr/>
    @include('includes.form-message')
    <h1 class="text-center">Сообщения гостевой книги</h1>
        <div class="messages">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Сообщение</th>
                <th scope="col">Тэги</th>
                <th scope="col">Дата</th>
              </tr>
            </thead>

            <tbody>
              @include('layouts.messages')
            </tbody>
          </table>
        </div>
        @include('layouts.pagination')
@endsection

