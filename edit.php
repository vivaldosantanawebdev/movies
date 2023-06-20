<?php
  require "data.php";

  if (isset($_GET['id'])) {
    // to avoid array into an array user "current"
    $movie = current(array_filter($movies, function ($movie) {
      return $movie["movie_id"] == $_GET["id"];
    }));

    if (!$movie) {
      // go back to index.php
      header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Movie</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="main">
    <?php require "header.php"; ?>
    <h2 class="form-title">Edit Movie</h2>

    <!-- Important to PREPOPULATE THE DATA -->
    <form class="form" method="post">
      <input type="text" class="form-control" name="movie_title" placeholder="Movie Title" required value="<?php echo $movie['movie_title']; ?>">
      <input type="text" class="form-control" name="director" placeholder="Director" required
          value="<?php echo $movie['director']; ?>">
      <input type="number" class="form-control" name="year" placeholder="Year" required
          value="<?php echo $movie['year']; ?>">

          <!-- Selection is different -->
      <select class="form-select" name="genre">
          <option value="">Select a Genre</option>
          <?php foreach ($genres as $genre) : ?>
            <option value="<?php echo $genre; ?>" 
              <?php if ($genre === $movie['genre']) : ?>>selected<? endif; ?>
              <?php echo $genre; ?>
            </option>

      </select>
      <button type="submit" class="button">Update Movie</button>
    </form>
  </main>
</body>
</html>