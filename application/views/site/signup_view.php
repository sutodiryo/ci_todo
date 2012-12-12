<div id="contact">
  <h1>Sign Up</h1>
  <?php if(validation_errors()): ?>
    <p><?= validation_errors() ?></p>
  <?php endif; ?>
  <?php $attributes = array('id' => 'form-signup'); ?>
  <?= form_open('site/signup_validation', $attributes) ?>
    <p>Username:
      <?php $username = array('id' => 'username', 'name' => 'username') ?>
      <?= form_input($username, $this->input->post('username')) ?>
    </p>
    <p>E-mail:
      <?php $email = array('id' => 'email', 'name' => 'email') ?>
      <?= form_input('email', $this->input->post('email')) ?>
    </p>
    <p>Password:
      <?php $password = array('id' => 'password', 'name' => 'password'); ?>
      <?= form_password($password, $this->input->post('password')) ?>
    </p>
    <p>Confirm Password:
      <?php $cpassword = array('id' => 'cpassword', 'name' => 'cpassword'); ?>
      <?= form_password($cpassword, $this->input->post('cpassword')) ?>
    </p>
    <p>
      <?= form_submit('submit', 'Submit') ?>
    </p>
  <?= form_close() ?>
</div>