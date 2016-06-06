$(document).on('keypress', '#search', function(e){
    var code = e.keyCode || e.which;
    if (code == 13 && ! $(e.target).is('textarea, input[type="submit"], input[type="button"]' )) {
        e.preventDefault()
        return false;
    }
});
