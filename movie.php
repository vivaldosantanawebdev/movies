<?php
  require "data.php";

  if (isset($_GET['id'])) {
    $movie = current(array_filter($movies, function ($movie) {
      return $movie["movie_id"] == $_GET["id"];
    }));

    if (!$movie) {
      // go back to index.php
      header("Location:index.php");
    } 
}
    //var_dump($movie);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $movie['movie_title']; ?> </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="main">
    <?php require "header.php"; ?>
    <section class="movie-details">

      <a class="movie-edit" href="edit.php?id=<?php echo $movie['movie_id']; ?>">Edit</a>

      <h2 class="movie-title"><?php echo $movie['movie_title']; ?> <span class="movie-year">(<?php echo $movie['year'];?>)</span></h2>
      <h4 class="movie-genre"><?php echo $movie['genre'];?></h4>
      
      Director<br><strong><?php echo $movie['director'];?></strong>
      
    </section>
  </main>
</body>
</html>