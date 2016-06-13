<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Skill'), ['action' => 'edit', $skill->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Skill'), ['action' => 'delete', $skill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skill->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ratings'), ['controller' => 'Ratings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rating'), ['controller' => 'Ratings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="skills view large-9 medium-8 columns content">
    <h3><?= h($skill->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($skill->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Skill Name') ?></th>
            <td><?= h($skill->skill_name) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ratings') ?></h4>
        <?php if (!empty($skill->ratings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Employee Id') ?></th>
                <th><?= __('Skill Id') ?></th>
                <th><?= __('Rating') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($skill->ratings as $ratings): ?>
            <tr>
                <td><?= h($ratings->employee_id) ?></td>
                <td><?= h($ratings->skill_id) ?></td>
                <td><?= h($ratings->rating) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ratings', 'action' => 'view', $ratings->employee_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ratings', 'action' => 'edit', $ratings->employee_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ratings', 'action' => 'delete', $ratings->employee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ratings->employee_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
