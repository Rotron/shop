function fileUploadHandlers() {
    var self = {
        init: function(name){
          this.name = name;
        },
        fileDialogComplete: function(e, data)
        {
            var fileName = data.files[0].name;
            var fileSize = data.files[0].size;
            if(/(\.|\/)(jpe?g|png)$/i.test(fileName) && fileSize < 10*1024*1024) {
                data.submit();
            } else {
                var progressElement = $('#progress .bar');
                progressElement.css('background-color', 'red');
                progressElement.css('width', '100%')
                progressElement.text('Ошибка. Загружать можно файлы с расширением: jpg|jpeg');
            }
        },
        uploadProgress: function(e, data)
        {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            var progressElement = $('.progress .bar');
            progressElement.css('background-color', 'greenyellow');
            progressElement.css('width', progress + '%');
            progressElement.text(data.loaded +' / '+ data.total +' loaded');
        },
        uploadComplete: function(e, data)
        {
            $('#image_name').val(data.result.files[0].name);
            $("#thumbnails").html('<img src="'+ data.result.files[0].thumbnail_url +'" />');
            $("#thumbnails").show();
        },
        loadImage: function(e, data)
        {
            var rowCount = $('#table-images tr').length;
            if ($('#images').val()) {
                var images = JSON.parse($('#images').val());
                images[rowCount] = data.result.tmp;
                images = JSON.stringify(images)
                $('#images').val(images);
            } else {
                var images = '{"' + rowCount + '": "' + data.result.tmp + '"}';
                $('#images').val(images);  
            }

            var test = $('<button class="btn btn-danger delete margin" data-filename="' + data.result.filename + '"  data-row="' + rowCount + '"><i class="glyphicon glyphicon-trash"></i> Удалить</button>').click(function () {
                //alert($(this).data('remove'));
                /*$.ajax({
                    type: "POST",
                    url: '/admin/delete/1',
                    data: data,
                    success: success,
                    dataType: dataType
                });*/

               $.post( "/admin/delete", {thumb: 1, filename:  $(this).data('filename')})
                    .done(function( data ) {
                    alert( "Data Loaded: " + data );
                });

            });
            //});

            var newRowContent = '<tr><td>' + rowCount + '</td><td><img src="' + data.result.thumb + '"></td><td>' + data.result.size + ' KB</td><td class="serv-button"></td></tr>';
            $(newRowContent).appendTo($("#table-images"));
            $("tr:last .serv-button").append(test);


            $("#send").click(function () {
                $("canvas").remove();
                $(".default").after('<canvas width="300" height="300" id="canvas"/>');
                img = new Image;
                $('#parameters').val('{"name":"' + data.result.file + '","tmp":"' + data.result.tmp + '","x":' + Math.floor(coordinates(one).x) + ',"y":' + Math.floor(coordinates(one).y) + ',"w":' + Math.floor(coordinates(one).w) + ',"h":' + Math.floor(coordinates(one).h) + '}');
                img.src = coordinates(one).image;
                img.onload = function () {
                    $("canvas").addClass("output").hide().delay("0").fadeOut("hide")
                }
            });
        },
        loadImageFileCrop: function(e, data)
        {
            $("div").remove(".crop-container");
            $("div").remove(".noUi-base");
            var one = new CROP;
            one.init(".default");
            one.loadImg(data.result.file);
            $("#send").click(function () {
                $("canvas").remove();
                $(".default").after('<canvas width="300" height="300" id="canvas"/>');
                img = new Image;
                //var parameters = '[{"X":' + coordinates(one).x + ',"Y":' + coordinates(one).y + ',"W":' +coordinates(one).w + ',"H":' + coordinates(one).h + '}]';
                $('#parameters').val('{"name":"' + data.result.file + '","tmp":"' + data.result.tmp + '","x":' + Math.floor(coordinates(one).x) + ',"y":' + Math.floor(coordinates(one).y) + ',"w":' + Math.floor(coordinates(one).w) + ',"h":' + Math.floor(coordinates(one).h) + '}');
                /*$('input:text[name=x]').val(coordinates(one).x);
                $('input:text[name=y]').val(coordinates(one).y);
                $('input:text[name=w]').val(coordinates(one).w);
                $('input:text[name=h]').val(coordinates(one).h);*/
                //$('input:text[name=type]').val(data.result.file);
                //$('input:text[name=uploadfile]').val(data.result.file);
                img.src = coordinates(one).image;
                img.onload = function () {
                    $("canvas").addClass("output").hide().delay("0").fadeOut("hide")
                }
            });
        },
    }
    return self;
}