<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
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
</div>-->





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

                 <li><?= $this->Html->link(__('Edit Rating'), ['action' => 'edit', $employee->id], ['class' =>'nav-label'])   ?> </li>
                 <li><?= $this->Form->postLink(__('Delete Rating'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)], ['class' => 'nav-label']) ?> </li>
                 <li><?= $this->Html->link(__('List Ratings'), ['action' => 'index'], ['class' => 'nav-label']) ?> </li>
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
                            <th><?= __('Employee') ?></th>
                            <th><?= __('Skill') ?></th>
                            <th><?= __('Rating') ?></th>
                        </tr>
                        <tr>
                            <td><?= $rating->has('employee') ? $this->Html->link($rating->employee->id, ['controller' => 'Employees', 'action' => 'view', $rating->employee->id]) : '' ?></td>      
                            <td><?= $rating->has('skill') ? $this->Html->link($rating->skill->id, ['controller' => 'Skills', 'action' => 'view', $rating->skill->id]) : '' ?></td>
                            <td><?= h($rating->rating) ?></td>
                        </tr>
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
