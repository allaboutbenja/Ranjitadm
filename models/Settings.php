<?php
class Settings{
    private  $id;
    private  $banner;
    private  $subBanner;
    private  $whatsapp;
    private  $instagram;
    private  $facebook;

    function __construct($id,$banner,$subBanner,$whatsapp,$instagram,$facebook) {
        $this->id = $id;
        $this->banner = $banner;
        $this->subBanner = $subBanner;
        $this->whatsapp = $whatsapp;
        $this->instagram = $instagram;
        $this->facebook = $facebook;
    }
    public function getId(){
        return $this->id;
    }
    public function getBanner() {
        return $this->banner;
    }
    public function getSubBanner(){
        return $this->subBanner;
    }
    public function getWhatsapp() {
        return $this->whatsapp;
    }
    public function getInstagram(){
        return $this->instagram;
    }
    public function getFacebook() {
        return $this->facebook;
    }
}
?>