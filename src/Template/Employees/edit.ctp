<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $user_name ?><b class="caret"></b></strong>
                             </span> <span class="text-muted text-xs block">Role<b class="caret"></b></span> </span> </a>
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
                <li>
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
                     <?= $this->Html->link(__('Logout'), ['controller' => 'Employees', 'action' => 'logout'], ['class' => ['fa', 'fa-sign-out']]) ?>
                </li>
            </ul>
        </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Edit Employee</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                            <?= $this->Form->create($employee, ['class' => 'form-horizontal']) ?>
                            <div class="form-group">
                                <div class="form-group"><label class="col-lg-2 control-label">Full Name</label>
                                    <div class="col-lg-8"> 
                                        <?= $this->Form->input('name', ['label'=> false, 'class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group"><label class="col-lg-2 control-label">Email Address</label>
                                    <div class="col-lg-8"> 
                                        <?= $this->Form->input('email',['label' => false, 'class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group"><label class="col-lg-2 control-label">New Password</label>
                                    <div class="col-lg-8"> 
                                        <?= $this->Form->input('password', ['label' => false, 'type' => 'password', 'class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="form-group"><label class="col-lg-2 control-label">Role</label>
                                    <div class="col-sm-8"> 
                                        <?= $this->Form->select('role', ['' => ['admin', 'employee']], ['label' => false, 'class' => ['form-control', 'm-b']]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <?= $this->Form->button('Submit', ['type' => 'submit', 'class' => 'btn btn-sm btn-white']) ?>
                                </div>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>