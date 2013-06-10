(function($) {
    $(document).ready(function() {
        $("input.txtDate").live("focus", function() {
            $(this).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd/mm/yy'
            });
        });
    });
})(jQuery);

