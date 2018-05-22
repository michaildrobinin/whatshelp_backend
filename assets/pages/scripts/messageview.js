var ComponentsEditors = function () {

    var handleSummernote = function () {
        $('#summernote_1').summernote({height: 300//,
            // toolbar: [
            //     [groupName, [list of button]]
                // ['style', ['bold', 'italic', 'underline', 'clear']],
                // ['font', ['strikethrough', 'superscript', 'subscript']],
                // ['fontsize', ['fontsize']],
                // ['color', ['color']],
                // ['para', ['ul', 'ol', 'paragraph']],
                // ['height', ['height']]
            // ]
        });


        //API:
        //var sHTML = $('#summernote_1').code(); // get code
        //$('#summernote_1').destroy(); // destroy
    };

    return {
        //main function to initiate the module
        init: function () {
            handleSummernote();
        }
    };

}();

jQuery(document).ready(function() {    
   ComponentsEditors.init(); 
});