<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Multiple Images</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
    }

    h2 {
      text-align: center;
    }

    form {
      text-align: center;
      margin-bottom: 30px;
    }

    input[type="file"] {
      margin: 10px 0;
    }

    .gallery {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
    }

    .gallery img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Upload Multiple Images</h2>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="images[]" multiple>
    <br>
    <input type="submit" name="upload" value="Upload Images">
  </form>

  <!-- PHP for uploading files -->
  <?php
  if (isset($_POST['upload'])) {
    $uploadDir = 'works/';
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0777, true);
    }

    foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
      $fileName = basename($_FILES['images']['name'][$key]);
      $targetFilePath = $uploadDir . $fileName;
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

      // Allow only image file types
      $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
      if (in_array(strtolower($fileType), $allowTypes)) {
        if (move_uploaded_file($tmpName, $targetFilePath)) {
          echo "<p style='color: green;'>$fileName uploaded successfully!</p>";
        } else {
          echo "<p style='color: red;'>Failed to upload $fileName</p>";
        }
      } else {
        echo "<p style='color: red;'>$fileName is not a valid image file.</p>";
      }
    }
  }
  ?>

  <h2>Image Gallery</h2>
  <div class="gallery">
    <!-- PHP to display images -->
    <?php
    $dir = 'products/';
    if (is_dir($dir)) {
      $files = scandir($dir);
      foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
          echo "<img src='$dir$file' alt='$file'>";
        }
      }
    } else {
      echo "<p>No images found!</p>";
    }
    ?>
  </div>
</div>

</body>
</html>
