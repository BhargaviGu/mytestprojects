module.exports = function (grunt) {

  var BASE_DIR = process.cwd() + "/assets/vendor",
      JS_DIR   = BASE_DIR + "/js",
      LESS_DIR = BASE_DIR + "/less";

  require("matchdep").filterDev("grunt-contrib-*").forEach(grunt.loadNpmTasks);

  function prepareConfig () {

    var tasks = {};

    tasks.jshint = {

      "options": {

        "jshintrc": true
      },
      "all": [JS_DIR + "/**/*.js"]
    };

    tasks.less = {

      "all": {

        options: {
          plugins: [
            new (require('less-plugin-autoprefix'))({browsers: ["last 2 versions"]}),
            new (require('less-plugin-clean-css'))({})
          ]
        },
        files: [
            {src: [LESS_DIR + "/management.less"], dest: BASE_DIR + "/css/management.css"},
            {src: [LESS_DIR + "/admin.less"], dest: BASE_DIR + "/css/admin.css"},
            {src: [LESS_DIR + "/new_app.less"], dest: BASE_DIR + "/css/new_app.css"}
        ]
      }
    };

    return tasks;
  }

  grunt.initConfig(prepareConfig()); 

  grunt.registerTask("default", ["less"]);
};
