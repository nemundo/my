let doc = new DocumentContainer();

doc.onLoaded = function () {

    let builder = new UrlBuilder("/search");
    builder.addParameter("q", "search");
    builder.addParameter("name", "urs");

    (new Debug).write(builder.getUrl());

    let web = new WebRequest(builder.getUrl());
    web.onLoaded= function () {
        (new Debug).write(web.getJson());

        json = web.getJson();
        json.forEach(function(item) {
            (new Debug).write(item.subject);
        });

    };


};