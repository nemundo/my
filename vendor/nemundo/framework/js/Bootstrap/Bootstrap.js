class BootstrapButton extends ButtonContainer {


    constructor(parentContainer) {

        super(parentContainer);


        this.addCssClass("btn");
        this.addCssClass("btn-primary");


        // btn mb-2 btn-primary

    }


}


class BootstrapTextBox extends TextInputContainer {

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("form-control");


    }


}



class BootstrapTable extends TableContainer {

    constructor(parentContainer) {

        super(parentContainer);

        this.addCssClass("table");
        this.addCssClass("table-sm");
        this.addCssClass("table-hover");

    }


}