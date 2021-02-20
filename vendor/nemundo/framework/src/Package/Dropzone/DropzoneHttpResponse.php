<?php


namespace Nemundo\Package\Dropzone;


use Nemundo\Core\Http\Response\AbstractHttpResponse;
use Nemundo\Core\Http\Response\ContentType;
use Nemundo\Core\Http\Response\HttpResponse;

class DropzoneHttpResponse extends AbstractHttpResponse
{

    public function sendResponse()
    {

        $data['success']= '';

        $this->contentType = ContentType::JSON;  // ContentType::H
        //$response->statusCode = StatusCode::SERVER_ERROR;
        $this->content =  json_encode($data);

        parent::sendResponse();

    }


}