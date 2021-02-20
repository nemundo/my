class TextareaContainer extends FormBaseContainer {


    constructor(parentContainer) {
        super("textarea", parentContainer);
    }

    set rows(value) {
        this._htmlElement.rows = value;
    }


    set cols(value) {
        this._htmlElement.cols = value;
    }


    set value(value) {

        this._htmlElement.value = value;

    }

    get value() {

        return this._htmlElement.value;

    }

}




