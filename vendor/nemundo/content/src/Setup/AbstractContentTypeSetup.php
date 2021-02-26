<?php


namespace Nemundo\Content\Setup;


use Nemundo\App\Application\Setup\AbstractSetup;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\Content\ContentDelete;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Data\ContentType\ContentType;
use Nemundo\Content\Data\ContentType\ContentTypeCount;
use Nemundo\Content\Data\ContentType\ContentTypeDelete;
use Nemundo\Content\Data\ContentType\ContentTypeUpdate;
use Nemundo\Content\Data\ContentView\ContentView;
use Nemundo\Content\Data\ContentView\ContentViewCount;
use Nemundo\Content\Data\ContentView\ContentViewDelete;
use Nemundo\Content\Data\ContentView\ContentViewUpdate;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractType;
use Nemundo\Core\Language\Translation;

abstract class AbstractContentTypeSetup extends AbstractSetup
{

    protected function addContentType(AbstractType $contentType)
    {

        $contentLabel = (new Translation())->getText($contentType->typeLabel);
        if ($contentLabel == null) {
            $contentLabel = $contentType->getClassNameWithoutNamespace();
        }

        $count = new ContentTypeCount();
        $count->filter->andEqual($count->model->id, $contentType->typeId);
        if ($count->getCount() == 0) {
            $data = new ContentType();
            $data->id = $contentType->typeId;
            $data->contentType = $contentLabel;
            $data->phpClass = $contentType->getClassName();
            if ($this->application !== null) {
                $data->applicationId = $this->application->applicationId;
            }
            $data->setupStatus = true;
            $data->save();
        } else {

            $update = new ContentTypeUpdate();
            $update->contentType = $contentLabel;
            $update->phpClass = $contentType->getClassName();
            if ($this->application !== null) {
                $update->applicationId = $this->application->applicationId;
            }
            $update->setupStatus = true;
            $update->updateById($contentType->typeId);

        }


        $update = new ContentViewUpdate();
        $update->filter->andEqual($update->model->contentTypeId, $contentType->typeId);
        $update->setupStatus = false;
        $update->update();

        foreach ($contentType->getViewList() as $view) {

            $count = new ContentViewCount();
            $count->filter->andEqual($update->model->contentTypeId, $contentType->typeId);
            $count->filter->andEqual($update->model->viewClass, $view->getClassName());
            if ($count->getCount() == 0) {
                $data = new ContentView();
                $data->contentTypeId = $contentType->typeId;
                $data->viewName = $view->viewName;
                $data->viewClass = $view->getClassName();
                $data->setupStatus = true;
                $data->save();
            } else {
                $update = new ContentViewUpdate();
                $update->filter->andEqual($update->model->contentTypeId, $contentType->typeId);
                $update->filter->andEqual($update->model->viewClass, $view->getClassName());
                $update->viewName = $view->viewName;
                $update->setupStatus = true;
                $update->update();
            }

        }

        $delete = new ContentViewDelete();
        $delete->filter->andEqual($update->model->contentTypeId, $contentType->typeId);
        $delete->filter->andEqual($update->model->setupStatus, false);
        $delete->delete();

        return $this;

    }


    public function deleteContent(AbstractContentType $contentType)
    {

        $reader = new ContentReader();
        $reader->model->loadContentType();
        $reader->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
        foreach ($reader->getData() as $contentRow) {
            $contentType = $contentRow->getContentType();
            $contentType->deleteType();
        }

        $delete = new ContentDelete();
        $delete->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
        $delete->delete();


        return $this;

    }


    public function removeContent(AbstractContentType $contentType)
    {

        // hier nur von content typ
        //(new ContentCheckScript())->run();


        $contentCountTmp = -1;

        do {

            $reader = new ContentReader();
            $reader->model->loadContentType();
            $reader->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
            $reader->limit = 1000;
            foreach ($reader->getData() as $contentRow) {
                $contentType = $contentRow->getContentType();
                $contentType->deleteType();
            }

            $count = new ContentCount();
            $count->filter->andEqual($count->model->contentTypeId, $contentType->typeId);
            $contentCount = $count->getCount();

            if ($contentCount == $contentCountTmp) {
                (new \Nemundo\Core\Log\LogMessage())->writeError('Invalid Content. Could not delete.');
                //exit;

                $delete = new ContentDelete();
                $delete->filter->andEqual($delete->model->contentTypeId, $contentType->typeId);
                $delete->delete();

            }
            $contentCountTmp = $contentCount;

        } while ($contentCount > 0);


        /*
        $delete = new WordContentTypeDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $contentType->typeId);
        $delete->delete();*/


        return $this;

    }


    public function removeType(AbstractType $type)
    {

        (new ContentTypeDelete())->deleteById($type->typeId);
        return $this;

    }


    public function removeContentType(AbstractContentType $contentType)
    {

        $this->removeContent($contentType);
        (new ContentTypeDelete())->deleteById($contentType->typeId);

        return $this;

    }

}