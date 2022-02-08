<div class="group">

    <ul>
        <?php if(empty($usersGroup = $_SESSION["usersGroup"])):?>
        <p>Brak współlokatorów w grupie</p>
        <?php else:
        foreach($usersGroup as $userDetails):?>
        <li>
            <img class="avatar" alt="logo" src="public/uploads/<?= $userDetails->getImage();?>">
            <?= $userDetails->getName()." ".$userDetails->getSurname();?>
        </li>
        <?php endforeach;endif;?>
    </ul>
</div>
