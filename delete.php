<!-- this file exists only to delete -->

<?php
require "data.php";

if (isset($_POST['movie_id'])) {
  // it gives the first id index
  $index = array_key_first(array_filter($movies, function ($movie) {
    return $movie["movie_id"] == $_POST["movie_id"];
  }));

  // deletes the movie
  unset($_SESSION['movies'][$index]);
}

header("Location:index.php");

?>