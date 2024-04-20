<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Compression Checker</title>
    <link rel="stylesheet" href="homepage_style.css">
</head>
<body>
    <header>
        <h1>Image Compression Algorithm Checker</h1>
        <p>Select an image file to determine the type of compression algorithm used.</p>
    </header>
    <div class="nav-wrapper">
    <nav>
        <table>
            <tr>
                <th><a href="homepage.html">Introduction</a></th>
                <th><a href="lossy.html">Lossy</a></th>
                <th><a href="lossless.html">Lossless</a></th>
                <th><a href="try_yourselves.html">Try Yourself</a></th>
                <th><a href="About_US.html">About Us</a></li></th>
            </tr>
        </table>
    </nav>
    <?php
    // Check if a file has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
        $file = $_FILES["image"];

        // Check if the file is an actual image
        if (getimagesize($file["tmp_name"])) {
            $imageType = exif_imagetype($file["tmp_name"]);

            echo "<p>File uploaded successfully.</p>";
            echo "<p>Compression Type: ";

            // Infer the compression algorithm based on the image type
            switch ($imageType) {
                case IMAGETYPE_JPEG:
                    echo "JPEG (lossy compression)";
                    break;
                case IMAGETYPE_PNG:
                    echo "PNG (lossless compression)";
                    break;
                case IMAGETYPE_GIF:
                    echo "GIF (lossless compression)";
                    break;
                default:
                    echo "Unknown or not supported.";
            }

            echo "</p>";
        } else {
            echo "<p>File is not an image.</p>";
        }
    }
    ?>

    <form method="post" enctype="multipart/form-data">
        <label for="image">Upload image:</label>
        <input type="file" name="image" id="image" required>
        <input type="submit" value="Check Compression">
    </form>
</body>
</html>
