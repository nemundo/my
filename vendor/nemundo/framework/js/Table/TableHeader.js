class TableHeader extends BaseContainer{

    constructor(parentContainer) {
        super("tr", parentContainer);
    }

    addText(text) {
        let td = document.createElement("th");
//        td.innerText = text;
        td.innerHTML = text;

        this._htmlElement.appendChild(td);
    }

    addEmpty() {
        this.addText("");
    }

}