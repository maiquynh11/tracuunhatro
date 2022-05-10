$(function() {   
    const $leaveComment = $('#leave-comment');
    const $cancelComment = $('#cancel-comment');
    const $submitComment = $('#submit-comment');

    $leaveComment.click(function() {
        $leaveComment.attr('rows', '2').closest('.create-comment').addClass('focused');
    });
    $cancelComment.click(() => {
        $leaveComment.attr('rows', 1)
        $cancelComment.closest('.create-comment').removeClass('focused');
    });
});

function openCity(evt, filterSearch) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("filter-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tab__link");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(categoryName).style.display = "block";
    evt.currentTarget.className += " active";
}

$(document).ready(function () {

    $('#sidebar_postCollapse').on('click', function () {
        $('#sidebar_post').toggleClass('active');
    });

});
$(document).ready(function () {
    $("#sidebar_post").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
        // hide sidebar
        $('#sidebar_post').removeClass('active');
        // hide overlay
        $('.overlay').removeClass('active');
    });

    $('#sidebar_postCollapse').on('click', function () {
        // open sidebar
        $('#sidebar_post').addClass('active');
        // fade in the overlay
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});
