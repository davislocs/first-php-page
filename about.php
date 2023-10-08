<?php
    define("TITLE", "About dogs");
    include("includes/header.php");
?>

    <section class = "about-page">
        <h1>Dogs for adoption</h1>
        <ul class = "dog-list">

            <?php
                foreach($dogList as $dog => $item) { ?>
                    <li><a href="dog.php?item=<?php echo $dog; ?>"><?php echo $item["name"]; ?> </a><?php echo $item["age"]; ?><span> years old</span></li>
                <?php } ?>
        </ul>
    </section>

<?php
    include("includes/footer.php");
?>