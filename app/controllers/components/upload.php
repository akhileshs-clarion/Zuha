<?php 
class UploadComponent extends Object {

    #var $helpers = Array('Html', 'Javascript'); 

    function image($image, $subDir = null, $id = null) { 
		#image = the file upload array
		#subDir = the sub directory of the img folder you'd like
		#id = an id number you'd like to start the file name with
		if (!empty($image)) {
			# define the id as blank if its not here
			if(isset($id)) {
				$id = $id;
			} else {
				$id = '';
			}
						
			# Upload image by first checking where it should be uploaded to
			if (file_exists(ROOT.DS.APP_DIR.DS.'views'.DS.'themed'.DS.'default'.DS.WEBROOT_DIR)) {
				$imageDirectory = ROOT.DS.APP_DIR.DS.'views'.DS.'themed'.DS.'default'.DS.WEBROOT_DIR.'/img/'.$subDir;
				$imageName = time() . '-' . $id  . '-' . $image['name'];
				$imageUri = '/theme/default/img/' . $subDir.'/' . $imageName;
			} else {
				$imageDirectory = 'img/' . $subDir;
				$imageName = time() . '-' . $id  . '-' . $image['name'];
				$imageUri = '/' . $imageDirectory . '/' . $imageName;
			}
			# If the upload directory doesn't exist, create it
			if (!file_exists($imageDirectory)) {
				mkdir($imageDirectory, 0777, true);
			}
			# move it to a temp spot
			if(move_uploaded_file($image['tmp_name'], $imageDirectory.'/'.$imageName)) {
				return $imageUri;
			}
		} else {
			return false;
		}
    } 
} 
?>