<?php

class Controller {
    //Thuộc tính chứa nội dung view động
    public $content;
    //Thuộc tính chứa lỗi
    public $error;
    //Thuộc tính hiện thị tiêu đề trang
    public $page_title;
    //Phương thức lấy nội dung view dựa vào đường dẫn tới view đó, có cơ chế truyền viến ra view để sử dụng
    public function render($view_path,$variables=[]){
        //$view_path: đường dẫn tới view
        //$variables: mảng các phần tử sẽ truyền ra view
        extract($variables);
        ob_start();
        require_once "$view_path";
        $render_view = ob_get_clean();
        return $render_view;
    }
}
?>