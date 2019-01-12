<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\CompaniesModel;

class CompaniesController extends BaseController
{
	public function __construct()
	{
		parent::__construct( new CompaniesModel );
	}

	public function create()
	{
		$postData = sboardFilterPostData( $_POST );

		if ( $this->validateData( $postData ) && ! $this->dataExists( $postData['url'], 'url' ) ) :

			$postData['details'] = serialize( $postData['details'] );

			$this->model->insert( $postData ); /** @todo work on error handling */

			if ( ! empty( $this->hasErrors() ) ) {
				$return['type'] = 'error';
				$return['msg'] = $this->hasErrors();
			} else {
				$return['type'] = 'success';
			}

		else:
			$return['type'] = 'error';
			$return['msg'] = 'Something is wrong!';
		endif;

		echo json_encode( $return );
	}

	public function check()
	{
		$postData = $_POST;

		/** @todo defer the ajax call */
		if ( ! $this->dataExists( $postData['url'], 'url' ) ) :
			$return['type'] = 'success';
		else:
			$return['type'] = 'error';
			$return['msg'] = 'The company URL already exists!';
		endif;

		echo json_encode( $return );
	}

	public function update()
	{
		$postData = sboardFilterPostData( $_POST );

		if ( isset( $postData['id'] ) ) :
			if (isset($_FILES['details'])) {
				$fileTmpPath = $_FILES['details']['tmp_name']['logo'];
				$fileName = $_FILES['details']['name']['logo'];
				$fileSize = $_FILES['details']['size']['logo'];
				$fileType = $_FILES['details']['type']['logo'];
				$fileNameCmps = explode(".", $fileName);
				$ext = strtolower( end( $fileNameCmps ) );
				$allowedFileExtensions = ['jpg', 'gif', 'png'];
				$uploadFileDir = wp_upload_dir()['basedir'].'/swap/';
				if (!file_exists($uploadFileDir)) {
					mkdir($uploadFileDir, 0777, true);
				}
				$newFileName = md5(time() . $fileName) . '.' . $ext;
				$dest_path = $uploadFileDir . $newFileName;
				$fullURL = wp_upload_dir()['baseurl'].'/swap/'.$newFileName;

				if ( in_array( $ext, $allowedFileExtensions ) ) {
					if (move_uploaded_file($fileTmpPath, $dest_path))
					{
					echo $message ='File is successfully uploaded.';
					} else {
						echo 'sss';
					}
				}
			}
			$postData['details']['logo'] = $fullURL;
			$postData['details'] = serialize( $postData['details'] );
			$postData['positions'] = serialize( $postData['positions'] );
			$postData['locations'] = serialize( $postData['locations'] );

			$this->model->update( $postData );

			$return['type'] = 'success';
		else:
			$return['type'] = 'error';
		endif;

		echo json_encode( $return );
	}

}