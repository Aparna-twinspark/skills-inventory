<div id="wrapper">

    <?= $this->element('sidebar', ['role' => 'employee']) ?>

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
                        <h5>Add new.</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table">
                            <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('Skill Id') ?></th>
                                <th><?= $this->Paginator->sort('Skill') ?></th>
                                <th><?= $this->Paginator->sort('Rating') ?></th>
                                <th class="actions"><?= ('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($ratings as $rating):  ?>                               
                                <tr>
                                <td><?= h($rating->skill->id) ?  : '' ?></td>
                                <td><?= h($rating->skill->name) ? : '' ?></td>
                                <td> <?= h($rating->rating); ?></td>
                                <td class="actions">
                                <?= $this->Html->link('Edit', ['action' => 'edit', $rating->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller'=>'Ratings','action' => 'delete', $rating->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rating->id)]) ?>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
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
