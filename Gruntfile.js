module.exports = function(grunt) {

	grunt.initConfig({
	  sass: {                              // Task
	    dist: {                            // Target
	      files: {                         // Dictionary of files
	        'css/stylesheet.css': 'css/scss/main.scss',       // 'destination': 'source'
	      }
	    }
	  },
	  watch: {
		  scripts: {
			  files: 'css/scss/*.scss',
			  tasks: ['sass'],
			  options: {
		      reload: true
		    }
		  }
		}
	});
	
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	
	grunt.registerTask('default', ['sass']);

};