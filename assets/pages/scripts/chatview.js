var Dashboard = function() {

    return {

        initChat: function() {
            var cont = $('#chats');
            var list = $('.chats', cont);
            var form = $('.chat-form', cont);
            var input = $('input', form);
            var btn = $('.btn', form);

            var handleClick = function(e) {
                e.preventDefault();

                var text = input.val();
                if (text.length == 0) {
                    return;
                }

                var uploadRequest = $.ajax({
                    url: "../../uploadMessage",
                    type: "POST",
                    data:{
                        'tourTargetId':btn.attr('data-targettour'),
                        'categoryId': btn.attr('data-categoryid'),
                        'type':'0',
                        'content': text
                    },
                    cache: false
                });

                uploadRequest.done(function(msg) {
                    App.unblockUI('#chats');
                    console.log(msg);
                    UpdateUIHandler(text);
                });

                uploadRequest.fail(function(jqXHR, textStatus) {
                    App.unblockUI('#chats');
                    App.alert({ container: '#alertContainer', // alerts parent container
                        place: 'append',
                        type: 'error',
                        message: 'check your internet connection and retry please.',
                        close: true,
                        reset: false,
                        focus: true,
                        icon: 'fa fa-check'
                    });
                });

            };

            $('body').on('click', '.message .name', function(e) {
                e.preventDefault(); // prevent click event

                // var name = $(this).text(); // get clicked user's full name
                // input.val('@' + name + ':'); // set it into the input field
                // App.scrollTo(input); // scroll to input if needed
            });

            btn.click(handleClick);

            input.keypress(function(e) {
                if (e.which == 13) {
                    handleClick(e);
                    return false; //<---- Add this line
                }
            });

            //here is for file upload
            $('#btFileSend').on('click', function(e){
                e.preventDefault();
                var toBeUploadFile = $('.fileinput-filename').get(0).textContent;
                if(toBeUploadFile && toBeUploadFile.length > 1)
                {


                    var fileSelected = $('#fileToUpload')[0].files[0];
                    var typeFromFile = makeTypeFromFile(fileSelected);

                    if(typeFromFile === -1)
                    {
                        App.alert({ container: '#alertContainer', // alerts parent container
                            place: 'append',
                            type: 'danger',
                            message: 'You choose invalid type of file. Choose other please.',
                            close: true,
                            reset: false,
                            focus: true,
                            icon: 'fa fa-check'
                        });
                        $('.fileinput').fileinput('clear');
                        return;
                    }

                    App.blockUI({
                        target:'.chats',
                        animate:true
                    });

                    App.blockUI({
                        target:'.tab-content',
                        animate:true
                    });


                    // upload handler here...
                    var formData = new FormData();
                    formData.append("tourTargetId", btn.attr('data-targettour'));
                    formData.append("categoryId", btn.attr('data-categoryid'));
                    formData.append("type", typeFromFile);
                    formData.append("fileName", fileSelected.name);
                    formData.append("fileToUpload", fileSelected);


                    //check file type here.. $('#fileToUpload')[0].files[0].type.. image, doc, pdf only will be accepted

                    var uploadHandler = $.ajax({
                        url: "../../uploadFile",
                        type: "POST",
                        data:formData,
                        processData: false,
                        contentType: false,
                        cache: false
                    });

                    uploadHandler.done(function(msg){
                        App.unblockUI('.chats');
                        App.unblockUI('.tab-content');
                        if(msg === 'fail')
                        {
                            //failed.. invalid type.
                            App.alert({ container: '#alertContainer', // alerts parent container
                                place: 'append',
                                type: 'danger',
                                message: 'You choose invalid type of file. Choose other please.',
                                close: true,
                                reset: false,
                                focus: true,
                                icon: 'fa fa-check'
                            });
                            $('.fileinput').fileinput('clear');
                            return;
                        }

                        UpdateUIHandler(msg);//"You sent file to user:<a href="+msg+">" + toBeUploadFile + "</a>");
                        $('.fileinput').fileinput('clear');
                    });

                    uploadHandler.fail(function(jqXHR, textStatus){
                        App.unblockUI('.chats');
                        App.unblockUI('.tab-content');

                        App.alert({ container: '#alertContainer', // alerts parent container
                            place: 'append',
                            type: 'danger',
                            message: 'error to upload file. Try again.',
                            close: true,
                            reset: false,
                            focus: true,
                            icon: 'fa fa-check'
                        });
                    });
                }
            });


            var UpdateUIHandler = function(text)
            {
                var time = new Date();

                var tpl = '';
                tpl += '<li class="out">';
                tpl += '<img class="avatar" alt="" src="../../../' + Layout.getLayoutImgPath() + 'avatar.png"/>';
                tpl += '<div class="message">';
                tpl += '<span class="arrow"></span>';
                tpl += '<a href="#" class="name">You</a>&nbsp;';
                tpl += '<span class="datetime">at ' + time.getFullYear() + "-" + (time.getMonth() + 1) + "-" + time.getDate() + '</span>';
                tpl += '<span class="body">';
                tpl += text;

                tpl += '</span>';
                tpl += '<span class="body">';
                tpl +=  '<span class="fa fa-check-circle font-red"></span> Sent';
                tpl += '<span class="fa fa-check-circle font-red"></span> Inapproved';
                tpl += '</span>';

                tpl += '</div>';
                tpl += '</li>';

                var msg = list.append(tpl);
                input.val("");

                var getLastPostPos = function() {
                    var height = 0;
                    cont.find("li.out, li.in").each(function() {
                        height = height + $(this).outerHeight();
                    });

                    return height;
                };

                cont.find('.scroller').slimScroll({
                    scrollTo: getLastPostPos()
                });
            };

            var makeTypeFromFile = function(file)
            {
                //image file validate
                var ValidImageTypes = ["image/jpeg", "image/png"];
                var ValidPdfType = ["application/pdf"];
                var ValidDocumentType = ["text/plain", "application/epub+zip",
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                    "application/vnd.oasis.opendocument.text", "text/rtf"];


                if (ValidImageTypes.indexOf(file.type) > -1) {
                    // invalid file type code goes here.
                    return 1;
                }

                if (ValidPdfType.indexOf(file.type) > -1) {
                    // invalid file type code goes here.
                    return 2;
                }

                if (ValidDocumentType.indexOf(file.type) > -1) {
                    // invalid file type code goes here.
                    return 3;
                }
                return -1;
            }
        },



        init: function() {

            this.initChat();
        }
    };

}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
        Dashboard.init(); // init metronic core componets
    });
}/**
 * Created by rock on 11/17/17.
 */
