<?php
require_once 'controllers/Controller.php';
class CategoryController extends Controller {
    public function create(){
        //Set giá trị cho thuộc tính title
        $this->page_title = 'Trang thêm mới danh mục';
        //Lấy nội dung view tương ứng
        $this->content = $this->render('views/categories/create.php');
        //Gọi layout để hiển thị nội dung view vừa lấy được
        require_once 'views/layouts/main.php';
    }
}
?>