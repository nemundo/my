let doc = new DocumentContainer();
doc.onLoaded=function () {

    let div = new DivContainer("app");

    let btn = new ButtonContainer(div);
    btn.label = 'Test';


    btn.onClick = function () {
        (new Debug).writeLog('Click');
    };
    btn.onMouseDown = function () {
        (new Debug).writeLog('MouseDown');
    };
    btn.onMouseUp = function () {
        (new Debug).writeLog('MouseUp');
    };
    btn.onTouchStart = function () {
        (new Debug).writeLog('TouchStart');
    };
    btn.onTouchEnd = function () {
        (new Debug).writeLog('TouchEnd');
    };


};