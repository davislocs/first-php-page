<?php
define("TITLE", "Dog for an adoption");

include("includes/header.php");

function strip_bad_chars($input) {
    $output = preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
    return $output;
}

if (isset($_GET['item'])) {
    $item = strip_bad_chars($_GET['item']);

    $dog = $dogList[$item];
}

?>

<section class = "about-dog">
    <img src="assets/dog-team/<?php echo $dog["name"]?>.jpg" alt="image of an <?php echo $dog["name"]?>">
    <h1><?php echo $dog["name"]?></h1>
    <p>This dogs name is <?php echo $dog["name"]?> and his <?php echo $dog["age"]?> years old. <?php echo $dog["info"]?></p>
</section>
<a class="back-button" href="about.php"><input type="button" value="back to menu"></a>


<?php
    include("includes/footer.php");
?>