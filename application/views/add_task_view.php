<h1>Новая задача</h1>

<?if(isset($data['error'])):?>
    <div class="alert alert-danger" role="alert">
        <?php echo($data['error']['msg'])?>
    </div>
<?endif;?>

<?if(isset($data['result'])):?>
    <div class="alert alert-primary" role="alert">
        <?php echo($data['result']['msg'])?>
    </div>
<?endif;?>

<a class="" href="/tasks/index/">К списку задач</a>

<form id="newTask" action="/tasks/add" method="POST">
    <div class="form-group">
        <label for="userName">Имя пользователя <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="userName" name="userName" required>
    </div>
    <div class="form-group">
        <label for="userEmail">Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control" id="userEmail" name="userEmail" required>
    </div>
    <div class="form-group">
        <label for="taskText">Текст задачи <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="taskText" name="taskText" required>
    </div>
    <div class="form-group">
        <small class="form-text text-muted">Поля <span class="text-danger">*</span> обязательны для заполнения</small>
    </div>
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
    </div>
</form>
