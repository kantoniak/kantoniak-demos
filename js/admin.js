var kantoniak = kantoniak || {};
kantoniak.Demos = {};

kantoniak.Demos.showMediaPopup = function(title, popupId) {
    var _popup = document.getElementById(popupId);
    if (!_popup) {
        return;
    }
    var height = parseInt(_popup.dataset.height);
    var width = parseInt(_popup.dataset.width);
    console.log(width, height);
    tb_show(title, '#TB_inline?height=' + height + '&width=' + width + '&inlineId=' + popupId);
    jQuery('#TB_window').width(width + 30).height(height + 42).css('margin-left', -width/2);
};

jQuery('#kantoniak-demos-insert').click(function (e) {
    e.preventDefault();
    var popupTitle = document.getElementById('kantoniak-demos-insert').getAttribute('name');
    kantoniak.Demos.showMediaPopup(popupTitle, 'kantoniak-demos-popup');
}.bind(this));