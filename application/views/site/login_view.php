<div id="contact">
  <h2>Login</h2>
  <?php if(validation_errors()): ?>
    <p><?= validation_errors() ?></p>
  <?php endif; ?>
  
  <?= form_open('site/login_validation') ?>
  <p>Username:
    <?= form_input('username', $this->input->post('username')) ?>
  </p>
  <p>Password:
    <?= form_password('password', $this->input->post('password')) ?>
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