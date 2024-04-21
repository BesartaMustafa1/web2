<?php
class Librat{
    public $libri;
    public $autori;

    public function __construct($x, $y){
    $this -> libri = $x;
    $this -> autori = $y;
    }
}

    
 $libri1 = new Librat("Libri 1: It Starts With Us", "Autori 1: Colleen Hoover");
   
    echo $libri1 -> libri . "<br/>";
    echo $libri1 -> autori . "<br/>";

    $libri1 = new Librat("Libri 2: A Dance With Dragons", "Autori 2: George R. R. MARTIN");
   
    echo $libri1 -> libri . "<br/>";
    echo $libri1 -> autori . "<br/>";

    $libri1 = new Librat("Libri 3: One Hundred Years Of Solitude", "Autori 3: Gabriel Garcia Marquez");
   
    echo $libri1 -> libri . "<br/>";
    echo $libri1 -> autori . "<br/>";


   
    class Books{
        //Variablat
        var $titulli;
        var $cmimi;

 //Funksionet 
 function setCmimi($param1){
    $this->cmimi = $param1;
}
function getCmimi(){
    return $this->cmimi . '<br/>';
}
function setTitulli($param1){
    $this->titulli = $param1;
}
function getTitulli(){
    echo $this->titulli . '<br/>';
}
}

    $book1 = new Books;
    $book2 = new Books;
    $book3 = new Books;
        
        // Thirrja e funksioneve
        
        $book1 -> setTitulli('It Starts With Us');
        $book1 -> setCmimi(15);
        echo 'Libri i pare ' . $book1 -> getTitulli() . 'dhe ka cmimin ' . $book1 -> getCmimi();
        //$book1 -> getTitulli();
        //$book1 -> getCmimi();
        
        $book2 ->setTitulli(' A Dance With Dragons');
        $book2 -> setCmimi(22);
        echo 'Libri i dyte ' . $book2 -> getTitulli() . 'dhe ka cmimin ' . $book2 -> getCmimi();
        
          
        $book3 -> setTitulli('One Hundred Years Of Solitude');
        $book3 -> setCmimi(12);
        echo 'Libri i trete ' . $book3 -> getTitulli() . 'dhe ka cmimin ' . $book3 -> getCmimi();
    
?>