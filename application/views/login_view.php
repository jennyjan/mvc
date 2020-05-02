<h1>Авторизация</h1>

<form id="newUser" action="/users/login" method="POST">
    <?if(isset($data)):?>
        <div class="alert alert-danger" role="alert">
            <?php echo($data)?>
        </div>
    <?endif;?>
    <div class="form-group">
		<label for="">Логин <span class="text-danger">*</span></label>
    	<input type="text" class="form-control" name="login">
	</div>
    <div class="form-group">
		<label for="">Пароль <span class="text-danger">*</span></label>
    	<input type="password" class="form-control" name="password">
	</div>
    <div class="form-group">
        <small class="form-text text-muted">Поля <span class="text-danger">*</span> обязательны для заполнения</small>
    </div>
    <div class="form-group">
		<button type="submit" name="submit" class="btn btn-primary">Войти</button>
	</div>
</form>

