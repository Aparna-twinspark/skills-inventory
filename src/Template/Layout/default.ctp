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

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.css') ?>

    <!-- Toastr style -->
    <?= $this->Html->css('plugins/toastr/toastr.min.css') ?>

    <!-- Gritter -->
    <!--link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet"-->
    <?= $this->Html->css('animate.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->fetch('meta'); ?>
    <?= $this->fetch('css'); ?>
    <?= $this->fetch('script'); ?>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
        </nav></div>
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <?= $this->fetch('content') ?>
        </div>
        <footer></footer>

</body>
</html>
