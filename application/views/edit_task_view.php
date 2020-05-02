<h1>Редактирование задачи</h1>

<?if(isset($data['error'])):?>
    <div class="alert alert-danger" role="alert">
        <?php echo($data['error']['msg'])?>
    </div>
<?endif;?>

<?if(isset($data['result'])):?>
    <div class="alert alert-primary" role="alert">
        <?php print_r($data['result'])?>
    </div>
<?endif;?>

<a class="" href="/tasks/index/">К списку задач</a>

<?if(isset($data['data'])) foreach($data['data'] as $row) {?>
    <form id="newTask" action="/tasks/detail/<?=$row["id"]?>" method="POST">
        <div class="form-group">
            <label for="userName">Имя пользователя</label>
            <input type="text" class="form-control" id="userName" name="userName" value="<?=$row["userName"]?>">
        </div>
        <div class="form-group">
            <label for="userEmail">Email</label>
            <input type="email" class="form-control" id="userEmail" name="userEmail" value="<?=$row["userEmail"]?>">
        </div>
        <div class="form-group">
            <label for="taskText">Текст задачи</label>
            <input type="text" class="form-control" id="taskText" name="taskText" value="<?=$row["taskText"]?>">
        </div>
        <div class="form-group">
            <label for="taskStatus">Статус</label>
            <input type="text" class="form-control" id="taskStatus" name="taskStatus" value="<?=$row["taskStatus"]?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Изменить</button>
    </form>
<?}?>