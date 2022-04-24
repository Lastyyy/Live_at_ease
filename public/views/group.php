<?php session_start();?>
<div class="group">
    <ul>
        <p><?= $_SESSION['group_name'];?></p>
        <?php if(empty($usersGroup = $_SESSION['usersGroup'])):?>
        <p class="no-users">Brak współlokatorów oraz właściciela w grupie</p>
        <?php else:
        $counter=0;
        foreach($usersGroup as $userDetails):
        if($userDetails->getId()!=$_SESSION['id_user']):
        $counter+=1;?>
        <li>
            <a href="profile?id=<?=$counter-1?>;">
                <img class="avatar" alt="logo" src="public/uploads/<?= $userDetails->getImage();?>">
                <?= $userDetails->getName()." ".$userDetails->getSurname();?>
            </a>
        </li>
        <?php endif;endforeach;endif;?>
    </ul>
</div>
