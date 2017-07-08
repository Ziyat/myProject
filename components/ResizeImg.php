<?php
/**
* 
*/
class ResizeImg
{
	static public function resize($file_input, $file_output, $w_o, $h_o, $percent = false) {
		list($w_i, $h_i, $type) = getimagesize($file_input);
		if (!$w_i || !$h_i) {
			echo 'Невозможно получить длину и ширину изображения';
			return;
	    }
	    $types = array('','gif','jpeg','png');
	    $ext = $types[$type];
	    if ($ext) {
	    	$func = 'imagecreatefrom'.$ext;
	    	$img = $func($file_input);
	    } else {
	    	echo 'Некорректный формат файла';
			return;
	    }
		if ($percent) {
			$w_o *= $w_i / 100;
			$h_o *= $h_i / 100;
		}
		if (!$h_o) $h_o = $w_o/($w_i/$h_i);
		if (!$w_o) $w_o = $h_o/($h_i/$w_i);
		$img_o = imagecreatetruecolor($w_o, $h_o);
		imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
		if ($type == 2) {
			return imagejpeg($img_o,$file_output,100);
		} else {
			$func = 'image'.$ext;
			return $func($img_o,$file_output);
		}
	}

/**
* Обрезка изображения
*
* Функция работает с PNG, GIF и JPEG изображениями.
* Обрезка идёт как с указанием абсоютной длины, так и относительной (отрицательной).
*
* @param string Расположение исходного файла
* @param string Расположение конечного файла
* @param array Координаты обрезки
* @param bool Размеры даны в пискелях или в процентах
* @return bool
*/
	static public function crop($file_input, $file_output, $crop = 'square',$percent = false) {
		list($w_i, $h_i, $type) = getimagesize($file_input);
		if (!$w_i || !$h_i) {
			echo 'Невозможно получить длину и ширину изображения';
			return;
	    }
	    $types = array('','gif','jpeg','png');
	    $ext = $types[$type];
	    if ($ext) {
	    	$func = 'imagecreatefrom'.$ext;
	    	$img = $func($file_input);
	    } else {
	    	echo 'Некорректный формат файла';
			return;
	    }
		if ($crop == 'square') {
			$min = $w_i;
			if ($w_i > $h_i) $min = $h_i;
			$w_o = $h_o = $min;
		} else {
			list($x_o, $y_o, $w_o, $h_o) = $crop;
			if ($percent) {
				$w_o *= $w_i / 100;
				$h_o *= $h_i / 100;
				$x_o *= $w_i / 100;
				$y_o *= $h_i / 100;
			}
	    	if ($w_o < 0) $w_o += $w_i;
		    $w_o -= $x_o;
		   	if ($h_o < 0) $h_o += $h_i;
			$h_o -= $y_o;
		}
		$img_o = imagecreatetruecolor($w_o, $h_o);
		imagecopy($img_o, $img, 0, 0, $x_o, $y_o, $w_o, $h_o);
		if ($type == 2) {
			return imagejpeg($img_o,$file_output,100);
		} else {
			$func = 'image'.$ext;
			return $func($img_o,$file_output);
		}
	}
	static public function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 80){
	    $imgsize = getimagesize($source_file);
	    $width = $imgsize[0];
	    $height = $imgsize[1];
	    if($width < $height){
	    	$w = $max_width;
	    	$h = $max_height;
	    	$max_width = $h;
	    	$max_height = $w;
	    }
	    $mime = $imgsize['mime'];
	 
	    switch($mime){
	        case 'image/gif':
	            $image_create = "imagecreatefromgif";
	            $image = "imagegif";
	            break;
	 
	        case 'image/png':
	            $image_create = "imagecreatefrompng";
	            $image = "imagepng";
	            $quality = 7;
	            break;
	 
	        case 'image/jpeg':
	            $image_create = "imagecreatefromjpeg";
	            $image = "imagejpeg";
	            $quality = 80;
	            break;
	 
	        default:
	            return false;
	            break;
	    }
	     
	    $dst_img = imagecreatetruecolor($max_width, $max_height);
	    $src_img = $image_create($source_file);
	     
	    $width_new = $height * $max_width / $max_height;
	    $height_new = $width * $max_height / $max_width;
	    //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
	    if($width_new > $width){
	        //cut point by height
	        $h_point = (($height - $height_new) / 2);
	        //copy image
	        imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
	    }else{
	        //cut point by width
	        $w_point = (($width - $width_new) / 2);
	        imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
	    }
	     
	    $image($dst_img, $dst_dir, $quality);
	 
	    if($dst_img)imagedestroy($dst_img);
	    if($src_img)imagedestroy($src_img);
	}
	
}

