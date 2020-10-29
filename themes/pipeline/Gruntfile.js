module.exports = function( grunt ) {
    //require('jit-grunt')(grunt);
    const mozjpeg = require('imagemin-mozjpeg');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        
        /*apaga o css concatenado p sobre escrever*/
        clean: ['css/main.css'],

        /*Minifica js*/
        uglify : {
            options : {
                mangle : false
            },
            my_target : {
                files : {
                    'js/scrool_r_min.js' : ['js/scrollreveal.min.js'],
                    'js/owl_min.js' : ['js/owl.carousel.js'],
                    'js/tema_min.js' : ['js/js_tema.js'],
                }//files
            }//my target
        }, // uglify

        /*compilador de less para css*/
        less: {
            development: {
                options: {
                    compress: true,
                    yuicompress: true,
                    optimization: 2
                },
                files: {
                    "css/estilo_tema.css": "css/estilo_tema.less"
                }
            }//development
        },//less

        /*watch*/
        watch: {
            css: {
                files: 'css/main.css',
                tasks: ['concat_css']
            },
            scripts: {
                files: ['js/js_tema.js'],
                tasks: ['uglify', 'concat_css'],
                options: {
                  debounceDelay: 250
                }
            },
            less: {   
                files: ['css/estilo_tema.less', 'css/main.css' ],
                tasks: ["less", "concat_css"],
                options: {
                    nospawn: true
                }
            },
        }, //watch

        /*concatena todos os css em um só e todos os js em um só*/
        concat_css: {
            js: {
                /*modernizer, min_less.js é o grid js minificado, e o js do tema*/
                src: [
                    'js/modernizer.js', 
                    'js/jquery.js',
                    'js/popper.js',
                    'js/bootstrap.js',
                    'js/lazy_min.js', 
                    'js/scrool_r_min.js', 
                    'js/owl_min.js', 
                    'js/tema_min.js' 
                ],
                dest: 'js/main.js'
            },

            css: {
                src: [ 
                    'css/owl.carousel.min.css', 
                    'css/owl.theme.default.min.css', 
                    'css/bootstrap.css', 
                    'css/estilo_tema.css'
                ],
                dest: 'css/main.css'
            },
        },

        /*otimiza imagens*/
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'img/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'img'
                }]
            }
        }//fim otimiza imagens
    });//grunt.initConfig

    // Plugins do Grunt
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks( 'grunt-contrib-uglify' );
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-concat-css');

    // Tarefas que serão executadas
    grunt.registerTask( 'default', [ 'imagemin', 'clean', 'uglify', 'less', 'watch', 'concat_css' ] );
};