class ContentContainer extends BaseContainer {

    set text(value) {
        this._htmlElement.innerHTML = value;
    }

    emptyContainer() {
        this.text = "";
    }

}