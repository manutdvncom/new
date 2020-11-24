// mvc_demo/assets/js/script.js
// File js chính của ứng dụng
$(document).ready(function () {
   //Tích hợp ckeditor vào textarea thông qua thuộc tính name
    //Do trình duyệt có cơ chế cache với code js nên sẽ có trường hợp thay đổi code js nhưng refresh trên
    //trình duyệt lại ko nhận đc sự thay đổi, cần phải xóa cache trình duyệt: Ctrl + Shift + R
    CKEDITOR.replace('comment' , {
//đường dẫn đến file ckfinder.html của ckfinder
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
//đường dẫn đến file connector.php của ckfinder
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
});