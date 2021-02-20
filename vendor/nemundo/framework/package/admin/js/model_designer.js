let formDocument = new DocumentContainer();
formDocument.onLoaded = function () {

    let select = new SelectContainer('external_model');
    select.onChange = function () {

        let form = new FormContainer('type_form');

        let url = new UrlBuilder(WebConfig.webUrl + 'model-designer/model/model-type-json');
        url.addParameter('project', form.getDataAttribute('project'));
        url.addParameter('app', form.getDataAttribute('app'));
        url.addParameter('model', select.value);

        let web = new WebRequest(url.getUrl());
        web.onLoaded = function () {

            let typeSelect = new SelectContainer('external_type');

            let json = web.getJson();
            for (let n = 0; n < web.getJsonCount(); n++) {
                typeSelect.addItem(json[n]['name'], json[n]['label']);
            }

        };

    };

};