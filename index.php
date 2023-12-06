<?php
include __DIR__ ."/Views/header.php";
include __DIR__ ."/Models/Movie.php";
$movies = Movie::fetchAll();
?>
<section class="container">
    <h2>Movies</h2>
    <div class="row gy-4">
        <?php foreach ($movies as $movie){
            $movie->printCard();
            }
        ?>
    </div>
</section>

<section class="container">
    <h2>PC Games</h2>
    <div class="row gy-4">
        
    </div>
</section>
<?php
include __DIR__ ."/Views/footer.php";
?>