<?= $this->Html->docType(); ?>
<?
$title = 'TWINSPARK | Skills Invetory Management';
?>
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
    <?= $this->Html->css('font-awesome/css/font-awesome.css') ?>

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



<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Welcome to IN+</h3>
           <!-- <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                Continually expanded and constantly improved Inspinia Admin Them (IN+)
            </p>-->
            <p>Login in. To see it in action.</p>

            <div class="m-t" role="form" action="index.html">
                <?= $this->Form->create() ?>
                <div class="form-group">
                   <?= $this->Form->input('email') ?>
                <!-- <input type="email" class="form-control" placeholder="Username" required="">
                --></div>
                <div class="form-group">
                    <?= $this->Form->input('password') ?>
                </div>
                <div class="form-group">
                <?= $this->Form->input('role', [
                'options' => ['admin' => 'Admin', 'author' => 'Author']
                ]) ?>
                </div>
                <div class="form-group">
                <?= $this->Form->button('Login') ?>
                </div>
                <!-- <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            </form>-->
            <?= $this->Form->end() ?>
                
            <!--<p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        --></div>
    </div>

    <!-- Mainly scripts -->
    <?= $this->Html->script('jquery-2.1.1.js'); ?>
    <?= $this->Html->script('bootstrap.min.js'); ?>
   <!-- <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
-->
</body>

</html>