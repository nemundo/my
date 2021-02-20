<?php


namespace Nemundo\Content\App\Log\Com\Container;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Log\Content\LogMessage\AbstractLogMessageContentType;
use Nemundo\Content\Com\Container\AbstractContentTypeContainer;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class LogContainer extends AbstractContentTypeContainer
{

    public function getContent()
    {

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText('Log');
        $header->addText('User');
        $header->addText('Date/Time');

        foreach ($this->contentType->getChild() as $contentRow) {

            $contentType = $contentRow->child->getContentType();

            if ($contentType->isObjectOfClass(AbstractLogMessageContentType::class)) {

            $row = new BootstrapClickableTableRow($table);

            /*if ($contentType->hasViewSite()) {
            $row->addSite($contentType->getSubjectViewSite());
            }*/
            $row->addText($contentType->getSubject());
            $row->addText($contentRow->child->user->displayName);
            $row->addText($contentRow->child->dateTime->getShortDateTimeLeadingZeroFormat());

            /*$site = clone($this->redirectSite);
            $site->addParameter(new ContentParameter($contentRow->id));
            $row->addClickableSite($site);*/

            //$row->addClickableSite($contentType->getViewSite());

            }

        }

        return parent::getContent();

    }

}