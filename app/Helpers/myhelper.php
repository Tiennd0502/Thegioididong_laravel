<?php
  //  Upload file img
  function uploadImage($file, $folder){
		$nameImg = $file->getClientOriginalName();
		$imgType =pathinfo($nameImg,PATHINFO_EXTENSION);
		$name = '';
		$num = 1;
		while(\File::exists($folder.'/'.$nameImg)){
				$name = str_replace(".".$imgType,"",$file->getClientOriginalName());
				$name = $name ." (".$num.").".$imgType;
				$nameImg = $name;
				$num ++;
		}
		$file->move($folder, $nameImg);
		return '/'.$nameImg;
	}
    // delete file 
	function deleteFile($path){
		if(file_exists($path)){
				unlink($path);
		}
	}

  function noMore($Del, $Add){
		$strDel = '';
		foreach($Del as $value){
			if($strDel == ''){
				$strDel = $value;
			}else{
				$strDel .= ','.$value;
			}
		}
		if($strDel != ''){
			$arrDel = explode(',', $strDel);
			foreach ($Add as $key => $value){
				if(in_array($value->getClientOriginalName(), $arrDel)){
					// echo $value->getClientOriginalName()."<br>";
					unset($Add[$key]);
				}
			}
		}
		return $Add;
	}