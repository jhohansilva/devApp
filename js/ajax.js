(function ($) {
    $.ruta_datos = {
        _init: function (type, config) {
            // var http = config.url_ctrl ? ctrl(config.url_ctrl) : config.url;
            var http = config.url;


            $.ajax({
                method: type,
                data: config.data,
                dataType: config.dataType || 'json',
                url: http,
                async: false,
                beforeSend: function (request) {
                    // if (config.method) request.setRequestHeader("Method", config.method);
                }
            }).done(function (data) {
                document.getElementById('loader').hide();
                config.callback(data);
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.error(errorThrown);
                localStorage.removeItem('clave');
                localStorage.removeItem('email');
                document.getElementById('loader').hide();
                ons.notification.alert({
                    title: 'Error',
                    message: errorThrown.toString().substring(0, 80)
                });
            });
        }
    }

    get_data = function (config) {
        if (!config.data) config.data = null;
        if (!config.url) $.NotificationApp.send("Error!", "URL no definida para la consulta", 'bottom-right', 'rgba(0,0,0,0.2)', 'error');
        else if (!config.callback) $.NotificationApp.send("Error!", "Función de retorno no definida para la consulta", 'bottom-right', 'rgba(0,0,0,0.2)', 'error');
        else $.ruta_datos._init('GET', config);
    }

    send_data = function (config) {
        if (!config.data) config.data = null;
        if (!config.url && !config.url_ctrl) $.NotificationApp.send("Error!", "URL no definida para la consulta", 'bottom-right', 'rgba(0,0,0,0.2)', 'error');
        else if (!config.callback) $.NotificationApp.send("Error!", "Función de retorno no definida para la consulta", 'bottom-right', 'rgba(0,0,0,0.2)', 'error');
        else $.ruta_datos._init('POST', config);
    }

})(jQuery);