(function($) {
    $(document).ready(function() {
        $("input.txtDate").livequery(function() {
            $(this).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd/mm/yy'
            });
        });
        
        
    });
})(jQuery);

function upload_img(id, id_show, id_path) {
    $('#' + id).livequery(function() {
        if ($('p#form_' + id).length > 0){
            return;
        }
        $(this).wrap('<p class="form_upload" id="form_' + id + '"><label class="add-photo-btn">');
        $('#form_' + id).prepend('<input type="text" readonly="readonly" \n\
                                name="path" id="' + id_path + '" class="path">');
        $('#' + id_path).val($(this).attr('path'));
        $(this).change(function() {
            $('#' + id_path).val($(this).val());
            var i = 0, len = this.files.length, reader, file;
            for (; i < len; i++) {
                file = this.files[i];

                if (window.FileReader) {
                    reader = new FileReader();
                    reader.onloadend = function(e) {
                        showImage(e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    });

    function showImage(source) {
        var img = document.getElementById(id_show);
        img.src = source;
    }


}