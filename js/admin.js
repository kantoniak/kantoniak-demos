var kantoniak = kantoniak || {};
kantoniak.Demos = {};

kantoniak.Demos.insertShortcut = function(url, list_url) {
    var content = '[demo';
    if (url) {
        content += ' url="' + url + '"';
    }
    if (list_url) {
        content += ' list_url="' + list_url + '"';
    }
    content += '] Put content here [/demo]';
    tinyMCE.activeEditor.execCommand('mceInsertContent', false, content);
};

kantoniak.Demos.showMediaPopup = function(title, popupId) {
    var _popup = document.getElementById(popupId);
    if (!_popup) {
        return;
    }
    var height = parseInt(_popup.dataset.height);
    var width = parseInt(_popup.dataset.width);
    tb_show(title, '#TB_inline?height=' + height + '&width=' + width + '&inlineId=' + popupId);
    jQuery('#TB_window').width(width + 30).height(height + 42).css('margin-left', -width/2);
    jQuery('#TB_window .kantoniak-demos-popup-content input[name!=submit]').val('');
};

jQuery('#kantoniak-demos-insert').click(function (e) {
    e.preventDefault();
    var popupTitle = document.getElementById('kantoniak-demos-insert').getAttribute('name');
    kantoniak.Demos.showMediaPopup(popupTitle, 'kantoniak-demos-popup');
    jQuery('#TB_window .kantoniak-demos-popup-content input[name=submit]').off().click(function (e) {
        e.preventDefault();
        
        var url = jQuery('#TB_window .kantoniak-demos-popup-content input[name=url]').val().trim();
        var list_url = jQuery('#TB_window .kantoniak-demos-popup-content input[name=list_url]').val().trim();

        kantoniak.Demos.insertShortcut(url, list_url);
        tb_remove();
    }.bind(this));
}.bind(this));