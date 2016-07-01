<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?= $this->request->params['controller'] ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <?= $this->Html->link(
                $this->request->params['controller'],
                "/".$this->request->params['controller']); ?>
            </li>
            <li class="active">
                <strong><?= ucfirst($this->request->params['action']) ?></strong>
            </li>
        </ol>
    </div>
</div>