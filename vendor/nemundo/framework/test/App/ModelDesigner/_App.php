<?php

require __DIR__.'/../../config.php';


(new \Nemundo\Core\Type\File\File('C:\git\paranautik\model\Alpha.json'))->deleteFile();


$project = new \Paranautik\ParanautikProject();


$appName = 'Alpha';

$json = new \Nemundo\App\ModelDesigner\Json\AppJson();
$json->fromProject($project,$appName);
$json->appLabel =$appName;
$json->appName=$appName;
//$json->namespace = $this->appNamespace->getValue();


$model = new \Nemundo\App\ModelDesigner\Model\ModelDesignerOrmModel();
$model->label = 'Bravo';
$model->className = 'Bravo';
$model->tableName = 'bravo';
$model->namespace = 'Paranautik\\Test\\App\\Bravo';

$type1 = new \Nemundo\App\ModelDesigner\Type\TextModelDesignerType($model);
$type1->label = 'Test1';
$type1->fieldName = 'test1';
$type1->length = 100;

$type2 = new \Nemundo\App\ModelDesigner\Type\TextModelDesignerType($model);
$type2->label = 'Test2';
$type2->fieldName = 'test2';
$type2->length = 100;

$type3 = new \Nemundo\App\ModelDesigner\Type\TextModelDesignerType($model);
$type3->label = 'Test3';
$type3->fieldName = 'test3';
$type3->length = 100;


$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($model);
$index->indexName = 'index1';
$index->addType($type3);

$index = new \Nemundo\Model\Definition\Index\ModelIndex($model);
$index->indexName = 'index2';
$index->addType($type1);
$index->addType($type2);

$json->addModel($model);



$json->writeJson();




