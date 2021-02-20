<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/style.css">


    <?php

    require __DIR__.'/../../config.php';


    $path = (new \Nemundo\Project\Path\ProjectPath())
        ->addPath('lib')
        ->addPath('js')
        ->getPath();

    $reader = new \Nemundo\Core\File\DirectoryReader();
    $reader->recursiveSearch = true;
    $reader->path = $path;

    foreach ($reader->getData() as $file) {


        $filename = new \Nemundo\Core\Type\Text\Text($file->fullFilename);
        $filename->replaceLeft($path, '');
        $filename->replace( "\\", '/');

        echo '<script src="../js/' . $filename->getValue() . '"></script>' . PHP_EOL;

    }


    ?>


</head>
<body>


<div id="app">


</div>

<script src="js/app.js"></script>

</body>
</html>
