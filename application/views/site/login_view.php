<div id="contact">
  <h2>Login</h2>
  <?php if(validation_errors()): ?>
    <p><?= validation_errors() ?></p>
  <?php endif; ?>
  
  <?php $attributes = array('id' => 'form-login'); ?>
  <?= form_open('site/login_validation', $attributes) ?>
  <p>Username:
    <?php $username = array('id' => 'username', 'name' => 'username'); ?>
    <?= form_input($username, $this->input->post('username')) ?>
  </p>
  <p>Password:
    <?php $password = array('id' => 'password', 'name' => 'password'); ?>
    <?= form_password($password, $this->input->post('password')) ?>
  </p>
  <p>
    <?= form_submit('submit', 'Submit') ?>
  </p>
  <?= form_close() ?>

  <p>
    Not a member?<br />
   <i><?= anchor('site/signup', 'Sign Up') ?></i>
  </p>
</div>