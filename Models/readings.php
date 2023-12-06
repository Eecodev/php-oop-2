<?php
// include __DIR__ ."/Models/Genre.php";
include __DIR__ ."/Models/Product.php";
class Book extends Product

{
    private int $pageCount;
    private string $longDescription;
    private array $authors;

    public function __construct($id, $title, $image, $pageCount, $longDescription, $authors, $price, $availability)
    {
        parent::__construct($id, $title, $image, $price, $availability);
        $this->pageCount = $pageCount;
        $this->longDescription = $longDescription;
        $this->authors = $authors;
    }

    public function getAuhors()
    {
        $template = "<p>";
        for ($n = 1; $n < count($this->authors); $n++) {
            $template .= '<span>'. $this->authors[$n] . ' - </span>';
        }
        $template .= "</p>";
        return $template;
    }   
    public function printCard()
    {   

        $image = $this->image;
        $title = strlen($this->title) > 28 ? substr($this->title, 0, 28) . '...' : $this->title;
        $pageCount = $this->pageCount;
        $authors = $this->getAuhors();
        $content = substr($this->longDescription, 0, 100) . '...';
        $price = $this->price;
        $availability = $this->availability;
        include __DIR__ .'/../Views/card.php';
    }


    public static function fetchAll()
    {
        $bookString = file_get_contents(__DIR__ . '/books_db.json');
        $bookList = json_decode($bookString, true);
            
        $books = [];

        foreach ($bookList as $item) {
            $availability = rand(0, 100);
            $price = rand(5, 200);
            $books[] = new Book ($item['_id'], $item['thumbnailUrl'], $item['title'], $item['pageCount'], $item['authors'], $item['longDescription'], $price, $availability);
        }
        return $books;
    }
}
?>