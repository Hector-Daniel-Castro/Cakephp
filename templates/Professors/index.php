<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Professor> $professors
 */
?>
<div class="professors index content">
    <?= $this->Html->link(__('New Professor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Professors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('career_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($professors as $professor): ?>
                <tr>
                    <td><?= $this->Number->format($professor->id) ?></td>
                    <td><?= h($professor->name) ?></td>
                    <td><?= $professor->has('career') ? $this->Html->link($professor->career->name, ['controller' => 'Careers', 'action' => 'view', $professor->career->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $professor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $professor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
