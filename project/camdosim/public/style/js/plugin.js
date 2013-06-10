
/**
 * @description Show confirm dialog
 * @param {string} message
 * @param {function} fn
 * @returns
 */
function confirmDialog(message, fn) {
    if (message === null || message === '') {
        message = "Do you want to perform this task?";
    }
    fn = fn || (function() {
    });
    var confirm_div = "<div id='dialog-confirm' title='Confirm dialog'></div>";
    $("body").append(confirm_div);
    $("#dialog-confirm").dialog(
            {
                modal: true,
                buttons: {
                    "Ok": function() {
                        $("div#dialog-confirm").remove();
                        $(this).dialog("close");
                        fn.call();
                    },
                    "Cancel": function() {
                        $("div#dialog-confirm").remove();
                        $(this).dialog("close");
                    }
                },
                close: function() {
                    $("div#dialog-confirm").remove();
                }
            }).html(message);
}

function show_dialog(title, message, url) {
    var fn = arguments[3];
    fn = fn || function() {
    };
    var dialog_div = "<div id='dialog-modal' title='" + title + "'></div>";
    $(dialog_div).appendTo('body');
    if (url != '' && url != null) {
        $.ajax({
            type: 'GET',
            url: url,
            success: function(html) {
                $("#dialog-modal").html(html);
            }
        });
    }
    $("#dialog-modal").dialog({
        modal: true,
        width: 'auto',
        show: {
            effect: "Transfer",
            duration: 200,
            complete: function() {
                var p = $("#dialog-modal").parent();
                $("#dialog-modal").parent().css("top", ($(window).height() - p.height()) / 2 + $(window).scrollTop() + "px")
                        .css("left", ($(window).width() - p.width()) / 2 + $(window).scrollLeft() + "px");
            }
        },
        hide: {
            effect: "explode",
            duration: 200
        },
        close: function() {
            $("div#dialog-modal").remove();
            if (fn != null)
                fn.call();
        }
    }).html(message);

}
function show_dialog_message(title, message) {
    var dialog_div = "<div id='dialog-modal' title='" + title + "'></div>";
    $(dialog_div).appendTo('body');
    $("#dialog-modal").dialog({
        modal: true,
        width: 'auto',
        show: {
            effect: "Transfer",
            duration: 200,
            complete: function() {
                var p = $("#dialog-modal").parent();
                $("#dialog-modal").parent().css("top", ($(window).height() - p.height()) / 2 + $(window).scrollTop() + "px")
                        .css("left", ($(window).width() - p.width()) / 2 + $(window).scrollLeft() + "px");
            }
        },
        hide: {
            effect: "explode",
            duration: 200
        },
        buttons: {
            Ok: function() {
                $(this).dialog("close");
            }
        },
        close: function() {
            $("div#dialog-modal").remove();
        }
    }).html(message);
}

function update_gold_price(vGoldSjcBuy, vGoldSjcSell, vGoldSbjBuy, vGoldSbjSell) {
    var tb = "<table id='gold_price'>";
    tb += "<tr>";
    tb += "<th>Loại</th>";
    tb += "<th align='right'>Mua</th>";
    tb += "<th align='right'>Bán</th>";
    tb += "</tr><tr>";
    tb += "<td align='center'>SBJ</td>";
    tb += "<td align='right'>" + vGoldSbjBuy + "</td>";
    tb += "<td align='right'>" + vGoldSbjSell + "</td>";
    tb += "</tr>";
    tb += "<tr>";
    tb += "<td align='center'>SJC</td>";
    tb += "<td align='right'>" + vGoldSjcBuy + "</td>";
    tb += "<td align='right'>" + vGoldSjcSell + "</td>";
    tb += "</tr>";
    tb += "</tr></table>";
    var html = "<div class='load_service_data'><h3>Đơn vị tính: tr.đ/lượng</h3>" + tb + "</div>";
    return html;
}

function update_exchange(vForexs, vCosts) {
    var tb = "<table id='exchange'>";
    for (i = 0; i < vForexs.length; i++) {
        tb += "<tr>";
        tb += "<td align='left' style='padding-left:10px;'>" + vForexs[i] + "</td>";
        tb += "<td align='right'>" + vCosts[i] + "</td>";
        tb += "</tr>";
    }
    tb += "</tr></table>";
    var html = "<div class='load_service_data'>" + tb + "</div>";
    return html;
}

function load_google_map(lat, lng) {
    var mapOptions = {
        center: new google.maps.LatLng(lat, lng),
        zoom: 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map"),
            mapOptions);
    var marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map,
        title: "Cửa hàng cầm đồ sim - Click xem rõ hơn"
    });

    google.maps.event.addListener(marker, "click", function() {
        show_dialog("Bản đồ phóng to", "", baseURL + "/default/maps");
    });
}

function load_google_map_wide(lat, lng) {
    var mapOptions = {
        center: new google.maps.LatLng(lat, lng),
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map-outer"),
            mapOptions);
    var marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map,
        title: 'Camdosim.vn'
    });

    google.maps.event.addListener(marker, 'click', function() {
        map.setZoom(18);
        map.setCenter(marker.getPosition());
    });

}

function call_ajax_load_content(elem, title) {
    var x = jQuery(elem).prop("tagName");
    var url;
    if (x == "A") {
        var href = $(elem).attr("href");
        var m, current_module;
        if (href != baseURL) {
            location.hash = href;
            url = baseURL + "/" + href;
            if ((m = href.match(/^(\w+)/i))) {
                current_module = m[1];
            }
        } else {
            location.hash = "";
            url = href + "?mod=ajax";
            current_module = 'default';
        }
        var element = $('.active');
        $(element).removeClass('active');
        $('nav#main a[prefix=' + current_module + ']').addClass('active');
        document.title = "Cầm đồ sim - " + title;
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function(){
                var loading = "<div id='loading'> Loading ...</div>";
                $('#main-content').empty();
                $(loading).appendTo('#wrap');
            },
            success: function(data) {
                $('#main-content').html(data);
                $("#loading").remove();
            }
        });

    } else if (x == "IMG") {
        var href = arguments[2];
        if (href != null) {
            location.hash = href;
            url = baseURL + "/" + href;
        } else {
            location.hash = "";
            url = href + "?mod=ajax";
        }
        document.title = "Cầm đồ sim - " + title;
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function(){
                var loading = "<div id='loading'> Loading ...</div>";
                $('#main-content').empty();
                $(loading).appendTo('#wrap');
            },
            success: function(data) {
                $('#main-content').html(data);
                $("#loading").remove();
            }
        });
    }
    return false;
}

function call_extra_content(url, content) {
    $.ajax({
        url: url,
        type: 'GET',
        success: function(data) {
            $(content).append(data);
        },
        complete: function() {
            resizeContent();
        }
    });
    return false;
}

