class DocumentContainer {


    set title(value) {
        document.title = value;
    }


    set onLoaded(value) {

        document.addEventListener("DOMContentLoaded", value);

    }


    set keyDown(value) {

        document.addEventListener("keydown",value);

    }

    getBody() {

        let element = document.getElementsByTagName("body")[0];
        return element;

    }

}