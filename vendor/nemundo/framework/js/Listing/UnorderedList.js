class UnorderedList extends BaseContainer {

    constructor(parentContainer) {
        super("ul",parentContainer);
    }

    addItem(text) {
        let li = document.createElement("li");
        li.innerHTML = text;
        this._htmlElement.appendChild(li);
    }

}