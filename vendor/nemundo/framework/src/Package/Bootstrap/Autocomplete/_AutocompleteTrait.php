<?php


namespace Nemundo\Package\Bootstrap\Autocomplete;


use Nemundo\Web\Site\AbstractSite;

trait __AutocompleteTrait
{

    /**
     * @var int
     */
    public $minLength = 1;

    /**
     * @var int
     */
    public $delay = 0;

    /**
     * @var AbstractAutocompleteJsonSite
     */
    public $sourceSite;


    protected function checkSourceSite() {

        if (!$this->checkObject('sourceSite', $this->sourceSite, AbstractSite::class)) {
            return null;
        }

    }

}