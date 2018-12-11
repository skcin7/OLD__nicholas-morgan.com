
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app'
// });



require('./bootstrap');
window.App = {};
;(function(app, $, undefined) {
    /**
     * Modules loaded into the application.
     *
     * @type {Array}
     */
    app.modules = [];

    /**
     * Components loaded into the application.
     *
     * @type {Array}
     */
    app.components = [];

    /**
     * Store all data needed for the app here.
     *
     * @type {{}}
     */
    app.appData = {};

    /**
     * Initialize App.
     *
     * @param config
     */
    app.init = function(config) {
        // Display friendly message:
        console.log(config.message || "Initializing '" + (config.name || "nicholas-morgan") + "' application!! =D");

        // Set any application environment variables which may be passed
        // into the application as it is being created...
        app.appData = config.appData || {};

        // Loop through all loaded modules, and initialize them, but only
        // if the user is on the page that the module is intended for.
        // If modules other than for the current page are needed for
        // some reason, they may be initialized manually.
        if(config.modules) {
            config.modules.forEach(function(module) {
                var moduleMessage = 'Module: \'' + module.name + '\' has been loaded.';
                // Only load module if the module is current page loaded in the application.
                if($('html#' + module.name).length === 1) {
                    app.getModule(module.name).initModule(module.config);
                    moduleMessage += '.. and initialized!';
                }
                console.log(moduleMessage);
            });
        }

        // Loop through all loaded components, and initialize the one that
        // the config of this app has defined to be used.
        if(config.components) {
            config.components.forEach(function(component) {
                app.getComponent(component.name).initComponent(component.config);
                console.log('Component: \'' + component.name + '\' has been loaded... and initialized!');
            });
        }

        // Attach the scroll event to document so we can keep the logo following the screen if needed:
        $(document).scroll(function() {
            if($(this).scrollTop() > 50) {
                $('#logo').css({
                    position: 'fixed',
                    top: 10
                });
            }
            else {
                $('#logo').css({
                    position: 'absolute',
                    top: 54
                });
            }
        });
    };

    /**
     * Get a module loaded into the application.
     *
     * @param moduleName
     * @returns {*}
     */
    app.getModule = function(moduleName) {
        for(var i = 0; i < app.modules.length; i++) {
            if(moduleName === app.modules[i].moduleName) {
                return app.modules[i];
            }
        }
        return null;
    };

    /**
     * Get a component loaded into the application.
     *
     * @param componentName
     * @returns {*}
     */
    app.getComponent = function(componentName) {
        for(var i = 0; i < app.components.length; i++) {
            if(componentName === app.components[i].componentName) {
                return app.components[i];
            }
        }
        return null;
    };

    /**
     * Form a URL. For use with things like AJAX requests.
     *
     * @param path
     * @returns {string}
     */
    app.url = function(path) {
        var appPathLastChar = app.appData.url.charAt( app.appData.url.length - 1 );
        var pathLastCharacter = path.charAt(0);

        // Both have a slash, so remove one of them.
        if(appPathLastChar === "/" && pathLastCharacter === "/")
            path = path.substring(1);

        // Neither have a slash, so add one
        if(appPathLastChar !== "/" && pathLastCharacter !== "/")
            path = "/" + path;

        return app.appData.url + path;
    };

})(window.App, jQuery);

// Load modules:
require('./modules/Homepage');