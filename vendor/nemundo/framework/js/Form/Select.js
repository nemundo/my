class SelectContainer extends FormBaseContainer {


    constructor(parentContainer) {
        super("select", parentContainer);
    }


    addItem(value, label) {

        let option = document.createElement("option");
        option.value = value;
        option.innerText = label;
        this._htmlElement.appendChild(option);

    }


    set value(value) {

        this._htmlElement.value = value;

    }


    get value() {

        return this._htmlElement.value;

    }


    get text() {

        return this._htmlElement.options[this._htmlElement.selectedIndex].innerHTML;

    }

}




