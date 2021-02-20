let doc = new DocumentContainer();
doc.onLoaded = function () {

    let select = new SelectContainer('select-id');
    select.onChange = function () {
        (new Debug).write(select.value);
    }

};