class BaseContainerList {

    _htmlElementList = null;

    constructor(className) {

        this._htmlElementList = document.getElementsByClassName(className);

    }


    set onClick(event) {

        for (let i = 0; i < this._htmlElementList.length; i++) {
            this._htmlElementList[i].addEventListener('click', event, false);
        }

    }


    set onChange(event) {

        for (let i = 0; i < this._htmlElementList.length; i++) {
            this._htmlElementList[i].addEventListener('change', event, false);
        }
    }


}




// HtmlContainer
class BaseContainer {

    _htmlElement = null;

    constructor(tagName, parentContainer) {

        if (parentContainer !== null) {

            this._htmlElement = document.createElement(tagName);

            if (parentContainer instanceof BaseContainer) {
                parentContainer._htmlElement.appendChild(this._htmlElement);
            }

            if (parentContainer instanceof Node) {
                parentContainer.appendChild(this._htmlElement);
            }

            if (typeof parentContainer === "string") {
                this.fromId(parentContainer);
            }

            if (this._htmlElement == null) {
                (new Debug).writeError("problem");
            }

        }

    }


    fromId(id) {
        this._htmlElement = document.getElementById(id);
    }

    set id(value) {
        this._htmlElement.id = value;
    }

    get id() {
        return this._htmlElement.id;
    }

    set onClick(event) {
        this._htmlElement.addEventListener("click", event);
    }

    set onMouseDown(event) {
        this._htmlElement.addEventListener("mousedown", event);
    }

    set onMouseUp(event) {
        this._htmlElement.addEventListener("mouseup", event);
    }

    set onTouchStart(event) {
        this._htmlElement.addEventListener("touchstart", event);
    }

    set onTouchMove(event) {
        this._htmlElement.addEventListener("touchmove", event);
    }

    set onTouchEnd(event) {
        this._htmlElement.addEventListener("touchend", event);
    }

    set onChange(event) {
        this._htmlElement.addEventListener("change", event);
    }

    set onFocus(event) {
        this._htmlElement.addEventListener("focus", event);
    }

    set visible(value) {

        if (value) {
            this._htmlElement.style.visibility = "";
        } else {
            this._htmlElement.style.visibility = "hidden";
        }

    }

    addCssClass(cssClass) {

        // split cssClass

        this._htmlElement.classList.add(cssClass);
    }

    removeCssClass(cssClass) {
        this._htmlElement.classList.remove(cssClass);
    }

    removeContainer() {
        this._htmlElement.remove();
    }

    emptyContainer() {

        this._htmlElement.innerHTML = "";

    }


    getAttribute(name) {

        let value = this._htmlElement.getAttribute(name);
        return value;

    }

    getDataAttribute(name) {

        let value = this.getAttribute("data-" + name);
        return value;

    }

}
