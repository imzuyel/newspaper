//Image Show Before Upload Start
$(document).ready(function () {
    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        if (fileName) {
            $('#fileLabel1').html(fileName);
        }
    });
});

function showImage(data, imgId) {
    if (data.files && data.files[0]) {
        var obj = new FileReader();

        obj.onload = function (d) {
            var image = document.getElementById(imgId);
            image.src = d.target.result;
        }
        obj.readAsDataURL(data.files[0]);
    }
}
//Image Show Before Upload End


//Image Show Before Upload Start
$(document).ready(function () {
    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        if (fileName) {
            $('#fileLabel2').html(fileName);
        }
    });
});

function showImage(data, imgId) {
    if (data.files && data.files[0]) {
        var obj = new FileReader();

        obj.onload = function (d) {
            var image = document.getElementById(imgId);
            image.src = d.target.result;
        }
        obj.readAsDataURL(data.files[0]);
    }
}
//Image Show Before Upload End

//Image Show Before Upload Start
$(document).ready(function () {
    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        if (fileName) {
            $('#fileLabel3').html(fileName);
        }
    });
});

function showImage(data, imgId) {
    if (data.files && data.files[0]) {
        var obj = new FileReader();

        obj.onload = function (d) {
            var image = document.getElementById(imgId);
            image.src = d.target.result;
        }
        obj.readAsDataURL(data.files[0]);
    }
}
//Image Show Before Upload End
