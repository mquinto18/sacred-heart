// Typed Initiate
if ($('.typed-text-output').length == 1) {
let typed_strings = $('.typed-text').text();
let typed = new Typed('.typed-text-output', {
    strings: typed_strings.split(', '),
    typeSpeed: 100,
    backSpeed: 20,
    smartBackspace: false,
    fadeOut: true,
    loop: true
});
}
