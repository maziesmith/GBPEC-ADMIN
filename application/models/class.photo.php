<?php
/**
 * Photograph
 * 
 * @package Main
 * @subpackage Basic
 * @author Faizan Ayubi
 */
class Photograph extends DatabaseObject {
	protected static $table_name = "photographs";
	public $id;
	public $filename;
	public $type;
	public $size;
	public $created;

	private $temp_path;
	protected $upload_dir="images";
	public $noimage = "noimage.jpg";
	public $errors = array();
	protected static $db_fields=array('id', 'filename', 'type', 'size', 'created');
	protected $upload_errors = array(
		UPLOAD_ERR_OK 			=> "No errors.",
		UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
		UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
		UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
		UPLOAD_ERR_NO_FILE 		=> "No file.",
		UPLOAD_ERR_NO_TMP_DIR 	=> "No temporary directory.",
		UPLOAD_ERR_CANT_WRITE 	=> "Can't write to disk.",
		UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
		);
	
	public function attach_file($file, $key) {
		if (!$file || empty($file) || !is_array($file)) {
			$this->errors[] = "No file was uploaded.";
			return false;
		} elseif ($file['error'][$key] != 0) {
			$this->errors[] = $this->upload_errors[$file['error'][$key]];
			return false;
		} else {
			$this->temp_path = $file['tmp_name'][$key];
			$this->filename  = rand(10, 10000).rand(10, 10000).'.jpg';
			$this->type 	 = $file['type'][$key];
			$this->size 	 = $file['size'][$key];
			return true;
		}
	}

	public function attach_single_file($file) {
		if (!$file || empty($file) || !is_array($file)) {
			$this->errors[] = "No file was uploaded.";
			return false;
		} elseif ($file['error'] != 0) {
			$this->errors[] = $this->upload_errors[$file['error']];
			return false;
		} else {
			$this->temp_path = $file['tmp_name'];
			$this->filename  = rand(10, 10000).rand(10, 10000).'.jpg';
			$this->type 	 = $file['type'];
			$this->size 	 = $file['size'];
			return true;
		}
	}
	
	public function save() {
		global $dir_uploads;
		if (isset($this->id)) {
			$this->update();
		} else {
			if (!empty($this->errors)) { return false;}
			if (empty($this->filename) || empty($this->temp_path)) {	
				$this->errors[]= "The file location was not available.";
				return false;
			}
			$target_path = $dir_uploads.$this->upload_dir ."/".$this->filename;
			if (move_uploaded_file($this->temp_path, $target_path)) {
				$imagepath = $this->filename;
				$save = $target_path;
				$file = $target_path;

					list($width, $height) = getimagesize($file);
					$tn = imagecreatetruecolor($width, $height) ;
					switch ($this->type) {
						case 'image/jpeg':
							$image = imagecreatefromjpeg($file);
							break;
						case 'image/png':
							$image = imagecreatefrompng($file);
							break;
						case 'image/gif':
							$image = imagecreatefromgif($file);
							break;
						default:
							exit;
							break;
					}
					
					imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height);
					switch ($this->type){
						case 'image/jpeg':
							imagejpeg($tn, $save, 60);
							break;
						case 'image/png':
							imagepng($tn, $save, 6);
							break;
						case 'image/gif':
							imagegif($tn, $save);
							break;
						default:
							exit;
							break;
					}

					//thumbnail
					$save = $dir_uploads.$this->upload_dir."/sml_".$this->filename;
					$file = $target_path;

					list($width, $height) = getimagesize($file);
					$modwidth = 100;
					$modheight = 100;
					$tn = imagecreatetruecolor($modwidth, $modheight);
					switch ($this->type){
						case 'image/jpeg':
							$image = imagecreatefromjpeg($file);
							break;
						case 'image/png':
							$image = imagecreatefrompng($file);
							break;
						case 'image/gif':
							$image = imagecreatefromgif($file);
							break;
						default:
							exit;
							break;
					}

					imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height);

					switch ($this->type){
						case 'image/jpeg':
							imagejpeg($tn, $save, 60);
							break;
						case 'image/png':
							imagepng($tn, $save, 6);
							break;
						case 'image/gif':
							imagegif($tn, $save);
							break;
						default:
							exit;
							break;
					}

				if ($this->create()) {
					unset($this->temp_path);
					return true;
				}
			}else {
				$this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
				return false;
			}
		}
	}

	public function destroy() {
		global $dir_root;
		$target_path = $dir_root."assets/uploads/".$this->upload_dir."/".$this->filename;
		$thumb_target_path = $dir_root."assets/uploads/".$this->upload_dir."/sml_".$this->filename;
		if(file_exists($target_path)){
			if ($this->delete()) {
				if(unlink($target_path) && unlink($thumb_target_path)){
					return true;
				}else{
					return false;
				}
			} else {
				return false;
			}
		}
	}

	public function image_path() {
		global $cdn;
		$userImage = $cdn."uploads/".$this->upload_dir."/".$this->filename;
		return $userImage;
	}
	
	public function image_path_thumb() {
		global $cdn;
		$userImage = $cdn."uploads/".$this->upload_dir."/sml_".$this->filename;
		return $userImage;
	}
}

?>