let doc = new DocumentContainer();
doc.onLoaded = function () {

    let select = new SelectContainer('content-type-attachment');
    select.onChange = function () {

        let builder = new UrlBuilder(WebConfig.webUrl + "admin/content/content-json");
        builder.addParameter("content-type", select.value);

        let web = new WebRequest(builder.getUrl());
        web.onLoaded = function () {

            let json = web.getJson();

            let contentSelect = new SelectContainer('content-attachment');
            contentSelect.emptyContainer();

            json.forEach(function (item) {
                contentSelect.addItem(item.content_id, item.subject);
            });

        };

    }

};




