<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ratings'), ['controller' => 'Ratings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rating'), ['controller' => 'Ratings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <h3><?= h($employee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($employee->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($employee->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email Address') ?></th>
            <td><?= h($employee->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($employee->password) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Role') ?></h4>
        <?= $this->Text->autoParagraph(h($employee->role)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ratings') ?></h4>
        <?php if (!empty($employee->ratings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Employee Id') ?></th>
                <th><?= __('Skill Id') ?></th>
                <th><?= __('Rating') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employee->ratings as $ratings): ?>
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
-->






    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li> <?= $this->Html->link(__('Home'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
                                    <li class="divider"></li>
                                    <li> <?= $this->Html->link(__('Logout'), ['controller' => 'Employees', 'action' => 'logout']) ?></li>
                                </ul>
                    </div>
                    <div class="logo-element">
                        ⚡⚡
                    </div>
                </li>

                 <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id], ['class' =>'nav-label'])   ?> </li>
                 <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)], ['class' => 'nav-label']) ?> </li>
                 <li><?= $this->Html->link(__('List Employees'), ['action' => 'index'], ['class' => 'nav-label']) ?> </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                </li>
                <li>
                <i class="fa fa-sign-out"></i><?= $this->Html->link(__('Logout'), ['controller' => 'Employees', 'action' => 'logout']) ?>
                </li>
            </ul>
        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <h2>This is main title</h2>
                </div>
            </div>
            <div class="wrapper wrapper-content">
                 <h4 class="ibox-title"><?= __('Employee Details') ?></h4>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Email Address') ?></th>
                        </tr>
                        <tr>
                            <td><?= h($employee->id) ?></td>       
                            <td><?= h($employee->name) ?></td>
                            <td><?= h($employee->email) ?></td>
                        </tr>
                    </table>
                </div>
                <div class="related">
                <h4 class="ibox-title"><?= __('Related Ratings') ?></h4>
                <div class="ibox-content">
                <table class="table">
                    <tr>
                        <th><?= __('Employee Id') ?></th>
                        <th><?= __('Skill Id') ?></th>
                        <th><?= __('Rating') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($employee->ratings as $ratings): ?>
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
                </div>
            </div>
            </div>
        </div>
        </div>

    <!-- Mainly scripts 
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript 
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
