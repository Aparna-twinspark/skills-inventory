<!-- Admin's index page -->

<div id="wrapper">
<!-- Sidebar.-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                                <span class="block m-t-xs"> 
                                    <strong class="font-bold"><?php echo $user_name ?></strong>
                                </span> 
                            </span> 
                        </a>
                    </div>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li> <?= $this->Html->link(__('Dashboard'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
                        <li class="divider"></li>
                        <li> <?= $this->Html->link(__('Logout'), ['controller' => 'Employees', 'action' => 'logout']) ?></li>
                    </ul>
                    <div class="logo-element">
                        ⚡⚡
                    </div>
                </li>
                <li class="active">
                        <?= $this->Html->link(__('Manage Employees'), ['controller' => 'Employees', 'action' => 'index'], ['class' => 'nav-label']) ?>
                </li>
                <li>
                        <?= $this->Html->link(__('Manage Skills'), ['controller' => 'Skills', 'action' => 'index'], ['class' => 'nav-label']) ?>
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
        <?= $this->Flash->render(); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Static Tables</h2>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>All Employees Table</h5>
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
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('Name') ?></th>
                                <th><?= $this->Paginator->sort('email_address') ?></th>
                                <th><?= $this->Paginator->sort('Role') ?></th> 
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($employees as $employee): ?>
                                <tr>
                                <td><?= h($employee->id) ?></td>
                                <td><?= h($employee->name) ?></td>
                                <td><?= h($employee->email) ?></td>
                                <td><?= ($employee->role) ?></td>
                                <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
                                <?= $this->Clever->loginButton('full'); ?>
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
