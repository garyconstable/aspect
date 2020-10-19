module.exports = function(grunt) {

    const sass = require('node-sass');

    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            options: {
                sourceComments: 'map',
                implementation: sass,
                includePaths: [
                    'node_modules/bootstrap/scss'
                ]
            },
            dist: {
                options: {
                    outputStyle: 'expanded'
                },
                files: {
                    'static/app.css': 'scss/app.scss'
                }
            }
        },

        cssmin: {
            target: {
                files: {
                    'static/app.min.css': 'static/app.css'
                }
            }
        },

        watch: {
            sass: {
                files: ['scss/*.scss', 'scss/partials/*.scss' , 'scss/*/*.scss'],
                tasks: ['sass','cssmin']
            },
            scripts: {
                files: ['js/*.js', 'js/**/*.js', 'js/*/*.js'],
                tasks: ['concat','terser']
            }
        },

        concat: {
            dist: {
                src: [
                    'node_modules/webfontloader/webfontloader.js',
                    'node_modules/stickybits/dist/jquery.stickybits.js',
                    'node_modules/bootstrap/js/dist/util.js',
                    'node_modules/bootstrap/js/dist/modal.js',
                    'node_modules/bootstrap/js/dist/collapse.js',
                    'js/app.js'
                ],
                dest: 'static/app.js',
                nonull: true
            }
        },

        terser: {
            options: {},
            main: {
                files: {
                    'static/app.min.js': ['static/app.js']
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-terser');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');

    grunt.registerTask('dev', ['sass', 'concat']);
    grunt.registerTask('prod', ['cssmin', 'terser']);

    grunt.registerTask('default', ['dev', 'prod', 'watch']);
    // grunt.registerTask('build', ['dev', 'prod', 'watch']);
    // removed as site is not live, added prod to default

};