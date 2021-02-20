class ImageContainer extends BaseContainer {

    constructor(parentContainer) {
        super("img", parentContainer);
    }

    set imageUrl(value) {
        this._htmlElement.src =value;
    }

    set width(value) {
        this._htmlElement.width=value;
    }

    set height(value) {
        this._htmlElement.height=value;
    }

}
