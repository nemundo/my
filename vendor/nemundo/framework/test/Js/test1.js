//let a = "hello";


let doc = new DocumentContainer();
doc.onLoaded = function () {


    let app = new DivContainer("app");

    let div1 = new DivContainer(app);
    div1.text = "hello world";

    let listBox = new SelectContainer(app);
    listBox.addItem(0,"CH");
    listBox.addItem(1,"DE");
    listBox.addItem(2,"AT");

    listBox.value = 2;


    let button = new ButtonContainer(app);
    button.label = "Clear";
    button.onClick = function() {

      if (active.value) {
          input.clearInput();
      }

      input.setFocus();

    };

    let input = new TextInputContainer(app);
    input.value = "hello";

    let active = new CheckboxContainer(app);



};
