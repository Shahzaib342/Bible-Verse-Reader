<?php
include 'config/config.php';

$query = $conn->query('SELECT ID, BOOK FROM books');
$books = $row = $query->fetchAll();

$query = $conn->query('SELECT DISTINCT(CHAPTER) as chapter FROM contexts');
$chapters = $row = $query->fetchAll();

$query = $conn->query('SELECT DISTINCT(VERSE) as verse FROM contexts');
$verse = $row = $query->fetchAll();

$action = (isset($_GET['action'])) ? $_GET['action'] : '';
$actions = array();
array_push($actions, array('name' => 'getVerse', 'action' => 'getVerse'));

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