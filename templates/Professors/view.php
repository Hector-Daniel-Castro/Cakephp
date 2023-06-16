<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Professor $professor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Professor'), ['action' => 'edit', $professor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Professor'), ['action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Professors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Professor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="professors view content">
            <h3><?= h($professor->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($professor->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Career') ?></th>
                    <td><?= $professor->has('career') ? $this->Html->link($professor->career->name, ['controller' => 'Careers', 'action' => 'view', $professor->career->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($professor->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
