<?php
require "data.php";

function sanitize($data) {
  return array_map(function ($value) {
    return htmlspecialchars(stripslashes(trim($value)));
  }, $data);

  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $movie_title = $_POST['movie_title'];
    if (empty($movie_title)){
      echo 'Movie Title is required';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Movie</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <main class="main">
    <?php require "header.php"; ?>
    <h2 class="form-title">New Movie</h2>

    <form class="form" method="post" action="index.php">
      <input type="text" class="form-control" name="movie_title" placeholder="Movie Title">
      <input type="text" class="form-control" name="director" placeholder="Director">
      <input type="number" class="form-control" name="year" placeholder="Year">
      <select class="form-select" name="genre">
        <option value="">Select a Genre</option>
        <?php foreach ($genres as $genre) : ?>
          <option value="<?php echo $genre; ?>"><?php echo $genre; ?></option>
        <?php endforeach ?>
      </select>
      <button type="submit" class="button">Add Movie</button>
    </form>
  </main>
</body>

</html>