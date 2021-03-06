/**
 * Main module
 *
 * @module main
 * @author Viacheslav Lotsmanov
 */

define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {

    require.config({
        map: {
            '*': {

                /* short name aliases */

                'jquery.cookie': 'libs/jquery.cookie-1.4.0',
                
                'get_val': 'basics/get_val',
                'get_local_text': 'basics/get_local_text'

            }
        }
    });

    require(['common']);
    require(['pages/nr_materials']);
    require(['pages/nr_materials_detail']);
    require(['pages/nr_materials_detail_moreicons']);
    require(['pages/article_detail_colblocks']);
    require(['pages/two_cols']);
    require(['pages/contacts']);
    require(['pages/404']);
    require(['pages/main_page']);
}); // domReady
}); // define

// vim: set sw=4 ts=4 et foldmethod=marker :
