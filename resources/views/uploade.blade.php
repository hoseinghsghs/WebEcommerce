<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="/upl" id="myDropzone" class="dropzone" method="POST" id="my-awesome-dropzone">
        @csrf

    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
    Dropzone.options.myDropzone = {

        parallelUploads: 5,
        maxFiles: 5,
        maxFilesize: 1,
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        success: function(file, response) {

            $(file.previewTemplate).append('<span class="server_file">' + response + '</span>');


        },



        removedfile: function(file) {

            var server_file = $(file.previewTemplate).children('.server_file').text();
            alert(server_file);
            $.ajax({
                type: 'POST',
                url: "{{route('del')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: server_file,
                    request: 2
                },
                sucess: function(data) {
                    console.log('success: ' + data);
                }
            });


            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                void 0;

        },

        headers: {
            "X-CSRF-Token": "{{ csrf_token() }}"
        },
        dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
        dictDefaultMessage: "Drop files here to upload",
        dictFallbackMessage: "Your browser does not support drag'n'drop file uploads.",
        dictFallbackText: "Please use the fallback form below to upload your files like in the olden days.",
        dictFileTooBig: "File is too big (@{{filesize}}MiB). Max filesize: @{{maxFilesize}}MiB.",
        dictInvalidFileType: "You can't upload files of this type.",
        dictResponseError: "Server responded with @{{statusCode}} code.",
        dictCancelUpload: "توقف آپلود",
        dictUploadCanceled: "Upload canceled.",
        dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",
        dictRemoveFile: 'حذف',
        dictRemoveFileConfirmation: null,
        dictMaxFilesExceeded: "You can not upload any more files.",

        init:

            function() {
                dzClosure = this; // Makes sure that 'this' is understood inside the functions below.


                // for Dropzone to process the queue (instead of default form behavior):
                document.getElementById("submit-all").addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    dzClosure.processQueue();
                });




                //send all the form data along with the files:
                this.on("sendingmultiple", function(data, xhr, formData) {
                    formData.append("firstname", jQuery("#firstname").val());
                    formData.append("lastname", jQuery("#lastname").val());
                });
                this.on("successmultiple", function(files, response) {
                    // Gets triggered when the files have successfully been sent.
                    // Redirect user or notify of success.
                });
                this.on("errormultiple", function(files, response) {
                    // Gets triggered when there was an error sending the files.
                    // Maybe show form again, and notify user of error
                    alert('error');
                });
            },

    }
    </script>
</body>

</html>