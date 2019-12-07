<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home pets - <?php echo isset($data['name'])?$data['name'] : 'Home pets' ?></title>
    <link rel="stylesheet" href="<?php echo APP_URL.'assets/css/bootstrap.css' ?>"/>
    <link rel="stylesheet" href="<?php echo APP_URL.'assets/css/app.css' ?>"/>
</head>
<body>
<?php require('nav.php'); ?>
<?php if(isset($modules['content'])) $modules['content']->render(); ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?php echo APP_URL.'assets/js/bootstrap.js'; ?>"></script>
<script src="<?php echo APP_URL.'assets/js/app.js'; ?>"></script>
</body>
</html>