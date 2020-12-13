<?php
$authorized = FALSE;
if(isset($_POST['save']) && $_POST['password'] != 'admin-password') {
    header('HTTP/1.0 401 Unauthorized');
} else {
    $authorized = TRUE;
}
$file="chat.yaml";
if($authorized && isset($_POST['dialog']) ) {
    $archiveFile = "chat-".date('Y-m-d-His').".yaml";
    copy($file, $archiveFile);
    file_put_contents($file, $_POST['dialog']);
}
$dialog=file_get_contents($file);
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mesto zensk predstava</title>
    <link rel="stylesheet" href="main.css" type="text/css" media="all" />
</head>
<body>
<?php
    if (isset($_POST['save']) && !$authorized) {
        echo '<span style="color: red;">Unauthorized!</span>';
    }
?>
    <form method="POST">
        <textarea name="dialog" class="chatEdit"><?php echo $dialog;?></textarea>
        Password: <input type="password" name="password" />
        <input type="submit" name="save" value="save" />
    </form>
</body>
</html>
