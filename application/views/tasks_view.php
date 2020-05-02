<div class="row">
    <h1>Задачи</h1>
</div>

<?if(isset($data['result'])) echo($data['result']) ?>
<div class="row">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Имя пользователя
                <a href="<?=$data['hrefSort']?>column=userName&sort=DESC">
                    <svg class="bi bi-arrow-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.646 9.646a.5.5 0 01.708 0L8 12.293l2.646-2.647a.5.5 0 01.708.708l-3 3a.5.5 0 01-.708 0l-3-3a.5.5 0 010-.708z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M8 2.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V3a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                    </svg>
                </a>
                <a href="<?=$data['hrefSort']?>column=userName&sort=ASC">
                    <svg class="bi bi-arrow-up" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L8 3.707 5.354 6.354a.5.5 0 11-.708-.708l3-3z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </th>
            <th scope="col">Email
                <a href="<?=$data['hrefSort']?>column=userEmail&sort=DESC">
                    <svg class="bi bi-arrow-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.646 9.646a.5.5 0 01.708 0L8 12.293l2.646-2.647a.5.5 0 01.708.708l-3 3a.5.5 0 01-.708 0l-3-3a.5.5 0 010-.708z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M8 2.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V3a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                    </svg>
                </a>
                <a href="<?=$data['hrefSort']?>column=userEmail&sort=ASC">
                    <svg class="bi bi-arrow-up" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L8 3.707 5.354 6.354a.5.5 0 11-.708-.708l3-3z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </th>
            <th scope="col">Текст задачи</th>
            <th scope="col">Статус
                <a href="<?=$data['hrefSort']?>column=taskStatus&sort=DESC">
                    <svg class="bi bi-arrow-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.646 9.646a.5.5 0 01.708 0L8 12.293l2.646-2.647a.5.5 0 01.708.708l-3 3a.5.5 0 01-.708 0l-3-3a.5.5 0 010-.708z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M8 2.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V3a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                    </svg>
                </a>
                <a href="<?=$data['hrefSort']?>column=taskStatus&sort=ASC">
                    <svg class="bi bi-arrow-up" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L8 3.707 5.354 6.354a.5.5 0 11-.708-.708l3-3z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?if(isset($data["data"])) foreach($data["data"] as $row) {?>
            <tr>
                <td><?=$row['userName']?></td>
                <td><?=$row['userEmail']?></td>
                <td><?=$row['taskText']?>
                    <?if($row['isCorrectByAdmin']):?>
                        <p class="text-muted">Отредактировано администратором</p>
                    <?endif;?>
                </td>
                <?if($row['taskStatus']):?>
                    <td>Выполнено
                        <svg class="bi bi-check" width="1em" height="1em" viewBox="0 0 16 16" fill="#28a745" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L6.5 10.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                        </svg>
                    </td>
                <?else:?>
                    <td>Не выполнено
                        <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="#ff0606" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
                        </svg>
                    </td>
                <?endif?>
                <td>
                    <?if($_SESSION["login"] == 'admin'): ?>
                        <a class="btn btn-primary" href="/tasks/detail/<?=$row['id']?>">Редактировать</a>
                    <?endif;?>
                </td>
            </tr>
        <?}?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="/tasks/add/">Новая задача</a>
</div>
<div class="paginationList"><?if(isset($data['pagination'])) echo($data['pagination']) ?></div>