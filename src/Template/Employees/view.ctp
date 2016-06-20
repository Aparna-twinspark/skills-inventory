<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                                <span class="block m-t-xs"> 
                                    <strong class="font-bold">Username</strong>
                                </span> 
                                <span class="text-muted text-xs block">Role
                                    <b class="caret"></b>
                                </span> 
                            </span> 
                        </a>
                    </div>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li> <?= $this->Html->link(__('Dashboard'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
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


    <!-- Mainly scripts--> 

    <?= $this->Html->script('jquery-2.1.1.js'); ?>
    <?= $this->Html->script('bootstrap.min.js'); ?>
    <?= $this->Html->script('jquery.metisMenu.js'); ?>
    <?= $this->Html->script('jquery.slimscroll.min.js'); ?>
    <!-- Custom and plugin javascript -->
    <?= $this->Html->script('inspinia.js') ?>
    <?= $this->Html->script('pace.min.js') ?>