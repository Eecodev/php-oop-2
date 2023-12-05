<?php

include __DIR__ ."/Genre.php";
include __DIR__ ."/Product.php";

class Movie extends Product 
{
    private int $id;
    private string $title;
    private string $overview;
    private float $vote_average;
    private string $poster_path;
    private string $original_language;

    public array $genres;
    function __construct($id, $title, $overview, $vote, $image, $language, $genres, $quantity, $price)
    {
        parent::__construct($price, $quantity);
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->poster_path = $image;
        $this->original_language = $language;
        $this->genres = $genres;  
    }

    private function getVote(){
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for ($n = 1; $n <= 5; $n++){
            $template .= $n <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        $template .= "</p>";
        return $template;
    }

    private function formatGenres()
    {

        $template = "<p>";
        for ($n = 1; $n < count($this->genres); $n++){
            $template .= $this->genres[$n]->drawGenre();
        }
        $template .= "</p>";
        return $template;
    }
    public function printCard()
    {
        // $sconto = $this->setDiscount($this->title);
        $image = $this->poster_path;
        $title = strlen($this->title) > 28 ? substr($this->title, 0, 28) . '...' : $this->title;
        $content = substr($this->overview, 0, 100) . '...';
        $custom = $this->getVote();
        $genre = $this->formatGenres();
        $price = $this->price;
        $availability = $this->availability;
        include __DIR__ .'/../Views/card.php';
    }


    public static function fetchAll()

    {
        $movieString = file_get_contents(__DIR__ .'/movie_db.json');
        $movieList = json_decode($movieString, true);


        $movies = [];   

        foreach($movieList as $item){
            $moviegenres = [];
            $genres = Genre::fetchAll();
            for($i = 0; $i < count($item['genre_ids']); $i++){
                $index = rand(0, count($genres) -1);
                $rand_genre = $genres[$index];
                $moviegenres[] = $rand_genre;
            }
            $quantity = rand(0, 100);
            $price = rand(5, 200);
            $movies[] = new Movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path'], $item['original_language'], $moviegenres, $quantity, $price); 
        }
        return $movies;  
    }
    
}




?>