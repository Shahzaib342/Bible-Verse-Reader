<?php
include 'config/config.php';

$query = $conn->query('SELECT ID, BOOK FROM books where ID < 39');
$books = $row = $query->fetchAll();

$query = $conn->query('SELECT DISTINCT(CHAPTER) as chapter FROM contexts where ID >= 0 and ID < 39');
$chapters = $row = $query->fetchAll();

$query = $conn->query('SELECT DISTINCT(VERSE) as verse FROM contexts where ID >= 0 and ID < 39');
$verse = $row = $query->fetchAll();

$action = (isset($_GET['action'])) ? $_GET['action'] : '';
$actions = array();
array_push($actions, array('name' => 'getVerse', 'action' => 'getVerse'));
array_push($actions, array('name' => 'getTestament', 'action' => 'getTestament'));

// Go through the actions list and run the associated functions
foreach ($actions as $act) {
    if ($act['name'] == $action) {
        $functionName = $act['action'] . '();';

        eval($functionName);
    }
}

function getVerse()
{
    $data = $_POST;
    $book = $data["book"];
    $chapter = $data["chapter"];
    $verse = $data["verse"];
    global $conn;
    $query = $conn->query("SELECT * from contexts where ID = '$book' and CHAPTER = '$chapter' and VERSE = '$verse' ");
    $rows = $row = $query->fetchObject();
    if ($rows) {
        echo json_encode($rows);
    }
}

function getTestament() {
    $testament = $_POST["testament"];
    global $conn;
    $html = '';

    if($testament == 'old') {
        $query = $conn->query('SELECT ID, BOOK FROM books where ID < 39');
        $books = $row = $query->fetchAll();
        
        $query = $conn->query('SELECT DISTINCT(CHAPTER) as chapter FROM contexts where ID >= 0 and ID < 39');
        $chapters = $row = $query->fetchAll();
        
        $query = $conn->query('SELECT DISTINCT(VERSE) as verse FROM contexts where ID >= 0 and ID < 39');
        $verse = $row = $query->fetchAll();
        
    }
    else {
        $query = $conn->query('SELECT ID, BOOK FROM books where ID >= 39');
        $books = $row = $query->fetchAll();
        
        $query = $conn->query('SELECT DISTINCT(CHAPTER) as chapter FROM contexts where ID >= 39');
        $chapters = $row = $query->fetchAll();
        
        $query = $conn->query('SELECT DISTINCT(VERSE) as verse FROM contexts where ID >= 39');
        $verse = $row = $query->fetchAll();
    }
    
     $flag=0;
     foreach($books as $book) {
     $html .= "<div class='col col-lg-2 books-buttons'>";    
     $html .= "<div id='" .  $book['ID'] . "' class='book-name'>";
     $html .= "<span>" .$book['BOOK']. "</span>";
     $html .= "<div class='row chapter-and-verse'>";
     $html .= "<div class='chapter-and-verse-row'>";
     $html .= "<div class='col col-lg-5 chapter'><select>";
       foreach ($chapters as $chapter) { 
        $html .= "<option value='" . $chapter['chapter']. "'> " . $chapter['chapter'] . "</option>";
       }
       $html .= "</select></div><div class='col col-lg-5 verse'><select onchange='getVerse($(this))' id = '$flag'>";
        foreach ($verse as $v) { 
            $html .= "<option value='" . $v['verse']."'> " . $v['verse'] . "</option>"; 
        }
        $html .= "</select></div></div></div> </div></div>";
        $flag++;
    }
     $response = array(
         "html" => $html
     );

     echo json_encode($response);
}