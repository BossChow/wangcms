<?php
namespace Admin\Controller;

class ContentController extends CommonController {
    public function index() {
        $this->display();
    }

    public function add() {
        $webSiteMenu = D("Menu")->getBarMenus();
        $titleFontColor = C("TITLE_FONT_COLOR");
        $copyFrom = C("COPY_FROM");
        $this->assign('webSiteMenu', $webSiteMenu);
        $this->assign('titleFontColor', $titleFontColor);
        $this->assign('copyFrom', $copyFrom);
        $this->display();
    }
}
