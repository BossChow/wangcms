<?php
namespace Admin\Controller;

class ContentController extends CommonController {
    public function index() {
        $this->display();
    }

    public function add() {

        if ($_POST) {
            if (!isset($_POST['title']) || !$_POST['title']) {
                return show(0, "标题不存在");
            }
            if (!isset($_POST['catid']) || !$_POST['catid']) {
                return show(0, "文章栏目不存在");
            }
            if (!isset($_POST['keywords']) || !$_POST['keywords']) {
                return show(0, "关键字不存在");
            }
            if (!isset($_POST['content']) || !$_POST['content']) {
                return show(0, "content不存在");
            }

            $newsId = D("News")->insert($_POST);
            if ($newsId) {
                $newsContentData['content'] = $_POST['content'];
                $newsContentData['news_id'] = $newsId;
                $cId = D("NewsContent")->insert($newsContentData);
                if ($cId) {
                    return show(1, "插入成功");
                } else {
                    return show(1, "主表插入成功，副表插入失败");
                }
            } else {
                return show(0, "新增失败");
            }
        } else {
            $webSiteMenu = D("Menu")->getBarMenus();
            $titleFontColor = C("TITLE_FONT_COLOR");
            $copyFrom = C("COPY_FROM");
            $this->assign('webSiteMenu', $webSiteMenu);
            $this->assign('titleFontColor', $titleFontColor);
            $this->assign('copyFrom', $copyFrom);
            $this->display();
        }
    }
}
