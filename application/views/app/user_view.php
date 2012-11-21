<div id="content">
  <p>
    Username:
    <?= $user_info->username ?>
  </p>
  <p>
    E-mail:
    <?= $user_info->email ?>
  </p>
  <p>
    Date Activated:
    <?= $date['day'] ?>.<?= $date['month'] ?>.<?= $date['year'] ?>
    (<?= $date['hour'] ?>h : <?= $date['minute'] ?>min : <?= $date['second'] ?>sec)
  </p>
</div>