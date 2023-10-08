<ul class="nav-list">
    <?php
        foreach($navItems as $item) {
            echo "<a href=\"$item[slug]\"><li class=\"list-item\">$item[title]</li></a>";
        };
    ?>
 </ul>