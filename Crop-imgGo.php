<?php
require ('libs/imgGo.class.php');

$config = array(
	'newName' => '',				//新文件名
	'maxSize' => 2048,				//限制文件处理最大值(单位KB)
	'allowType' => array(			//默认接受处理的文件扩展名
		".gif",
		".png",
		".jpg",
		".jpeg",
		'.tmp'
	),
	'crop' => array(				//生成裁剪，默认array()不操作，如果开启则直接传递配置数组，默认值为$cropConfig
		'suffix' => '.crop',			//裁剪后后缀名
		'axisX' => $_POST['x'],			//裁剪左上角坐标X
		'axisY' => $_POST['y'],			//裁剪左上角坐标Y
		'axisW' => $_POST['w'],			//裁剪左上角坐标X
		'axisH' => $_POST['h'],			//裁剪左上角坐标Y
		'width' => 128,					//裁剪后图像的宽度
		'height' => 128,				//裁剪后图像的高度
		'quality' => 90,				//裁剪后图像的品质(1 to 100).品质越高,图像文件越大
		'toType' => 'jpg',				//单独设置(覆盖全局设置)
		'savePath' => '',		//单独设置(覆盖全局设置)
		'returnData' => false,			//单独设置(覆盖全局设置)
		'returnBase64' => 'src',		//单独设置(覆盖全局设置)
	)
);

$imgGo = new imgGo($_POST['src'],$config);
$info = $imgGo->getDataInfo();

echo json_encode(array(
	'oriMIME'=>$info['oriMIME'],
	'cropMIME'=>$info['cropMIME'],
	'cropBase64Data'=>$info['cropBase64Data']
));