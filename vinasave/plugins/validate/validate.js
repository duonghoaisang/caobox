var Validator = {
	isEmail : function(s) {
		return this.test(s, '^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+@[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$');
	},

	isAbsUrl : function(s) {
		return this.test(s, '^(news|telnet|nttp|file|http|ftp|https)://[-A-Za-z0-9\\.]+\\/?.*$');
	},

	isEmpty : function(s) {
		return new RegExp('^\\s*$').test(s);
	},

	isNumber : function(s, d) {
		return !isNaN(s);
	},

	test : function(s, p) {
		return s == '' || new RegExp(p).test(s);
	}
};