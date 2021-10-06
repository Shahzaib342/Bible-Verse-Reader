<?php
include 'config/config.php';

$query = $conn->query('SELECT ID, BOOK FROM books');
$books = $row = $query->fetchAll();

$query = $conn->query('SELECT DISTINCT(CHAPTER) as chapter FROM contexts');
$chapters = $row = $query->fetchAll();

$query = $conn->query('SELECT DISTINCT(VERSE) as verse FROM contexts');
$verse = $row = $query->fetchAll();
