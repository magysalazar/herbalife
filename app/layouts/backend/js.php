<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 11/18/2017
 * Time: 1:24 AM
 */
?>

<script>
    var ROOT_PATH = "<?=ROOT_PATH ?>";
    var WEB_SERVER = "<?=WEB_SERVER ?>";
    var WEB_ROOT = "<?=WEB_ROOT ?>";
    var PROTOCOL = "<?=PROTOCOL ?>";
    var BASEPATH = "<?=BASEPATH ?>";
    var APPPATH = "<?=APPPATH ?>";
    var ORMPATH = "<?=ORMPATH ?>";
    var FCPATH = "<?=FCPATH ?>";
    var SYSDIR = "<?=SYSDIR ?>";

    // ------------------- Functions on ready ----------------------
    $(document).ready(function() {
        oPageBack.init();
    });

    // ------------------ functions loaded ----------------------
    function fnClickAddRow() {
        if($('#editable').html() != undefined){
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );
        }
    };

    // -------------------- Load Libraries ----------------------

    var oFormAdvance = {
        init: function () {

            if($(".image-crop > img").html() != undefined){

                var $image = $(".image-crop > img");

                $($image).cropper({
                    aspectRatio: 1.618,
                    preview: ".img-preview",
                    done: function (data) {
                        // Output the result data for cropping image.
                    }
                });

                var $inputImage = $("#inputImage");

                if (window.FileReader) {
                    $inputImage.change(function() {
                        var fileReader = new FileReader(),
                            files = this.files,
                            file;

                        if (!files.length) {
                            return;
                        }

                        file = files[0];

                        if (/^image\/\w+$/.test(file.type)) {
                            fileReader.readAsDataURL(file);
                            fileReader.onload = function () {
                                $inputImage.val("");
                                $image.cropper("reset", true).cropper("replace", this.result);
                            };
                        } else {
                            showMessage("Please choose an image file.");
                        }
                    });
                } else {
                    $inputImage.addClass("hide");
                }

                $("#download").click(function() {
                    window.open($image.cropper("getDataURL"));
                });

                $("#zoomIn").click(function() {
                    $image.cropper("zoom", 0.1);
                });

                $("#zoomOut").click(function() {
                    $image.cropper("zoom", -0.1);
                });

                $("#rotateLeft").click(function() {
                    $image.cropper("rotate", 45);
                });

                $("#rotateRight").click(function() {
                    $image.cropper("rotate", -45);
                });

                $("#setDrag").click(function() {
                    $image.cropper("setDragMode", "crop");
                });

                $('#data_1 .input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });

                $('#data_2 .input-group.date').datepicker({
                    startView: 1,
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true,
                    format: "dd/mm/yyyy"
                });

                $('#data_3 .input-group.date').datepicker({
                    startView: 2,
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true
                });

                $('#data_4 .input-group.date').datepicker({
                    minViewMode: 1,
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true,
                    todayHighlight: true
                });

                $('#data_5 .input-daterange').datepicker({
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true
                });

                var elem = document.querySelector('.js-switch');
                var switchery = new Switchery(elem, { color: '#800080' });

                var elem_2 = document.querySelector('.js-switch_2');
                var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

                var elem_3 = document.querySelector('.js-switch_3');
                var switchery_3 = new Switchery(elem_3, { color: '#800080' });
            }


            if($('.i-checks').html() != undefined){
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green'
                });
            }

            if($('.demo1').html() != undefined){
                $('.demo1').colorpicker();
            }

            if($('.back-change').html() != undefined){
                var divStyle = $('.back-change')[0].style;
                $('#demo_apidemo').colorpicker({
                    color: divStyle.backgroundColor
                }).on('changeColor', function(ev) {
                    divStyle.backgroundColor = ev.color.toHex();
                });
            }

            if($('.clockpicker').html() != undefined){
                $('.clockpicker').clockpicker();
            }

            if($('input[name="daterange"]').html() != undefined){
                $('input[name="daterange"]').daterangepicker();
            }

            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: { days: 60 },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-primary',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });
        },

        set: function(){
            var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

            if($("#ionrange_1").html() != undefined){
                $("#ionrange_1").ionRangeSlider({
                    min: 0,
                    max: 5000,
                    type: 'double',
                    prefix: "$",
                    maxPostfix: "+",
                    prettify: false,
                    hasGrid: true
                });
            }

            if($("#ionrange_2").html() != undefined){
                $("#ionrange_2").ionRangeSlider({
                    min: 0,
                    max: 10,
                    type: 'single',
                    step: 0.1,
                    postfix: " carats",
                    prettify: false,
                    hasGrid: true
                });
            }

            if($("#ionrange_3").html() != undefined){
                $("#ionrange_3").ionRangeSlider({
                    min: -50,
                    max: 50,
                    from: 0,
                    postfix: "°",
                    prettify: false,
                    hasGrid: true
                });
            }

            if($("#ionrange_4").html() != undefined){
                $("#ionrange_4").ionRangeSlider({
                    values: [
                        "January", "February", "March",
                        "April", "May", "June",
                        "July", "August", "September",
                        "October", "November", "December"
                    ],
                    type: 'single',
                    hasGrid: true
                });
            }

            if($("#ionrange_5").html() != undefined){
                $("#ionrange_5").ionRangeSlider({
                    min: 10000,
                    max: 100000,
                    step: 100,
                    postfix: " km",
                    from: 55000,
                    hideMinMax: true,
                    hideFromTo: false
                });
            }

            if($(".dial").html() != undefined){
                $(".dial").knob();
            }

            if($("#basic_slider").html() != undefined){
                $("#basic_slider").noUiSlider({
                    start: 40,
                    behaviour: 'tap',
                    connect: 'upper',
                    range: {
                        'min':  20,
                        'max':  80
                    }
                });
            }

            if($("#range_slider").html() != undefined){
                $("#range_slider").noUiSlider({
                    start: [ 40, 60 ],
                    behaviour: 'drag',
                    connect: true,
                    range: {
                        'min':  20,
                        'max':  80
                    }
                });
            }

            if($("#drag-fixed").html() != undefined){
                $("#drag-fixed").noUiSlider({
                    start: [ 40, 60 ],
                    behaviour: 'drag-fixed',
                    connect: true,
                    range: {
                        'min':  20,
                        'max':  80
                    }
                });
            }
        }
    };

    var oFootable = {
        init:function(){
            $('.footable').footable();
            $('.datepicker').datepicker(
                {format: 'yyyy-mm-dd'}
            );
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "<?=site_url("gui/inspinia/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf")?>"
                }
            });
        }
    }

    var oDataTables = {
        init:function(){
            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );

        }
    }

</script>
