<?php

require __DIR__.'/../config.php';



class TestPath extends \Nemundo\Core\Path\AbstractPath {


    protected function loadPath()
    {

        $this->addPath('c:');
        $this->addPath('test');

        // TODO: Implement loadPath() method.
    }


}



class BlaPath extends TestPath {

    protected function loadPath()
    {
        parent::loadPath(); // TODO: Change the autogenerated stub
        $this->addPath('bla123');

    }

}



$path= new BlaPath();  // new TestPath();  // new \Nemundo\Core\Path\Path();
//$path->addPath('c:');
//$path->addPath('test');
//$path->addPath('bla123');
$path->addPath('111');


(new \Nemundo\Core\Debug\Debug())->write($path->getPath());

$path->createPath();



// RandomPath
// DatePath


/*
$filename = (new ModelPath())
    ->addPath( 'bla.json')
    ->getFilename();

(new \Nemundo\Core\Debug\Debug())->write($filename);
*/


//$path=new \Nemundo\Core\Path\Path('C:\test\test123');
//$path->deleteDirectory();

//deleteDirectory(true);
//$path->createDirectory();




//new \Nemundo\Core\File\Directory()


/*
foreach ($path->getSubPathList() as $subpath) {


    (new \Nemundo\Core\Debug\Debug())->write($subpath->getPath());
    (new \Nemundo\Core\Debug\Debug())->write($subpath->getFilename());

}


$path=new \Nemundo\Core\Path\Path('C:\test\xcontest\search\2020');
foreach ($path->getSubPathList() as $subpath) {

    (new \Nemundo\Core\Debug\Debug())->write($subpath->getPath());
    (new \Nemundo\Core\Debug\Debug())->write($subpath->getFilename());

}*/