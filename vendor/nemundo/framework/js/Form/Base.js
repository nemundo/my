class FormBaseContainer extends BaseContainer {


    set disabled(value) {
        this._htmlElement.disabled = value;
    }

    get disabled() {
        return this._htmlElement.disabled;
    }


    set keyDown(value) {

        document.addEventListener("keydown",value);

    }


}