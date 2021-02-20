class ButtonContainer extends FormBaseContainer {

    constructor(parentContainer) {
        super("button", parentContainer);
         this._htmlElement.type = "button";
    }


    set label(value) {
        this._htmlElement.innerHTML = value;
    }

}
