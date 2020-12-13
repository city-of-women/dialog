<?php
require_once "spyc.php";
$yaml = Spyc::YAMLLoad("chat.yaml");
$chat = $yaml['dialog'];
// var_dump($chat);

$currentName = $_GET['object'];
if ($currentName == NULL) {
    $currentName = "nail-polish";
}

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
    <div class="header"></div>
    <div class="main">
<?php
foreach ($chat as $row) {
    if ($row['object'] == "nail-polish") {
        $color = "#f5ca4e";
        $image = "nail-polish.png";
    } elseif ($row['object'] == "mask") {
        $color = "#ef9ba7";
        $image = "mask.png";
    } elseif ($row['object'] == "orchid") {
        $color = "#cbafdd";
        $image = "orchid.png";
    } elseif ($row['object'] == "manicure-table") {
        $color = "#bae6bd";
        $image = "manicure-table.png";
    } elseif ($row['object'] == "nail-file") {
        $color = "#a1e0e4";
        $image = "nail-file.png";
    } else {
        //invalid name
        $color = "red";
        $image = "invalid.png";
    }

    if ($row['object'] == $currentName) {
        $align = "right";
    } else {
        $align = "left";
    }
?>
        <div class="row row-<?php echo($align);?>">
            <img src="img/<?php echo($image);?>" class="icon">
            <div class="talk-bubble" style="background-color: <?php echo($color);?>">
                <div class="triangle-<?php echo($align);?>-top" style="border-color: <?php echo($color);?> transparent transparent transparent;"> </div>
                <div class="talktext">
                    <?php echo($row['message']);?>
                </div>
            </div>
        </div>
<?php
} //end loop
?>
</body>
</html>