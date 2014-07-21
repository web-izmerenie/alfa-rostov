;(function isolate() { function define() { var args = Array.prototype.slice.call(arguments, 0); if (typeof args[0] !== 'string') { args.unshift('localization'); } window.define.apply(this, args); } define.amd = { jQuery: true }; 
/**
 * Localization values
 *
 * @module localization
 * @author Viacheslav Lotsmanov
 * @encoding utf-8
 */

define(['get_val'],
function (getVal) {

    var locals = {

        'en': {

            'PAGE_TITLE': 'Page title',
            'HEADERS': {
                'FIRST': 'Header 1',
                'SECOND': 'Header 2'
            }

        },

        'ru': {

            'PAGE_TITLE': 'Заголовок страницы',
            'HEADERS': {
                'FIRST': 'Заголовок 1',
                'SECOND': 'Заголовок 2'
            }

        },

        'defaultLocal': getVal('lang')

    };

    return locals;

}); // define

// vim: set sw=4 ts=4 et foldmethod=marker fenc=utf-8 :

})();