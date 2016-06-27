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
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                           <li><a href="profile.html">Dashboard</a></li>
                            <li class="divider"></li>
                            <li><?= $this->Html->link(__('Logout'), ['controller' => 'Employees', 'action' => 'login']) ?></li>

                        </ul>
                    </div>
                    <div class="logo-element">
                        ⚡⚡
                    </div>
                </li>
                <li>
                    <i class="fa fa-diamond"></i>
                    <?= $this->Html->link(__('Home'), ['controller' => 'Ratings', 'action' => 'index'], ['class' => 'nav-label']) ?>
                   <!-- <a href="layouts.html"><i class="fa fa-diamond"></i> <span class="nav-label">Home </span></a>
                --></li>
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
        <?= $this->Flash->render(); ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>New Rating</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <?= $this->Form->create($rating); ?>
                        <h5><?= $this->form->label($rating->skill->name) ?></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group"><label class="col-sm-2 control-label">Rating</label>
                            <div class="col-sm-2">
                                <?= $this->Form->select('rating', ['' => ['','1', '2', '3', '4', '5']], ['label' => false, 'class' => ['form-control', 'm-b'], ]); ?>
                            </div>
                        </div> 
                    <div class="form-group"><br><?= $this->Form->button('submit', ['type' => 'submit', 'class' => 'btn btn-primary block m-b']); ?></div>
                    <?= $this->Form->end() ?>
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
    <!-- Custom and plugin javascript -->
    <?= $this->Html->script('inspinia.js') ?>
    <?= $this->Html->script('pace.min.js') ?>
    <!-- iCheck -->    
    <?= $this->Html->script('icheck.min.js') ?>
    <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>