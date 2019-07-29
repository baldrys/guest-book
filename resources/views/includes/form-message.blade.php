<form method="POST" id="id-form_messages">
    
    <div class="form-group">
        <label for="name">Имя: *</label>
        <input class="form-control" placeholder="Имя" name="username" type="text" id="username">
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input class="form-control" placeholder="E-mail" name="email" type="email" id="email">
    </div>

    <div class="form-group">
        <label for="email">Домашнаяя страница:</label>
        <input class="form-control" placeholder="Домашнаяя страница" name="homepage" type="text" id="email">
    </div>

    <div class="form-group">
        <label for="message">Сообщение: *</label>
        <textarea class="form-control" rows="5" placeholder="Текст сообщения" name="message" cols="50"
                  id="message"></textarea>
    </div>
    
    <div class="form-group">
        <label for="email">Тэги:</label>
        <input class="form-control" placeholder="Тэги" name="tags" type="text" id="tags">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Добавить">
    </div>

</form>