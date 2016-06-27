<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
            <div class="dropdown profile-element">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> 
                        <span class="block m-t-xs"> 
                            <strong class="font-bold">
                                <?php echo $user_name ?><b class="caret"></b>
                            </strong>
                        </span> 
                    </span> 
                </a>
            </div>
            <div class="logo-element">
                ⚡⚡
            </div>
            <li class="active">
                <?= $this->Html->link(__('Skills list'), ['controller' => 'Ratings', 'action' => 'index'], ['class' => 'nav-label']) ?>
            </li>
            <li>
                <?= $this->Html->link(__('My Skills'), ['controller' => 'Ratings', 'action' => 'view'], ['class' => 'nav-label']) ?>
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
            <?= $this->Flash->render(); ?>
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
                    <?php if(!$skills->isEmpty()){
                        ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('Skill Id') ?></th>
                                <th><?= $this->Paginator->sort('Skill') ?></th>
                                <th class="actions"><?= __('Selections') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?= $this->Form->create('Post', array('url' => '/ratings/index')); ?>
                            <?php 

                                foreach ($skills as $skill):  ?>
                                
                                <tr>

                                <td><?= $this->Form->label($skill->id) ?  : '' ?></td>
                                <td><?= $this->Form->label($skill->name) ? : '' ?></td>
                                <td><?= $this->Form->checkbox('user_selected_skills[]', ['hiddenField' => false, 'value' => (int)$skill->id]); ?></td>
                                </tr>
                            <?php endforeach; ?>
 
                            </tbody>
                        </table>
                        <?= $this->Form->button('Add Skills', ['type' => 'submit', 'class' => 'btn btn-primary block m-b']); ?>
                        <?= $this->Form->end(); ?>
                        <?php } else {
                                    echo "All skills already added";
                                } ?>
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