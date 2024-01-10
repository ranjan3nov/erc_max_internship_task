<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        img {
            width: 400px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container p-4">
        <center>
            <h3>Upload Image :JPEG / PNG </h3>
        </center>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<center>
                    <div class="alert alert-danger alert-dismissible show mt-5" role="alert" style="width:50%;">
                        <strong>' . $_SESSION['error'] . '</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </center>';
            unset($_SESSION['error']);
        }
        ?>

        <div class="row p-3">
            <div class="col-6 border border-dark p-5">
                <form class="row g-3" action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="col-12 mb-3">
                        <label class="mb-2" for="image">Choose an image: Max Limit 2MB</label>
                        <input class="form-control" type="file" name="image" id="image" accept="image/jpeg, image/png" required>
                    </div>
                    <div class="col-12">
                        <input class="form-control" type="submit" value="Upload Image">
                    </div>
                </form>
            </div>
            <?php
            echo '<div class="col-6">';
            if (isset($_SESSION['img_sr'])) {
                echo
                '<img src="' . $_SESSION['img_sr'] . '" >';
                unset($_SESSION['img_sr']);
            }
            echo '</div>';
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>