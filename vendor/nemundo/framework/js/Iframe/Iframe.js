class IframeContainer extends ContentContainer {

    constructor(parentContainer) {

        super("iframe", parentContainer);

    }

    set src(value) {
        this._htmlElement.src = value;
    }

    set width(value) {
        this._htmlElement.width = value;
    }

    set height(value) {
        this._htmlElement.height = value;
    }

    set frameborder(value) {
        this._htmlElement.frameborder = value;
    }

}