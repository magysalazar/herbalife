/**
 * Created by rafaelgutierrez on 18/7/18.
 */

var estic = {
    success: function(message){
        toastr.success(message);
    },
    warning: function(message){
        toastr.warning(message);
    },
    error: function (message) {
        toastr.error(message);
    },
    info: function (message) {
        toastr.info(message);
    }
}