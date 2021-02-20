class FormContainer extends BaseContainer {


    _afterSave = null;

    constructor(parentContainer) {

        super("form", parentContainer);

    }


    set afterSave(value) {

        this._afterSave = value;

    }


    saveData(url) {

        let formData = new FormData(this._htmlElement);

        let copy = this;

        let xhr = new XMLHttpRequest();
        if (this._afterSave !== null) {

            xhr.onreadystatechange = function () {

                if (this.readyState === 4 && this.status === 200) {
                    copy._afterSave();
                }

            };

        }
        xhr.open('POST', url, true);
        //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(formData);

    }

}