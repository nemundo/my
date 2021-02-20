<?php

require __DIR__ . '/../../../config.php';

$filename = (new \Nemundo\Com\Package\PackagePath(new \Nemundo\Package\NemundoJs\NemundoJsPackage()))
    ->addPath('nemundo.js')
    ->getFilename();

$packer = new \Nemundo\Dev\Js\JsPacker();
$packer->desinationFilename = $filename;
$packer->packPackage(new \Nemundo\Dev\Js\NemundoJsDevPackage());
