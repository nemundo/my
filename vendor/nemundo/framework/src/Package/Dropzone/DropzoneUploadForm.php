<?php


namespace Nemundo\Package\Dropzone;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Button\Button;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Form\AbstractForm;
use Nemundo\Package\Jquery\Code\JqueryReadyCode;
use Nemundo\Web\Site\AbstractSite;

class DropzoneUploadForm extends AbstractForm
{

    //use PackageTrait;

    use LibraryTrait;

    /**
     * @var AbstractSite
     */
    public $saveSite;

    public function getContent()
    {

        $this->addPackage(new DropzonePackage());
        $this->addCssClass('dropzone');

        $this->action = $this->saveSite->getUrl();

        //$btn=new Button($this);
        //$btn->label='Upload';

        //$this->content = 'Upload Files';

        $this->id = 'dropzone2';


        /*
        $this->addContent('<div class="dz-preview dz-file-preview">
  <div class="dz-details">
    <div class="dz-filename"><span data-dz-name></span></div>
    <div class="dz-size" data-dz-size></div>
    <img data-dz-thumbnail />
  </div>
  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
  <div class="dz-success-mark"><span>✔</span></div>
  <div class="dz-error-mark"><span>✘</span></div>
  <div class="dz-error-message"><span data-dz-errormessage></span></div>
</div>');*/

        //$this->addc


        //$jqueryCode=new JqueryReadyCode();
        //$jqueryCode->addCodeLine('Dropzone.autoDiscover = false;');

        $this->addJavaScript('Dropzone.options.dropzone2 = {');
        //$this->addJavaScript('acceptedFiles: "application/pdf",');
        $this->addJavaScript('timeout: 0');
        $this->addJavaScript('};');


        //Dropzone.options.myAwesomeDropzone = {

        //$jqueryCode->addCodeLine('var myDropzone = new Dropzone("#dropzone2", {');
        //$jqueryCode->addCodeLine('Dropzone.options.dropzone2 = {');
        //$jqueryCode->addCodeLine('url: "'.$this->saveSite->getUrl().'",');

        //$jqueryCode->addCodeLine('acceptedFiles: "application/pdf",');

        //$jqueryCode->addCodeLine('timeout: 0');


        // parallelUploads

        //$jqueryCode->addCodeLine('};');

        //$jqueryCode->addCodeLine('});');


        //$jqueryCode->addCodeLine('');


        // var myDropzone = new Dropzone("div#myId", { url: "/file/post"});


        /*
         *var myDropzone = new Dropzone("div#myId", { url: "/file/post"});
         * <div class="dropzone" id="myDropzone"></div>
         *
         * Dropzone.autoDiscover = false;
    $("#dZUpload").dropzone({
        url: "hn_SimpeFileUploader.ashx",
        addRemoveLinks: true,
        success: function (file, response) {
            var imgName = response;
            file.previewElement.classList.add("dz-success");
            console.log("Successfully uploaded :" + imgName);
        },
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
        }
    });
         *
         */


       // acceptedFiles

        //$jqueryCode->addCodeLine('};');
       // $this->addJqueryCode($jqueryCode);

        return parent::getContent();

    }

}