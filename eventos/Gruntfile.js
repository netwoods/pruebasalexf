// requires
var util = require('util');
var qx = require("../qooxdoo/qooxdoo-5.0-sdk/tool/grunt");

// grunt
module.exports = function(grunt) {
  var config = {

    generator_config: {
      let: {
      }
    },

    common: {
      "APPLICATION" : "esm",
      "QOOXDOO_PATH" : "../qooxdoo/qooxdoo-5.0-sdk",
      "LOCALES": ["en"],
      "QXTHEME": "esm.theme.Theme"
    }

    /*
    myTask: {
      options: {},
      myTarget: {
        options: {}
      }
    }
    */
  };

  var mergedConf = qx.config.mergeConfig(config);
  // console.log(util.inspect(mergedConf, false, null));
  grunt.initConfig(mergedConf);

  qx.task.registerTasks(grunt);

  // grunt.loadNpmTasks('grunt-my-plugin');
};
