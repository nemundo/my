class TableContainer extends BaseContainer {

    constructor(parentContainer) {
        super("table", parentContainer);
    }

    set border(value) {
        this._htmlElement.border = value;
    }

}
