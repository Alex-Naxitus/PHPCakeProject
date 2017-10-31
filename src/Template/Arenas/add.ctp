<div class="Players form">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')); ?>
    <?= $this->Form->end() ?>
</div>



