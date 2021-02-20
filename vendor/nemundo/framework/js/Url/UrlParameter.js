class UrlParameter {

    getValue(parameterName) {

        let parameter = {};
        window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
            parameter[key] = value;
        });

        let value = null;
        if (parameterName in parameter) {
            value = parameter[parameterName];
        }

        return value;

    }

}
