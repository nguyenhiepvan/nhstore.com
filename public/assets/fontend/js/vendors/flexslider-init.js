jQuery(window).on('load', function() {

    $('#hero .flexslider').flexslider({
        animation: "fade",
        controlNav: false,
        directionNav: true,
        animationLoop: true,
        slideshow: true,
        slideshowSpeed: 5000,
        nextText: "",
        prevText: "",
        start: renderPreview, //render preview on start
        before: renderPreview, //render preview before moving to the next slide
        sync: "#carousel"
    });

    homeHeight();
});

jQuery(window).resize(function() {
    homeHeight();

});

jQuery(document).on('ready', function() {
    homeHeight();

});

function homeHeight() {
    var wh = jQuery(window).height();
    jQuery('.flexslider, .flexslider .slides li').css('height', wh);
}

$('#hero .flexslider .slides li.slide').css('background-image', function() {
    var bg = 'url(' + $(this).data('background') + ')';
    return bg;
});

function renderPreview(slider) {

    var sl = $(slider);
    var prevWrapper = sl.find('.flex-prev');
    var nextWrapper = sl.find('.flex-next');

    //calculate the prev and curr slide based on current slide
    var curr = slider.animatingTo;
    var prev = (curr == 0) ? slider.count - 1 : curr - 1;
    var next = (curr == slider.count - 1) ? 0 : curr + 1;

    //add prev and next slide details into the directional nav
    prevWrapper.find('.preview').remove();
    nextWrapper.find('.preview').remove();
    prevWrapper.append(grabContent(sl.find('li.slide:eq(' + prev + ')')));
    nextWrapper.append(grabContent(sl.find('li.slide:eq(' + next + ')')));

}

// grab the data and render in HTML
function grabContent(img) {
    var tn = img.data('thumbnail');
    var alt = img.prop('alt');
    var html = '';

    //you can edit this markup to your own needs, but make sure you style it up accordingly
    html = '<div class="preview"><img src="' + tn + '" alt="" /><div class="alt">' + alt + '</div></div>';
    return html;
}