window.fileCollection = new Array();
$('#image1').on('change', function (e) {
    var files = e.target.files;
    $('#image_upload_1').empty();
    $.each(files, function (i, file) {


        fileCollection.push(file);

        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (e){

            var template =

                '<img name="" style="width: 100%; height: 200px " src="' + e.target.result + '"> '

            $('#image_upload_1').append(template);
        };

    });

});

window.fileCollection2 = new Array();
$('#image2').on('change', function (e) {
    var files = e.target.files;
    $('#image_upload_2').empty();

    $.each(files, function (i, file) {


        fileCollection.push(file);

        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (e){

            var template =

                '<img name="" style="width: 100%; height: 200px " src="' + e.target.result + '"> '

            $('#image_upload_2').append(template);
        };

    });

});

window.fileCollection3 = new Array();
$('#image3').on('change', function (e) {
    var files = e.target.files;
    $('#image_upload_3').empty();

    $.each(files, function (i, file) {


        fileCollection3.push(file);

        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (e){

            var template =

                '<img  style="width: 100%; height: 200px " src="' + e.target.result + '"> '

            $('#image_upload_3').append(template);
        };

    });

});








window.fileCollection4 = new Array();
console.log(fileCollection4);

$('#image4').on('change', function (e) {
    var files = e.target.files;
    $('#image_upload_4').empty();
    $.each(files, function (i, file) {


        fileCollection4.push(file);
console.log(fileCollection4);
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (e){

            var template =

                '<img name="" style="width: 100%; height: 200px " src="' + e.target.result + '"> '

            $('#image_upload_4').append(template);
        };

    });

});
