<?php
require ('libs/ToyUp.class.php');

$config = array(
	'uploadMode' => 'normal',		//上传模式：normal、temp
	'uploadPath' => '',		//文件保存目录
	'returnData' => false,			//是否返回文件原始数据
	'returnBase64Data' => true,			//是否返回Base64格式数据
	'randomName' => false,			//生成随机文件名
	'maxSize' => 2048,				//限制文件处理最大值(单位KB)
	'allowType' => array(			//默认接受处理的文件类型
		".gif",
		".png",
		".jpg",
		".jpeg"
	)
);

$ToyUp = new ToyUp('fileData',$config);
$info = $ToyUp->info();

echo json_encode(array(
	'base64Data'=>$info['base64Data']
));