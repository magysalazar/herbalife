module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            build: {
                src: [

                <!-- Mainly scripts -->
                    'app/js/jquery-2.2.4/jquery-2.2.4.js',
                    'gui/inspinia/js/jquery-2.1.1.js',
                    'app/js/bootstrap-3.0.3/bootstrap.js',
                    'gui/inspinia/js/bootstrap.min.js',
                    'gui/inspinia/js/plugins/metisMenu/jquery.metisMenu.js',
                    'gui/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js',
                    'gui/inspinia/js/plugins/flot/jquery.flot.js',
                    'gui/inspinia/js/plugins/flot/jquery.flot.tooltip.min.js',
                    'gui/inspinia/js/plugins/flot/jquery.flot.spline.js',
                    'gui/inspinia/js/plugins/flot/jquery.flot.resize.js',
                    'gui/inspinia/js/plugins/flot/jquery.flot.pie.js',
                    'gui/inspinia/js/plugins/peity/jquery.peity.min.js',
                    'gui/inspinia/js/demo/peity-demo.js',
                    'gui/inspinia/js/inspinia.js',
                    'gui/inspinia/js/plugins/pace/pace.min.js',
                    'gui/inspinia/js/plugins/jquery-ui/jquery-ui.min.js',
                    // 'gui/inspinia/js/plugins/gritter/jquery.gritter.min.js',


                    'gui/inspinia/js/plugins/sparkline/jquery.sparkline.min.js',
                    'gui/inspinia/js/demo/sparkline-demo.js',
                    'gui/inspinia/js/plugins/chartJs/Chart.min.js',
                    'gui/inspinia/js/plugins/toastr/toastr.min.js',
                    'app/js/bootstrap-3.0.3/bootstrap-datepicker.js',
                    'app/js/estic/common.js',
                    'app/js/estic-back.js'
                ],
                dest: 'app/js/estic-back.min.js'
            }
        },

        cssmin: {
        options: {
            shorthandCompacting: false,
                roundingPrecision: -1
        },
        target: {
            files: {
                    'app/css/estic-back.min.css': [
                    'app/css/bootstrap-3.0.3/bootstrap.min.css',
                    'app/css/bootstrap.min.css',
                    'gui/inspinia/css/plugins/toastr/toastr.min.css',
                    'gui/inspinia/js/plugins/gritter/jquery.gritter.css',
                    'gui/inspinia/css/animate.css',
                    'app/css/estic-back.css'
                ]
            }
        }
    }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    // Default task(s).
    grunt.registerTask('default', ['uglify','cssmin']);

};