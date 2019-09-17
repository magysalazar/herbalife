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
                'app/js/jquery/jquery-3.2.1.min.js',
                'gui/canvas/js/jquery.js',
                'gui/canvas/js/plugins.js',
                'app/js/estic/common.js',
                'app/js/estic-front.js'
                ],
                dest: 'app/js/estic-front.min.js'
            }
        },
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    'app/css/estic-front.min.css': [
                    'app/css/bootstrap-3.0.3/bootstrap.css',
                    'gui/canvas/style.css',
                    'gui/canvas/css/animate.css',
                    'gui/canvas/css/magnific-popup.css',
                    'gui/canvas/css/responsive.css',
                    'app/css/estic-front.css'
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