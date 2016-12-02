<?php
/**
 * 图片相关
 */
namespace Admin\Controller;

class ImageController extends CommonController {
    private $_uploadObj;

    public function __construct()
    {
    }

    public function ajaxuploadimage() {
        $upload = D("UploadImage");
        $res = $upload->imageUpload();

        if ($res === false) {
            return show(0, "上传失败", '');
        } else {
            return show(1, "上传成功", $res);
        }
    }
}