<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Professor $professor
 * @var string[]|\Cake\Collection\CollectionInterface $careers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $professor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Professors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="professors form content">
            <?= $this->Form->create($professor) ?>
            <fieldset>
                <legend><?= __('Edit Professor') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('career_id', ['options' => $careers, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
