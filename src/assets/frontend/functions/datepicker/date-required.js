let GetDateRequired = {
    init: function () {

        $("#date-required").datetimepicker({
            format: "dd-mm-yyyy",
            todayHighlight: !0,
            autoclose: !0,
            startView: 2,
            minView: 2,
            forceParse: 0,
            pickerPosition: "bottom-left"
        })
    }
};
jQuery(document).ready(function () {
    GetDateRequired.init();
});
