<?php

namespace Nemundo\Web\Site;


use Nemundo\Core\Type\Text\Text;
use Nemundo\Web\Parameter\UrlParameterList;
use Nemundo\Web\Parameter\UrlParameter;
use Nemundo\Web\Url\Url;
use Nemundo\Web\WebConfig;


// CurrentSite
class Site extends AbstractSite
{

    protected function loadSite()
    {

        $url = new Url();

        $urlText = new Text((new Url())->getUrlWithoutParameter());
        $urlText->removeLeft(WebConfig::$webUrl);
        $this->url = $urlText->getValue();

        foreach ($url->getParameterList() as $key => $value) {

            if (!is_array($value)) {

                $parameter = new UrlParameter();
                $parameter->parameterName = $key;
                $parameter->setValue($value);
                $this->addParameter($parameter);

            } else {

                $parameter = new UrlParameterList($value);
                $parameter->parameterName = $key;
                $this->addParameter($parameter);

            }

        }

    }


    public function loadContent()
    {

    }

}