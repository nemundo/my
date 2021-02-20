



class AppTitle extends H1Container {

    constructor(parentElement) {

        super(parentElement);
        this.text = "Hello World App";

    }

}




let parentElement = document.getElementById("app");



let title = new H1Container();
title.text = "Hello World App";

new AppTitle(parentElement);



let input = new TextInputContainer(parentElement);
input.setValue("default value");

let checkbox = new CheckboxContainer(parentElement);
checkbox.onChange = function () {
  input.setValue("change"+checkbox.getValue());
};


let button = new ButtonContainer(parentElement);
button.label = "Ok";
button.onClick = function () {

    //p.text = "Hello "+input.getValue();
    countryList.setValue("ch");

    //p.visible=false;
    //button.visible=false;

    //let image = new ImageContainer(parentElement);
    //image.imageUrl = "/schleuniger/web/img/logo.png";

};



let countryList = new SelectContainer(parentElement);
countryList.addItem('ch','Switzerland');
countryList.addItem('de','Germany');
countryList.addItem('uk','United Kingdom');
countryList.onChange = function () {
  p.text = countryList.getValue();
};






let p = new ParagraphContainer(parentElement);
p.text = "irgendein text";

let div = new DivContainer(parentElement);
div.addCssClass("div1");
div.onClick = function () {
    div.visible =false;
    //console.log("click");
};







