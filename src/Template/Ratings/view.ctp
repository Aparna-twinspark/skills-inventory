<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rating'), ['action' => 'edit', $rating->employee_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rating'), ['action' => 'delete', $rating->employee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $rating->employee_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ratings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rating'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ratings view large-9 medium-8 columns content">
    <h3><?= h($rating->employee_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $rating->has('employee') ? $this->Html->link($rating->employee->id, ['controller' => 'Employees', 'action' => 'view', $rating->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Skill') ?></th>
            <td><?= $rating->has('skill') ? $this->Html->link($rating->skill->id, ['controller' => 'Skills', 'action' => 'view', $rating->skill->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Rating') ?></th>
            <td><?= h($rating->rating) ?></td>
        </tr>
    </table>
</div>
