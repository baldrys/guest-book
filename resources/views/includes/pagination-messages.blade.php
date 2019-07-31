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
      @include('includes.messages')
    </tbody>

  </table>
  @include('includes.pagination')
</div>

