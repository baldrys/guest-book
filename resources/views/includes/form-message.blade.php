<form id="form_messages" data-url="{{ route('postajax')}}">
    @csrf

    <div class="form-group">
        <label for="name">Имя: *</label>
        <input class="form-control" placeholder="Имя" name="username" type="text" id="username" value = "{{ Request::old('username') }}">
    </div>

    <div class="form-group">
        <label for="email">E-mail: *</label>
        <input class="form-control" placeholder="E-mail" name="email" type="email" id="email" value = "{{ Request::old('email') }}">
    </div>

    <div class="form-group">
        <label for="email">Домашнаяя страница:</label>
        <input class="form-control" placeholder="Url" name="homepage" type="text" id="homepage" value = "{{ Request::old('homepage') }}">
    </div>

    <div class="form-group">
        <label for="message">Сообщение: *</label>
        <textarea class="form-control" rows="5" placeholder="Текст сообщения" name="message" cols="50"
                  id="message" value = "{{ Request::old('message') }}"></textarea>
    </div>
    
    <div class="form-group">
        <label for="email">Тэги:</label>
        <input class="form-control" placeholder="Список тэгов через пробел" name="tags" type="text" id="tags" value = "{{ Request::old('tags') }}">
    </div>

    <div class="form-group">
        <label for="captcha">Капча: *</label>
        
        <div class="row">
            <div class="col-md-6 captcha">
                <span>{{ captcha_img() }}</span>     
            <button class="btn btn-primary btn-refresh" type="button" formaction="{{ route('refresh') }}">Обновить</button>
            </div>

        </div>


  
        <input class="form-control" placeholder="Введите капчу" name="captcha" type="text" id="captcha" value = "{{ Request::old('tags') }}">
    </div>
    

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Добавить">
    </div>

</form>