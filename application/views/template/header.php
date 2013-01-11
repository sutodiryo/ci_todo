<?= doctype('html5') ?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>js/jquery.validate-rules.js"></script>
    <?php if(!isset($header)): ?>
      <title>Simple ToDo</title>
    <?php else: ?>
      <title>Simple ToDo - <?= $header ?></title>
    <?php endif; ?>
  </head>
  <body>
    <?php if($this->session->userdata('username')): ?>
    <div id="nav">
      <ul>
        <li><?= anchor(base_url(), 'Home') ?></li>
        <li><?= anchor('app/user_info', 'My Info') ?></li>
        <li><?= anchor('app/add_todo' , 'Add New Task') ?></li>
        <li> |Hello! <?= $this->session->userdata('username') ?>| </li>
        <li><?= anchor('site/logout', 'Logout') ?></li>
      </ul>
    </div>
    <?php endif; ?>