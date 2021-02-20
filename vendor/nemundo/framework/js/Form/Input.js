class InputContainer extends FormBaseContainer {


    constructor(parentContainer) {
        super("input", parentContainer);

        //this._htmlElement.type = "text";

    }

    set name(value) {
        this._htmlElement.name = value;
    }


    set readOnly(value) {
        this._htmlElement.readOnly = value;
    }

    set value(value) {
        this._htmlElement.value = value;
    }


    get value() {
        return this._htmlElement.value;
    }


    set onInput(value) {

        this._htmlElement.addEventListener("input", value);

    }


    set onFocus(value) {

        this._htmlElement.addEventListener("focus", value);

    }


    clearInput() {
        this.value = "";
    }


}