<?php


namespace Nemundo\Com\FormBuilder;


use Nemundo\Web\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;

trait RedirectTrait
{

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    /**
     * @var AbstractUrlParameter
     */
    public $redirectParameter;

    /**
     * @var string
     */
    protected $redirectId;


    protected function checkRedirect()
    {

        if ($this->redirectSite !== null) {

            $site = clone($this->redirectSite);


            if ($this->redirectParameter !== null) {

                $parameter = clone($this->redirectParameter);
                $parameter->setValue($this->redirectId);
                $site->addParameter($parameter);

            }

            $site->redirect();

        }

    }

}