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
  <?= form_open('app/edit_validation') ?>
    <?= form_hidden('id', $edit_form->id) ?>
    <p>Task:
      <?= form_textarea('title', $edit_form->title) ?>
    </p>
    <p>
      Priority:
      <?= form_dropdown('priority', $options, $edit_form->priority_id) ?>
    </p>
    <p>Deadline:
      <?= form_dropdown('day', $day, $form_day) ?>
      <?= form_dropdown('month', $month, $form_month) ?>
      <?= form_dropdown('year', $year, $form_year) ?>
    </p>
    <?= form_submit('submit', 'Submit') ?>
  <?= form_close() ?>
</div>