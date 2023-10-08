<?php
    define("TITLE", "Gallery");
    include('includes/header.php');
    // include("includes/arrays.php");
?>
<section class="galery">
    <h1>Galery</h1>
    <div class="galery-section">
        <!-- <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div> -->
        <?php
        
            foreach($galeryItems as $image) {
                echo "<div><img src = 'assets/dog-team/$image[slug]' class = 'img' alt = '$image[name]'></div>";
            }
        ?>
    </div>
</section>

<?php
    include('includes/footer.php')
?>