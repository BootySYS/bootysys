describe('Protractor Demo App', function() {
    var university;
    var firstName;
    var lastName;
    var email;
    var state;
    var city;
    var zip;
    var city;
    var password;
    var confirmPassworf;


    beforeEach(function() {
        browser.get('http://46.101.223.221/');
    });
    var signIn = element(by.linkText('Sign In'));
    signIn.click();

});