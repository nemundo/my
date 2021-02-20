class HyperlinkContainer extends ContentContainer {

    constructor(parentContainer) {

        super("a", parentContainer);

    }


    set url(value) {

        this._htmlElement.href = value;

    }

}