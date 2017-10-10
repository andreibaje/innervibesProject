function addPlaceholders() {
	jQuery('#loginform input[type="text"]').attr('placeholder', 'Email');
	jQuery('#loginform input[type="password"]').attr('placeholder', 'Password');
};

function customCheckbox() {
	jQuery('#loginform .login-remember label').append('<span></span>');
}

jQuery(document).ready(function() {
	addPlaceholders();
	customCheckbox();
});