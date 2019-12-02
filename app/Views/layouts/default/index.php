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
</body>
</html>