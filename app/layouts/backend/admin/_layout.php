<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HERBALIFE - ADMIN</title>

    <!--  Main Styles  -->
    <!-- Data Tables -->
    <link href="<?=site_url('css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=site_url('app/css/estic-back.min.css')?>" rel="stylesheet">
    <link href="<?=site_url('app/css/estic-back.css')?>" rel="stylesheet">
    <link href="<?=site_url('font-awesome/css/font-awesome.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/dataTables/dataTables.bootstrap.css')?>" rel="stylesheet">

    <link href="<?=site_url('gui/inspinia/css/plugins/dataTables/dataTables.responsive.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/dataTables/dataTables.tableTools.min.css')?>" rel="stylesheet">

    <link href="<?=site_url('gui/inspinia/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

    <!-- Morris -->
    <link href="<?=site_url('gui/inspinia/css/plugins/morris/morris-0.4.3.min.css')?>" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?=site_url('gui/inspinia/js/plugins/gritter/jquery.gritter.css')?>" rel="stylesheet">

    <link href="<?=site_url('gui/inspinia/css/animate.css')?>" rel="stylesheet">


    <!--  Main Form Items  -->
    <link href="<?=site_url('gui/inspinia/css/plugins/iCheck/custom.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/chosen/chosen.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/colorpicker/bootstrap-colorpicker.min.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/cropper/cropper.min.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/switchery/switchery.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/jasny/jasny-bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/nouslider/jquery.nouislider.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/datapicker/datepicker3.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/ionRangeSlider/ion.rangeSlider.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/clockpicker/clockpicker.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/daterangepicker/daterangepicker-bs3.css')?>" rel="stylesheet">

    <!--  Main Fonts  -->
    <link href="<?=site_url('app/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/plugins/footable/footable.core.css')?>" rel="stylesheet">
    <link href="<?=site_url('gui/inspinia/css/style.css')?>" rel="stylesheet">

    <!-- Mainly scripts -->
    <script src="<?=site_url("app/js/estic-back.min.js")?>"></script>
    <script src="<?=site_url("app/js/estic-back.js")?>"></script>
    <script src="<?=site_url("app/js/tinymce/tinymce.min.js")?>"></script>
    <script>
        $.fn.datepicker.defaults.format = "yyyy-mm-dd";
        tinymce.init({selector: '.textTinymce'});
        $('.datepicker').datepicker(
            {format: 'yyyy-mm-dd'}
        );
    </script>
</head>

<body>
<div class="inspinia">

<?php
if(isset($subLayout) && $subLayout != ''){
    $this->load->view($subLayout);
} else {
    if(isset($subview) && $subview != '') {
        $this->load->view($subview);
    }
}
?>
</div>

<!-- Data footable -->
<script src="<?=site_url("gui/inspinia/js/plugins/footable/footable.all.min.js")?>"></script>

<!-- Data Tables -->
<script src="<?=site_url("gui/inspinia/js/plugins/metisMenu/jquery.metisMenu.js")?>"></script>
<script src="<?=site_url("gui/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js")?>"></script>
<script src="<?=site_url("gui/inspinia/js/plugins/jeditable/jquery.jeditable.js")?>"></script>

<script src="<?=site_url("gui/inspinia/js/plugins/dataTables/jquery.dataTables.js")?>"></script>
<script src="<?=site_url("gui/inspinia/js/plugins/dataTables/dataTables.bootstrap.js")?>"></script>
<script src="<?=site_url("gui/inspinia/js/plugins/dataTables/dataTables.tableTools.min.js")?>"></script>

<!--  Main Form Items  -->

<!-- Chosen -->
<script src="<?=site_url("gui/inspinia/js/plugins/chosen/chosen.jquery.js")?>"></script>
<!-- JSKnob -->
<script src="<?=site_url("gui/inspinia/js/plugins/jsKnob/jquery.knob.js")?>"></script>
<!-- Input Mask-->
<script src="<?=site_url("gui/inspinia/js/plugins/jasny/jasny-bootstrap.min.js")?>"></script>
<!-- Data picker -->
<script src="<?=site_url("gui/inspinia/js/plugins/datapicker/bootstrap-datepicker.js")?>"></script>
<!-- NouSlider -->
<script src="<?=site_url("gui/inspinia/js/plugins/nouslider/jquery.nouislider.min.js")?>"></script>
<!-- Switchery -->
<script src="<?=site_url("gui/inspinia/js/plugins/switchery/switchery.js")?>"></script>
<!-- IonRangeSlider -->
<script src="<?=site_url("gui/inspinia/js/plugins/ionRangeSlider/ion.rangeSlider.min.js")?>"></script>
<!-- iCheck -->
<script src="<?=site_url("gui/inspinia/js/plugins/iCheck/icheck.min.js")?>"></script>
<!-- MENU -->
<script src="<?=site_url("gui/inspinia/js/plugins/metisMenu/jquery.metisMenu.js")?>"></script>
<!-- Color picker -->
<script src="<?=site_url("gui/inspinia/js/plugins/colorpicker/bootstrap-colorpicker.min.js")?>"></script>
<!-- Clock picker -->
<script src="<?=site_url("gui/inspinia/js/plugins/clockpicker/clockpicker.js")?>"></script>
<!-- Image cropper -->
<script src="<?=site_url("gui/inspinia/js/plugins/cropper/cropper.min.js")?>"></script>
<!-- Date range use moment.js same as full calendar plugin -->
<script src="<?=site_url("gui/inspinia/js/plugins/fullcalendar/moment.min.js")?>"></script>
<!-- Date range picker -->
<script src="<?=site_url("gui/inspinia/js/plugins/daterangepicker/daterangepicker.js")?>"></script>

<!-- Custom and plugin javascript -->
<script src="<?=site_url("gui/inspinia/js/inspinia.js")?>"></script>
<script src="<?=site_url("gui/inspinia/js/plugins/pace/pace.min.js")?>"></script>

<!-- Flot -->
<script src="<?=site_url("gui/inspinia/js/plugins/flot/jquery.flot.js")?>"></script>
<script src="<?=site_url("gui/inspinia/js/plugins/flot/jquery.flot.tooltip.min.js")?>"></script>
<script src="<?=site_url("gui/inspinia/js/plugins/flot/jquery.flot.spline.js")?>"></script>
<script src="<?=site_url("gui/inspinia/js/plugins/flot/jquery.flot.resize.js")?>"></script>
<script src="<?=site_url("gui/inspinia/js/plugins/flot/jquery.flot.pie.js")?>"></script>
<script src="<?=site_url("gui/inspinia/js/plugins/flot/jquery.flot.symbol.js")?>"></script>
<script src="<?=site_url("gui/inspinia/js/plugins/flot/jquery.flot.time.js")?>"></script>

<!-- Peity -->
<script src="<?=site_url("gui/inspinia/js/plugins/peity/jquery.peity.min.js")?>"></script>
<script src="<?=site_url("gui/inspinia/js/demo/peity-demo.js")?>"></script>

<!-- Custom and plugin javascript -->
<script src="<?=site_url("gui/inspinia/js/inspinia.js")?>"></script>


<!-- jQuery UI -->
<script src="<?=site_url("gui/inspinia/js/plugins/jquery-ui/jquery-ui.min.js")?>"></script>

<!-- Jvectormap -->
<script src="<?=site_url("gui/inspinia/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js")?>"></script>
<script src="<?=site_url("gui/inspinia/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")?>"></script>

<!-- EayPIE -->
<script src="<?=site_url("gui/inspinia/js/plugins/easypiechart/jquery.easypiechart.js")?>"></script>

<!-- Sparkline -->
<script src="<?=site_url("gui/inspinia/js/plugins/sparkline/jquery.sparkline.min.js")?>"></script>

<!-- Sparkline demo data  -->
<script src="<?=site_url("gui/inspinia/js/demo/sparkline-demo.js")?>"></script>

<?php include_once APPPATH."layouts/backend/js.php"; ?>
</body>
</html>
