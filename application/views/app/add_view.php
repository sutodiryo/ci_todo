<?php
  $options = array(
    1 => 'High',
    2 => 'Medium',
    3 => 'Low'
  );
  
  for($i = 1; $i <= 31; $i++) {
    $day[$i] = $i;
  }
  
  for($i = 1; $i <= 12; $i++) {
    $month[$i] = $i;
  }
  
  $this_year = date('Y');
  for($i = $this_year; $i <= $this_year+20; $i++) {
    $year[$i] = $i;
  }
?>

<div id="contact">
  <h1>ToDo</h1>
  <?php if(validation_errors()): ?>
    <p><?= validation_errors() ?></p>
  <?php endif; ?>
  <?= form_open('app/add_validation') ?>
    <p>Task:
      <?= form_textarea('title', $this->input->post('title')) ?>
    </p>
    <p>Priority:
      <?= form_dropdown('priority', $options) ?>
    </p>
    <p>Deadline:
      <?= form_dropdown('day', $day) ?>
      <?= form_dropdown('month', $month) ?>
      <?= form_dropdown('year', $year) ?>
    </p>
    <?= form_submit('submit', 'Submit') ?>
  <?= form_close() ?>
</div>