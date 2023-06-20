<?php
//pull the movies from a database
// localhost/phpmyadmin

$dsn = 'mysql:host=localhost;dbname=movie_mayhem';
$username = 'root';
$password = '1234';

try {
  $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
  $error = $e->getMessage();
  echo $error;
  exit();
}
//if we don´t see anything it´s connected to the database

$sql = "SELECT * FROM genres";
$result = $db->query($sql);
$genres = $result->fetchAll(PDO::FETCH_COLUMN, 1); //this creates an array, an array of arrays

























// WE DON`T NEED THIS ANYMORE BECAUSE WE WILL USE THE DATABASE
// session_start();

// $movies = json_decode(file_get_contents('movies.json'), 1);

// if (isset($_SESSION['movies'])) {
//   $movies = $_SESSION['movies'];
// } else {
//   $_SESSION['movies'] = $movies;
// }


// $genres = [
//   'Fantasy',
//   'Sci-Fi',
//   'Action',
//   'Comedy',
//   'Drama',
//   'Horror',
//   'Romance',
//   'Family',
// ];
