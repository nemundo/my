// JsonRequest
// JsonWebRequest


class WebRequest {


    url = null;
    jsonCount = 0;


    constructor(url = null) {

        this.url = url;
        this._xhr = new XMLHttpRequest();
        this._xhr.open('GET', url, true);
        this._xhr.send();

    }


    addParameter(name, value) {

    }


    // theoretisch kann es auch erst nach dem loading definiert werden
    set onLoaded(value) {

        this._xhr.onload = value;

    }

    /*
    set onFinished(value) {

    }*/


    getContent() {

        let content = null;

        //if (this._xhr.readyState == 4 && this._xhr.status == 200) {

        if (this._xhr.status === 200) {
            content = this._xhr.responseText;
        } else {
            content = "Web Request Error";
        }

        return content;

    }


    getJson() {


        let json = JSON.parse(this.getContent());
        this.jsonCount = json.length;
        return json;

    }


    getJsonCount() {

        return this.jsonCount;

    }


}
