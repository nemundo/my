<?php

namespace Nemundo\Package\CkEditor4;


use Nemundo\Com\Container\LibraryTrait;

trait CkEditor4Trait
{

    use LibraryTrait;

    protected function loadCkEditor($id)
    {

        $this->addPackage(new CkEditor4Package());

        $this->addJavaScript('window.onload = function() {');
        $this->addJqueryScript('CKEDITOR.replace("' . $id . '", {
      toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "links",
          "groups": ["links"]
        },
        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },
        {
          "name": "insert",
          "groups": ["insert"]
        },
        {
          "name": "styles",
          "groups": ["styles"]
        }
      ],
      removeButtons: "Subscript,Superscript,Anchor"
    });');

        // ,Image

        $this->addJavaScript(' };');

    }

}