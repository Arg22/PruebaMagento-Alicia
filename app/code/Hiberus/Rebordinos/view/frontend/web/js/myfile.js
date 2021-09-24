define(['jquery'], function($){
    "use strict";
    return function myscript(idBtn,idDiv)
    {
        $(idBtn).click(function(){
            $(idDiv).slideToggle();
        });
    }
});
