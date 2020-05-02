<h1>Редактирование задачи</h1>

<a class="" href="/tasks/index/">К списку задач</a>

<?if(isset($data['result'])):?>
    <div class="alert alert-primary" role="alert">
        <?php print_r($data['result'])?>
    </div>
<?endif;?>

<?if(isset($data['data'])) foreach($data['data'] as $row) {?>
    <form id="newTask" action="/tasks/edit/<?=$row["id"]?>" method="POST">
        <div class="form-group">
            <label for="userName">Имя пользователя</label>
            <input type="text" class="form-control" id="userName" name="userName" value="<?=$row["userName"]?>" disabled>
        </div>
        <div class="form-group">
            <label for="userEmail">Email</label>
            <input type="email" class="form-control" id="userEmail" name="userEmail" value="<?=$row["userEmail"]?>" disabled>
        </div>
        <div class="form-group">
            <label for="taskText">Текст задачи</label>
            <input type="text" class="form-control" id="taskText" name="taskText" value="<?=$row["taskText"]?>">
        </div>
        <div class="form-group">
            <label for="taskStatus">Статус</label>
            <select class="custom-select" id="" name="taskStatus">
                <?if ($row["taskStatus"] == 0):?>
                    <option selected value="0">Не выполнено</option>
                    <option value="1">Выполнено</option>
                <?else:?>
                    <option selected value="1">Выполнено</option>
                    <option value="0">Не выполнено</option>
                <?endif;?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Изменить</button>
    </form>
<?}?>