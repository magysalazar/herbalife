/**
 * Created by RaFaEl on 4/30/2017.
 */
var WEB_HOST = window.location.hostname+'/';
var WEB_ORIGIN = window.location.origin+'/';
var PATH = window.location.pathname;


var oPageBack = {
    init: function(){
        oFormAdvance.init();
        oFormAdvance.set();
        oFootable.init();
        oDataTables.init();

        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 5000
        };

        $.each($('#side-menu >li'), function(index){
            if(index > 1){
                if($(this).find('ul li').html() == undefined){
                    $(this).addClass('display-none');
                }
            }
        });
    }
};

var oUser = {
    login: function(obj){
        var form = $("#userModal").find("form");
        console.log(form.html());
    },

    register: function(){

    }
};

var oCrud = {
    save: function(obj,funct){
        var form = $(obj).closest('form');
        var modal = $(obj).closest('.modal');
        var input = $("<input>").attr("type", "hidden").attr("name", "fromAjax").val(form.attr('id'));
        form.append(input);
        var url = form.attr('action');
        $.ajaxSetup({async: false});
        $.post(url,form.serialize(),function(response){
            console.log(response);
            if(response.error == 'ok'){
                toastr.success(response.message);
                if(typeof funct == 'function'){
                    funct(obj);
                }
            } else {
                modal.find('.modal-body').html(response.view);
                toastr.warning(response.error);
            }
        },'json').done(function(){
            $.ajaxSetup({async: true});
        });
    },
    list: function(){

    },
    getFieldsFromTable: function(obj){
        // ********* Responde con un input con clase 'table-fields'
        var table = $(obj).find("option:selected").html();
        var url = WEB_ROOT+'base/ajax/exportFields/'+table+'/';
        $.post(url, function(response){
            if(response.error == 'ok'){
                var fields = response.fields;
                delete(response['error']);
                delete(response['fields']);
                var htmlRef = '';
                var htmlFields = '';
                $.each(response, function(key, value){
                    htmlRef += "<option value='"+value+"'>"+value+"</option>";
                });
                $.each(fields, function(key, value){
                    htmlFields += "<option value='"+value+"'>"+value+"</option>";
                });
                $(obj).closest('form').find('select.table-fields').html(htmlFields);
                $(obj).closest('form').find('select.table-ref').html(htmlRef);
            } else {
                $(obj).closest('form').find('select.table-fields').html('');
                $(obj).closest('form').find('select.table-ref').html('');
                estic.warning(response.error);
            }
        },'json');
    },
    deleteFromDB: function(dir){
        if(confirm('Estas a punto de eliminar el registro de forma definitiva, Estas Seguro?')){
            var url = '/base/ajax/deleteRegistryFromDB/';
            console.log(url);
            $.post(url,{dir:dir}, function(response){
                console.log(response);
                if(response.error == 'ok'){
                    estic.success(response.message);
                    $("#ContentView").html(response.view);
                } else {
                    estic.warning(response.message);
                }
            },'json');
        };
    }
};

var oModal = {
    verified:false,
    formData:[],
    formDataPks:[],
    error:'',
    json :null,
    open: function(obj){
        console.log('Modal has been opened');

        var checked = $(obj).prop('checked') == undefined ? true : Boolean($(obj).prop('checked'));
        var table = $(obj).attr('subTable') != undefined ? $(obj).attr('subTable') : ($(obj).attr('subtable') != undefined ? $(obj).attr('subtable') : $(obj).attr('table'));
        var view = $(obj).attr('subView') != undefined ? $(obj).attr('subView') : ($(obj).attr('subview') != undefined ? $(obj).attr('subview') : '');
        var action = $(obj).attr('action');
        var idModal = null;
        var url = WEB_ORIGIN+'base/ajax/'+table+'/'+action+'/'+view;
        var tableParent = null;
        var $modal = null;
        var aValues = [];
        var oChecked = $(obj).closest('div').find('input:checked');
        $.each(oChecked, function(i){
            aValues[i] = $(this).val();
        });
        if($('.modal').hasClass('in')){
            idModal = $('.modal.in').attr('id');
            tableParent = $('.modal.in').attr('subTable');
            $modal = $('#'+idModal);
            url += '?verifyFields='+tableParent;
        } else {
            idModal = $(obj).attr('id')+'Modal';
            $modal = $('#'+idModal);
            table = $(obj).attr('subTable');
        }
        var dataset = {};
        if(obj.dataset != undefined){
            dataset = obj.dataset;
        }
        $.post(url, {data:dataset}, function (response){
            if($modal.hasClass('in')){
                var $newDiv = $("<div class='dinamic-panel'>"+response.view+"</div>");
                var intersected = $.map(response.intersect, function(value, index){
                    return [index];
                });
                $.each(intersected,function(index){
                    var old = $modal.find('[name='+this.toString()+']').val();
                    if(old != undefined){
                        $newDiv.find('[name='+this.toString()+']').val(old);
                    }
                    var group = $newDiv.find('[name='+this.toString()+']').closest('div.form-group');
                    group.addClass('display-none');
                    $newDiv.find('.error').remove();
                });


                var aItems = [];
                var aItemsWithData = [];
                var aItemsFiltered = [];
                for (var i = 0; i < 10; i++) {
                    if ($($newDiv).find('[data-' + i + ']').length > 0) {
                        aItemsWithData[i] = $($newDiv).find('[data-' + i + ']');
                        $.each(aValues, function (index, value) {
                            $.each(aItemsWithData[i], function () {
                                if ($(this).attr('data-' + i) == value) {
                                    aItemsFiltered[$(this).val()] = this;
                                }
                            });
                        });
                    }
                }

                var submits = $($newDiv).find('[type="submit"]');
                $.each(submits, function(){
                    $($newDiv).find(this).remove();
                });
                var labels = $($newDiv).find('label.col-form-label');
                $.each(labels, function(){
                    $($newDiv).find(this).remove();
                });
                if (aItemsFiltered.length > 0) {
                    var newHtml = '';
                    $.each(aItemsFiltered, function (index) {
                        var form = $($newDiv).find(this).closest('form');
                        var html = form.html();
                        if(html != undefined){
                            newHtml += "<form id='"+form.attr('id')+index+"' action='"+form.attr('action')+"'>"+$($newDiv).find(this).closest('form').html()+"</form>";
                        }
                    });
                    $($newDiv).html('');
                    $($newDiv).html(newHtml);
                }

                $modal.find('.modal-body .dinamic-panel').remove();
                $modal.find('.modal-body').find('.modal').remove();
                if(checked){
                    $modal.find('.modal-body').append($newDiv);
                } else {
                    $modal.find('.modal-body .dinamic-panel').remove();
                }
            } else {
                $('.modal-body').html(response.view);
                $('.modal-body').find('.error').remove();
                $('.modal-body').find('input[type="submit"]').remove();
                $modal.attr('subTable',table);
            }
        },'json').done(function(){
            if (!$modal.hasClass('in')){
                $modal.modal({backdrop: 'static', keyboard: false});
                $modal.modal('show');
            }
            // $modal.find('#btnSave').addClass('display-none');
            $modal.find('#btnAction').html("Guardar").click(function (obj) {
                if (!oModal.verified) {
                    var modal = $(this).closest('.modal');
                    var form = modal.find('form');
                    if (form.length > 1) {
                        $.ajaxSetup({async: false});
                        $.each(form, function () {
                            var input = $("<input>").attr("type", "hidden").attr("name", "fromAjax").val($(this).attr('id'));
                            $(this).append(input);
                            var url = $(this).attr('action');
                            oModal.formData = $.merge($(this).serializeArray(), oModal.formDataPks);
                            $.post(url, oModal.formData, function (response) {
                                oModal.error = response.error;
                                console.log(response);
                                if (response.error == 'ok') {
                                    var primary = response.primary;
                                    var pk = response.pk;
                                    var pkField = {};
                                    pkField.name = primary;
                                    pkField.value = pk;
                                    oModal.formDataPks.push(pkField);
                                    modal.closest('.modal-body').html(response.view);
                                    modal.closest('.modal-body').find('.error').remove();
                                    toastr.success(response.message);
                                    oModal.verified = true;
                                }
                            }, 'json').done(function () {
                                oPageBack.init();
                            });
                        });
                        modal.modal('hide');
                        setTimeout(function () {
                            oModal.verified = false;
                            //$(location).attr('href',WEB_SERVER+response.redirect);
                        }, 1500);
                        oModal.formDataPks = [];
                        oModal.formData = [];
                    } else {
                        $.ajaxSetup({async: true});
                        form = form[0];
                        var input = $("<input>").attr("type", "hidden").attr("name", "fromAjax").val($(this).attr('id'));
                        $(form).append(input);
                        var url = $(form).attr('action');
                        oModal.formData = $.merge($(form).serializeArray(), oModal.formDataPks);
                        $.post(url, oModal.formData, function (response) {
                            oModal.error = response.error;
                            console.log(response);
                            if (response.error == 'ok') {
                                var primary = response.primary;
                                var pk = response.pk;
                                var pkField = {};
                                pkField.name = primary;
                                pkField.value = pk;
                                oModal.formDataPks.push(pkField);
                                modal.closest('.modal-body').html(response.view);
                                modal.closest('.modal-body').find('.error').remove();
                                toastr.success(response.message);
                                oModal.verified = true;
                                modal.modal('hide');
                                setTimeout(function () {
                                    location.reload();
                                }, 1500);
                            } else {
                                modal.find('.modal-body').html(response.view);
                                toastr.warning(response.error);
                                oModal.verified = false;
                                oModal.formDataPks = [];
                                oModal.formData = [];
                            }
                        }, 'json').done(function () {
                            oPageBack.init();
                        });
                    }
                }
                oPageBack.init();
            });
            oPageBack.init();
        });
    },
};


var oComanda = {
    importes:{},
    costos : {},
    costo:0,
    porcion:0,
    catidad:0,
    idProd:0,
    calcularImporte: function(obj){

        var dataPorcion = 0;
        var dataCantidad = 0;
        var $fieldProducto = null;
        var $fieldCantidad = null;

        if($(obj).attr('name') == 'cantidad'){
            $fieldProducto = $(obj).closest('form').find('#fieldId_producto');
            $fieldCantidad = $(obj);
        } else {
            $fieldProducto = $(obj);
            $fieldCantidad = $(obj).closest('form').find('#fieldCantidad');
        }

        dataPorcion = parseInt($fieldProducto.attr('data-porcion'));
        dataCantidad = parseInt($fieldCantidad.val());

        var idProd = $fieldProducto.val();

        oComanda.importes[idProd] = {};
        oComanda.importes[idProd].precioPorcion = 0;
        oComanda.importes[idProd].cantidad = 0;
        oComanda.importes[idProd].chk =false;
        oComanda.importes[idProd].precioPorcion = dataPorcion;
        oComanda.importes[idProd].cantidad = isNaN(dataCantidad) ? 0 : dataCantidad;
        oComanda.importes[idProd].chk = $fieldProducto.prop('checked');

        oComanda.calcular();
    },

    calcular:function(){
        $.each(oComanda.importes, function(idProd, props){
            if(props.chk){
                oComanda.costos[idProd] = props.precioPorcion * props.cantidad;
            } else {
                if(oComanda.costos[idProd]){
                    delete oComanda.costos[idProd];
                }
            }
        });
        oComanda.costo = 0;
        $.each(oComanda.costos, function(index,value){
            oComanda.costo += value;
        });
        $('#fieldImporte').val(oComanda.costo);
        // this.resetValues();
    },

    resetValues: function(){
        oComanda.cantidad = 0;
        oComanda.porcion = 0;
        oComanda.costos = {};
        oComanda.costo = 0;
        oComanda.importes = {};
        oVaso.cantidadProductos = 0;
    }
}

var oVaso = {
    cantidadProductos: 0,
    calcularNumProductos: function (obj) {
        if ($(obj).prop('checked')) {
            oVaso.cantidadProductos++;
        } else {
            oVaso.cantidadProductos--;
        }
        $('[name="num_productos"]').val(oVaso.cantidadProductos);
    }
}