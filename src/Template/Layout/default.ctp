<?php
$title = 'TWINSPARK | Skills Invetory Management';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset(); ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> 
        <?= $title; ?>
        <?= $this->fetch('title'); ?>
    </title>
    <?= $this->Html->css('custom.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.css') ?>

    <!-- Toastr style -->
    <?= $this->Html->css('plugins/toastr/toastr.min.css') ?>

    <!-- Gritter -->
    <!--link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet"-->
    <?= $this->Html->css('animate.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('awesome-bootstrap-checkbox') ?>
    <?= $this->fetch('meta'); ?>
    <?= $this->fetch('css'); ?>
    <?= $this->fetch('script'); ?>

</head>

<body>
        <?= $this->fetch('content') ?>
        <div class="footer">
            <div>
                <strong>Copyright</strong> TwinSpark Technology and Consulting LLP &copy; 2014-2015
            </div>
        </div>

</body>
</html>
