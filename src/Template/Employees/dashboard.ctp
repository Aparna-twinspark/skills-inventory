<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
            <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                                <span class="block m-t-xs"> 
                                    <strong class="font-bold"><?php echo $user_name ?><b class="caret"></b></strong>
                                </span> 
                                <span class="text-muted text-xs block">Role
                                    <b class="caret"></b>
                                </span> 
                            </span> 
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Dashboard</a></li>
                            <li class="divider"></li>
                            <li> <?= $this->Html->link(__('Logout'), ['controller' => 'Employees', 'action' => 'login']) ?></li>
                        </ul>
                        </div>
                        <div class="logo-element">
                            ⚡⚡
                        </div>
                        <li class="active">
                            <?= $this->Html->link(__('View your ratings'), ['controller' => 'Ratings', 'action' => 'view'], ['class' => 'nav-label']) ?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Add new'), ['controller' => 'Ratings', 'action' => 'add'], ['class' => 'nav-label']) ?>
                        </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to TwinSpark's Skill Inventory Manager.</span>
                </li>
                <li>
                 <?= $this->Html->link(__('Logout'), ['controller' => 'Employees', 'action' => 'logout'], ['class' => ['fa', 'fa-sign-out']]) ?>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Static Tables</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Basic Table</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table">
                            <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('skills.id') ?></th>
                                <th><?= $this->Paginator->sort('skills.name') ?></th>
                                <th><?= $this->Paginator->sort('ratings.rating') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($employees as $employee): ?>
                                <tr>
                                <td><?= h($employee->id) ?></td>
                                <td><?= h($employee->first_name) ?></td>
                                <td><?= h($employee->last_name) ?></td>
                                <td><?= h($employee->email_address) ?></td>
                                <td><?= h($employee->password) ?></td>
                                <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="paginator">
                    <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
            </div>
            </div>
        </div>
        </div>
        </div>



    <!-- Mainly scripts -->

    <?= $this->Html->script('jquery-2.1.1.js'); ?>
    <?= $this->Html->script('bootstrap.min.js'); ?>
    <?= $this->Html->script('jquery.metisMenu.js'); ?>
    <?= $this->Html->script('jquery.slimscroll.min.js'); ?>
    <!-- Peity -->
    <?= $this->Html->script('jquery.peity.min.js') ?>
    <!-- Custom and plugin javascript -->
    <?= $this->Html->script('inspinia.js') ?>
    <?= $this->Html->script('pace.min.js') ?>
    <!-- iCheck -->    
    <?= $this->Html->script('icheck.min.js') ?>
    <!-- Peity -->    
    <?= $this->Html->script('peity-demo.js') ?>
    
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>