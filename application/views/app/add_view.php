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