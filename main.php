<?php
/**
 * Plugin Name: Folder Slider DX ver2
 * Description: ディレクトリ内の画像を取得するスライダー
 */

class Folderslider{
  public $urlslider;

  public function get_images(){
    $wudir = wp_upload_dir(); //...
    $file_dir = $wudir['basedir']."/slider3/*" ; //var/www/html/wp-content/uploads/slider3/'
    $this->urlslider = $wudir['baseurl']."/slider3/" ; //'https://ui.org/wp-content/uploads/slider3/

    $img_names=[];
    $filelist = glob($file_dir);

      foreach ($filelist as $values) {
        # '/'で分解した最後がファイル名｡225x300が含むファイル名のみ取得
        $val = explode('/',$values);
          $img_name = end($val);
          if(strpos($img_name,'225x300') !== false){
            $img_names[] = $img_name;
          }
      }
      shuffle($img_names);
    return $img_names;
  }
}

$fslider = new Folderslider();