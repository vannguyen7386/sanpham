/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var pathname = location.pathname;
var baseURL = pathname.substr(0, pathname.indexOf('/', 1));
function check_and_uncheck_all(id) {
    var _class = '.' + id + '_item';
    id = "#" + id;
    var checked = $(id).prop('checked');
    $(_class).attr('checked', checked);
}
function resizeContent() {
    var content_height = $('#main-content').height();
    var aside_left = $('#left').height();
    var aside_right = $('#right').height();
    var max_left_height = (content_height > aside_left) ? content_height : aside_left;
    var max_right_height = (content_height > aside_right) ? content_height : aside_right;
    var max_height = (max_left_height > max_right_height) ? max_left_height : max_right_height;
    $('#left').height(max_height);
    $('#right').height(max_height);
}

function update(data) {
    if (typeof data === 'string') {
        try {
            eval("data = " + data + ";");
        } catch (e) {
            show_dialog_message('Error', data);
            return;
        }
    }
    var content = arguments[1];
    var id = arguments[2];
    id = id === null ? '#main-content' : id;
    for (var x in data) {
        switch (x) {
            case "show":
                return;
            case "alert":
                var msg = data[x];
                delete data[x];
                show_dialog_message('Error', msg);
                return;
            case "redirect":
                var url = data[x];
                delete data[x];
                redirect(url);
                break;
            case "notice":
                var notice = data[x];
                delete data[x];
                show_dialog_message('Thành công', notice);
                break;
            case "reload":
                if (data[x]) {
                    delete data[x];
                    reload_page();
                }
                break;
            default:
                break;
        }
    }

}
(function($) {
    $(document).ready(function() {
        var frm = $('.ajax-form');
        $(frm).live('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'text',
                success: function(data) {
                    try {
                        var j_data = jQuery.parseJSON(data);
                    } catch (e) {
                        $("#main-content").html(data);
                        return false;
                    }
                    $("#loading").remove();
                    update(j_data, data);
                }
            });
        });
        reload_page();
    });
})(jQuery);

function reload_page() {
    var url = '', m, current_module;
    hash = location.hash.toString();
    if (hash.match(/#/i))
        hash = hash.split('#')[1];
    if (hash != '') {
        if ((m = hash.match(/^(\w+)/i))) {
            current_module = m[1];
        }
        $('nav#main a').removeClass('active');
        $('nav#main a[prefix=' + current_module + ']').addClass('active');
        url = baseURL + '/' + hash;
        $.ajax({
            url: url,
            type: 'GET',
            dataType: "text",
            success: function(data) {
                $('#main-content').html(data);
                if (json_data !== undefined) {
                    for (var x in json_data) {
                        if (x == 'title') {
                            document.title = "Cầm đồ sim - " + json_data[x];
                            break;
                        }
                    }
                }
            }
        });
    }
    resizeContent();
}

function redirect(url) {
    location.hash = url;
    reload_page();
}