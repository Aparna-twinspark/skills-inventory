<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rating'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ratings index large-9 medium-8 columns content">
    <h3><?= __('Ratings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('employee_id') ?></th>
                <th><?= $this->Paginator->sort('skill_id') ?></th>
                <th><?= $this->Paginator->sort('rating') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ratings as $rating): ?>
            <tr>
                <td><?= $rating->has('employee') ? $this->Html->link($rating->employee->id, ['controller' => 'Employees', 'action' => 'view', $rating->employee->id]) : '' ?></td>
                <td><?= $rating->has('skill') ? $this->Html->link($rating->skill->id, ['controller' => 'Skills', 'action' => 'view', $rating->skill->id]) : '' ?></td>
                <td><?= h($rating->rating) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rating->employee_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rating->employee_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rating->employee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $rating->employee_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
