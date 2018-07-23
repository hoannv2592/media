var _LOCALSTORAGE_KEY = 'WINDOW_VALIDATION';
var _windowArray = new Array();
var _initialized = false;
var _isMainWindow = false;
var _windowId;
var _isNewWindowPromotedToMain = false;
var _unloaded = false;
var current_url = window.location.pathname;
$(document).ready(function () {
    //bindUnload();
    //setLocalStorage();
    $("div.form-line").removeClass("focused");
    $("table.table").addClass('tablesorter');
    // $("table.table").tablesorter();
});
function bindUnload()
{
    window.addEventListener('beforeunload', function ()
    {
        var _windowArray = JSON.parse(localStorage.getItem(_LOCALSTORAGE_KEY));
        for (var i = 0, length = _windowArray.length; i < length; i++)
        {
            if (_windowArray[i] === current_url)
            {
                _windowArray.splice(i, 1);
                break;
            }
        }
        //Update the local storage with the new array
        localStorage.setItem(_LOCALSTORAGE_KEY, JSON.stringify(_windowArray));
    });
    window.addEventListener('unload', function ()
    {
        var _windowArray = JSON.parse(localStorage.getItem(_LOCALSTORAGE_KEY));
        for (var i = 0, length = _windowArray.length; i < length; i++)
        {
            if (_windowArray[i] === current_url)
            {
                _windowArray.splice(i, 1);
                break;
            }
        }
        //Update the local storage with the new array
        localStorage.setItem(_LOCALSTORAGE_KEY, JSON.stringify(_windowArray));
    });
}
function setLocalStorage() {
    var self = this;
    var _previousState = _isMainWindow;
    _windowArray = localStorage.getItem(_LOCALSTORAGE_KEY);
    if (_windowArray === 'null' || _windowArray === "NaN" || _windowArray === null)
    {
        _windowArray = [];
    } else
    {
        _windowArray = JSON.parse(_windowArray);
    }
    if (_initialized)
    {
        if (_windowArray.length <= 1 ||
            (_isNewWindowPromotedToMain ? _windowArray[_windowArray.length - 1] : _windowArray[0]) === current_url)
        {
            _isMainWindow = true;
        } else
        {
            _isMainWindow = false;
        }
    } else
    {
        if (_windowArray.length === 0)
        {
            _isMainWindow = true;
            _windowArray[0] = current_url;
            localStorage.setItem(_LOCALSTORAGE_KEY, JSON.stringify(_windowArray));
        } else
        {
            _isMainWindow = false;
            _windowArray.push(current_url);
            localStorage.setItem(_LOCALSTORAGE_KEY, JSON.stringify(_windowArray));
        }
    }
}

function alert_message(message) {
    var $body = $('body');
    $('#flash-message-1').remove();
    var element = '<div ' +
        'id="flash-message-1" ' +
        'class="flash_message error bg-brown font-bold" ' +
        'style="z-index: 99999;' +
        'width:auto;' +
        'height:50px;' +
        'line-height:20px;' +
        'border:2px solid #E3E3E3;' +
        'border-radius: 5px;position:fixed;' +
        'top:50%;left:50%;' +
        'padding:15px;' +
        '-ms-transform: translateX(-50%) translateY(-50%);' +
        '-webkit-transform: translate(-50%,-50%);' +
        'transform: translate(-50%,-50%);">' + message + '</div>';
    $body.append(element);
    $('#flash-message-1').hide();
    $('#flash-message-1').fadeTo(800, 1).fadeTo(4000, 0, function () {
        $(this).remove();
    });
}

function setModalMaxHeight(element) {
    this.$element     = $(element);
    this.$content     = this.$element.find('.modal-content');
    var borderWidth   = this.$content.outerHeight() - this.$content.innerHeight();
    var dialogMargin  = $(window).width() < 768 ? 20 : 60;
    var contentHeight = $(window).height() - (dialogMargin + borderWidth);
    var headerHeight  = this.$element.find('.modal-header').outerHeight() || 0;
    var footerHeight  = this.$element.find('.modal-footer').outerHeight() || 0;
    var maxHeight     = contentHeight - (headerHeight + footerHeight);

    this.$content.css({
        'overflow': 'hidden'
    });

    this.$element
        .find('.modal-body').css({
        'max-height': maxHeight,
        'overflow-y': 'auto'
    });
}

$('.modal').on('show.bs.modal', function() {
    $(this).show();
    setModalMaxHeight(this);
});

$(window).resize(function() {
    if ($('.modal.in').length !== 0) {
        setModalMaxHeight($('.modal.in'));
    }
});

function saveData(url, data, modal) {
    $.ajax({
        url: url,
        type: "POST",
        cache: false,
        data: data + modal,
        success: function(response, textStatus, xhr) {
            console.log("success");
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log("error");
        }
    });
}

function delete_logo_adgroup(id, device_group_id) {
    $.ajax({
        type: 'POST',
        url: '/Adgroups/delete_logo',
        async: true,
        data: {
            id: id,
            device_group_id: device_group_id
        },
        dataType: 'json',
        success: function (rp) {
            if (rp == true) {
                $('tr#'+id).remove()
            }
        }
    });
}
function delete_logo_cam(id) {
    $.ajax({
        type: 'POST',
        url: '/CampaignGroups/delete_logo',
        async: true,
        data: {
            id: id
        },
        dataType: 'json',
        success: function (rp) {
            if (rp == true) {
                $('tr#'+id).remove()
            }
        }
    });
}

