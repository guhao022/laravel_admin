toastr.options = {
    closeButton: true,
    progressBar: true,
    showMethod: 'slideDown',
    timeOut: 4000
};

$('.select2').select2({allowClear: true});

//fileinput控件
function initFileInput(id, imgUrl) {
    var control = $('#' + id);

    var img = ''

    if (imgUrl==undefined || imgUrl=='' || imgUrl==null) {
        img = ''
    } else {
        img = '<img src="' + imgUrl + '" class="file-preview-image" style="height: inherit;">'
    }

    control.fileinput({
        language: 'zh', //设置语言
        //uploadUrl: uploadUrl, //上传的地址
        allowedFileExtensions : ['jpg', 'png','gif'],//接收的文件后缀
        allowedPreviewTypes: ['image'],
        showUpload: false, //是否显示上传按钮
        showRemove: true,   // 是否显示删除
        showPreview :true,  // 是否显示预览
        showCaption: true,//是否显示标题
        initialPreview: img,
        browseClass: "btn btn-primary", //按钮样式
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
    });

}

$(function () {

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
    });

    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass   : 'iradio_minimal-red'
    });

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
    });

    //全选
    $('.grid-select-all').on('ifClicked', function(event) {
        if (this.checked) {
            this.children('.grid-row-checkbox').iCheck('check');
        } else {
            this.children('.grid-row-checkbox').iCheck('uncheck');
        }
    });

    $('.grid-row-checkbox').on('ifChanged', function () {
        if (this.checked) {
            $(this).closest('tr').css('background-color', '#ffffd5');
        } else {
            $(this).closest('tr').css('background-color', '');
        }
    });

    $('.history-back').on('click', function () {
        event.preventDefault();
        history.back(1);
    });

});