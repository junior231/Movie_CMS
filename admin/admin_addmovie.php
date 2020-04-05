<?php

require_once '../load.php';
confirm_logged_in();

// this populates the dropdown menu in the form from the database
$genre_table = 'tbl_genre';
$genres = getAll($genre_table);

// handle form submission
if(isset($_POST['submit'])){
    $movie = array(
        'cover'=>$_FILES['cover'],
        'title'=>$_POST['title'],
        'year'=>$_POST['year'],
        'run'=>$_POST['run'],
        'story'=>$_POST['story'],
        'release'=>$_POST['release'],
        'genre'=>$_POST['genList'],
    );

    $result = addMovie($movie);
    $message = $result;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
</head>
<body>
    <h2>Add Movie</h2>
    <?php echo !empty($message)? $message: ''; ?>
    <form action="admin_addmovie.php" method="post" enctype="multipart/form-data">
        <label>Cover Image</label><br>
        <input type="file" name="cover" value=""><br><br>

        <label>Movie Title</label><br>
        <input type="text" name="title" value=""><br><br>

        <label>Movie Year</label><br>
        <input type="text" name="year" value=""><br><br>

        <label>Movie Runtime</label><br>
        <input type="text" name="run" value=""><br><br>

        <label>Movie StoryLine</label><br>
        <textarea name="story"></textarea><br><br>

        <label>Movie Release</label><br>
        <input type="text" name="release" value=""><br><br>


        <label>Movie Genre</label><br>
        <select name="genList">
            <option value="">Select Movie Genre...</option>
            <?php while($row = $genres->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $row['genre_id'] ?>"><?php echo $row['genre_name']; ?></option>
            <?php endwhile;?>
        </select><br><br>

        <button type="submit" name="submit">Add Movie</button>
    
</body>
</html>