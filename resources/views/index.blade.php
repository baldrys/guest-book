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
                <th scope="col">Сообщение</th>
                <th scope="col">Дата</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>

@endsection