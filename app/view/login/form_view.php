<?php
if(!defined('APP_PATH')) exit('cannot access');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? null; ?></title>
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css')?>">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <?php if(!empty($message)): ?>
                    <p class="text-center text-danger">
                        <?= $message; ?>
                    </p>
                <?php endif; ?>

                <form class="mt-3 p-3 border" method="POST" action="<?= route('login','handleLogin',['age'=>20],['name'=>'teo']);?> ">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button name="btnLogin" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>