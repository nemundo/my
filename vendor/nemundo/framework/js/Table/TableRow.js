class TableRow extends BaseContainer {

    constructor(parentContainer) {
        super("tr", parentContainer);
    }

    addText(text) {
        let td = document.createElement("td");
        //td.innerText = text;
        td.innerHTML=text;
        this._htmlElement.appendChild(td);
    }

    addEmpty() {
        this.addText("&nbsp;");
    }

}