<?php
include __DIR__ .'/Views/header.php';
include __DIR__ .'/Models/Readings.php';
$books = Book::fetchAll();
?>

<section class="container">
    <h2>Books</h2>
    <div class="row gy-4">
        <?php foreach ($books as $book){
                $book->printCard();
            }
        ?>
    </div>
</section>

<?php
include __DIR__ ."/Views/footer.php";
?>