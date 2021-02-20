<?php


namespace Nemundo\Content\Index\Tree\Site;


use Nemundo\Content\Index\Tree\Data\Tree\TreeUpdate;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\JqueryUi\Sortable\AbstractSortableSite;

class ContentSortableSite extends AbstractSortableSite
{

    /**
     * @var ContentSortableSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'content-sortable';
        ContentSortableSite::$site = $this;

    }


    public function loadContent()
    {

        (new Debug())->write($_GET);

        $itemOrder = 0;
        foreach ($this->getItemOrderList() as $value) {

            $update = new TreeUpdate();
            $update->itemOrder = $itemOrder;
            $update->updateById($value);
            //$update->filter->andEqual($update->model->childId, $value);
            //$update->update();
            $itemOrder++;

        }

    }

}