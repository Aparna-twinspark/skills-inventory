<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | 400 Error</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">
        <h1>400</h1>
        <h3 class="font-bold">Unauthorised Access</h3>

        <div class="error-desc">
            Sorry, the page you are looking for has been found but you won't be allowed access to it. Try keeping your smartness in check by following the provided links and not the URLs, now hit the return to login button.
        </div>
        <div>
            <?= $this->Html->link(__('Return to login'), ['controller' => 'Employees', 'action' => 'login'], ['class' => 'btn btn-primary block full-width m-b']); ?>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
