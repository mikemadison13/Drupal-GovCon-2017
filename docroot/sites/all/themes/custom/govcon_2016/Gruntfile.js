'use strict';

module.exports = function (grunt) {

  grunt.initConfig({
    watch: {
      options: {
        livereload: true
      },
      sass: {
        files: ['sass/{,**/}*.{scss,sass}'],
        tasks: ['sass'],
        options: {
          livereload: false
        }
      },
      registry: {
        files: ['*.info', '{,**}/*.{php,inc}'],
        tasks: ['shell'],
        options: {
          livereload: false
        }
      },
      images: {
        files: ['images/**']
      },
      css: {
        files: ['css/{,**/}*.css']
      },
      js: {
        files: ['js/{,**/}*.js', '!js/{,**/}*.min.js'],
        tasks: ['jshint', 'uglify:dev']
      }
    },

    shell: {
      all: {
        command: 'drush cache-clear theme-registry'
      }
    },

    sass: {
      dist: {
        files: {
          'css/govcon-2016.normalize.css' : 'sass/govcon-2016.normalize.scss',
          'css/govcon-2016.hacks.css' : 'sass/govcon-2016.hacks.scss',
          'css/govcon-2016.styles.css' : 'sass/govcon-2016.styles.scss',
          'css/govcon-2016.no-query.css' : 'sass/govcon-2016.no-query.scss',
          'css/layouts/govcon-simple/govcon-simple.layout.css' : 'sass/layouts/govcon-simple/govcon-simple.layout.scss'
        },
        options: {
          sourceMap: true,
          outputStyle: 'compressed'
        },
      },
      dev: {
        files: {
          'css/govcon-2016.normalize.css' : 'sass/govcon-2016.normalize.scss',
          'css/govcon-2016.hacks.css' : 'sass/govcon-2016.hacks.scss',
          'css/govcon-2016.styles.css' : 'sass/govcon-2016.styles.scss',
          'css/govcon-2016.no-query.css' : 'sass/govcon-2016.no-query.scss',
          'css/layouts/govcon-simple/govcon-simple.layout.css' : 'sass/layouts/govcon-simple/govcon-simple.layout.scss'
        },
        options: {
          sourceMap: true,
          outputStyle: 'expanded'
        },
      }
    },

    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: ['js/{,**/}*.js', '!js/{,**/}*.min.js']
    },

    uglify: {
      dev: {
        options: {
          mangle: false,
          compress: false,
          beautify: true
        },
        files: [{
          expand: true,
          flatten: true,
          cwd: 'js',
          dest: 'js',
          src: ['**/*.js', '!**/*.min.js'],
          rename: function(dest, src) {
            var folder = src.substring(0, src.lastIndexOf('/'));
            var filename = src.substring(src.lastIndexOf('/'), src.length);
            filename = filename.substring(0, filename.lastIndexOf('.'));
            return dest + '/' + folder + filename + '.min.js';
          }
        }]
      },
      dist: {
        options: {
          mangle: true,
          compress: {}
        },
        files: [{
          expand: true,
          flatten: true,
          cwd: 'js',
          dest: 'js',
          src: ['**/*.js', '!**/*.min.js'],
          rename: function(dest, src) {
            var folder = src.substring(0, src.lastIndexOf('/'));
            var filename = src.substring(src.lastIndexOf('/'), src.length);
            filename = filename.substring(0, filename.lastIndexOf('.'));
            return dest + '/' + folder + filename + '.min.js';
          }
        }]
      }
    },

    sass_globbing: {
     theme_imports: {
        files: {
            'sass/_variablesMap.scss': 'sass/variables/**/*.scss',
            'sass/_abstractionsMap.scss': 'sass/abstractions/**/*.scss',
            'sass/_baseMap.scss': 'sass/base/**/*.scss',
            'sass/_componentsMap.scss': 'sass/components/**/*.scss',
          },
      },
      options: {
          useSingleQuotes: false
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-shell');
  grunt.loadNpmTasks('grunt-sass-globbing');
  grunt.loadNpmTasks('grunt-sass');

  grunt.registerTask('build', [
    'uglify:dist',
    'jshint',
    'sass:dist'
  ]);

};
