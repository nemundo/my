let doc = new DocumentContainer();

doc.onLoaded = function () {

    this.title = "NemundoJs";

    let app = new DivContainer("app");

    let body = doc.getBody();

    let title = new H1Container(body);
    title.text = "Hello World";

    let button = new ButtonContainer(body);
    button.label = "Click";
    button.onClick = function () {
        (new Debug).write("Click");
    };
    button.onMouseDown = function () {
        (new Debug).write("Mouse Down");
        Status.mouseActive = true;

        Status.clickTime = Date.now();

        Status.number++;
        input.value = Status.number;


    };

    button.onMouseUp = function () {

        (new Debug).write("Mouse Up");

        Status.mouseActive = false;

        var millis = Date.now() - Status.clickTime;

        (new Debug).writeWarning(millis);

    };


    let input = new TextInputContainer(body);
    input.value = Status.number;

    let timer = new Timer();
    timer.intervall = 100;
    timer.onTime = function () {


        var millis = Date.now() - Status.clickTime;

        if (millis > 300) {

            if (Status.mouseActive) {
                Status.number++;
                input.value = Status.number;
            }
        }

    };


};

doc.keyDown = function (e) {
    (new Debug).write(e.keyCode);
};


class Status {

    static number = 0;

    static mouseActive = false;

    static clickTime;

}
