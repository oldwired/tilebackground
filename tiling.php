<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiling till TILT</title>
    <style>
        body {
            background-image: url('<?php echo getFirstPng(); ?>');
            background-repeat: repeat;
        }
    </style>
    <script>
        let currentIndex = 0;
        const pngFiles = <?php echo json_encode(getPngFiles()); ?>;

        function changeBackground(direction) {
            if (direction === 'left') {
                currentIndex = (currentIndex - 1 + pngFiles.length) % pngFiles.length;
            } else {
                currentIndex = (currentIndex + 1) % pngFiles.length;
            }
            document.body.style.backgroundImage = `url('${pngFiles[currentIndex]}')`;
        };

        document.addEventListener('keydown', (event) => {
            if (event.code === 'ArrowLeft') {
                changeBackground('left');
            } else if (event.code === 'ArrowRight') {
                changeBackground('right');
            }
        });
    </script>
</head>
<body>
<?php
function getFirstPng() {
    $pngFiles = getPngFiles();
    if (!empty($pngFiles)) {
        return $pngFiles[0];
    } else {
        return "";
    }
}

function getPngFiles() {
    return glob("*.png");
}
?>
</body>
</html>
