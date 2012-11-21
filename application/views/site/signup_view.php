<div id="contact">
  <h1>Sign Up</h1>
  <?php if(validation_errors()): ?>
    <p><?= validation_errors() ?></p>
  <?php endif; ?>
  <?= form_open('site/signup_validation') ?>
    <p>Username:
      <?= form_input('username', $this->input->post('username')) ?>
    </p>
    <p>E-mail:
      <?= form_input('email', $this->input->post('email')) ?>
    </p>
    <p>Password:
      <?= form_password('password', $this->input->post('password')) ?>
    </p>
    <p>Confirm Password:
      <?= form_password('cpassword', $this->input->post('cpassword')) ?>
    </p>
    <p>
      <?= form_submit('submit', 'Submit') ?>
    </p>
  <?= form_close() ?>
</div>