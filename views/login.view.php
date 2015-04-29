<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?=$user->email?>"/>
        <?= Ainet\Support\HtmlHelper::error('email', $errors)?>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?=$user->password?>"/>
        <?= Ainet\Support\HtmlHelper::error('password', $errors)?>

        <!-- colocar aqui uma checkbox 'Remember Me' -->
    </div>
    <div>
        <input type="submit" name="login" value="Login" />
    </div>
</form>