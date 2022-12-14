<?php
namespace ProjectSoft;

class PrepareDLCeiling72 {

	public static function prepareActionsHome(array $data, \DocumentParser $modx, $_DL, \prepare_DL_Extender $_extDocLister)
	{
		$re = '/\s+/mi';
		$data['imageSoc'] = $modx->runSnippet('phpthumb', array(
			'input'=>$data['imageSoc'],
			'options' => 'w=1170,h=402,zc=C'
		));
		$intro = $data['introtext'];
		$intro = strip_tags($intro);
		$intro = preg_replace($re, ' ', $intro);
		$data['introtext'] = htmlspecialchars($intro);
		$data['countdown'] = '';
		if($data['view_countdown'] == '1'):
			$data['countdown'] = '<div class="countdown ' . $data['position_countdown'] . '" data-days="' . $data['days_countdown'] . '"></div>';
			//countdown(data-days!="[+days_countdown+]" class!="[+position_countdown+]")
			// ' . $data['days_countdown'] . '
		endif;
		return $data;
	}

	public static function prepareWork(array $data, \DocumentParser $modx, $_DL, \prepare_DL_Extender $_extDocLister)
	{
		$result = $modx->runSnippet('GalleryAttr', array(
			'id' => $data["id"]
		));
		$data["json"] = $result ? $result : "[]";
		$image = $modx->runSnippet("phpthumb", array(
			'input' => $data['imageSoc'],
			'options' => 'w=270,h=202,zc=C'
		));
		$data["image"] = $image;
		return $data;
	}

	public static function prepareMultiTV_Gallery ($data, $modx, $_multiTV)
	{
		$site = $modx->config['site_url'];
		$caption = (string)$data['title'];
		$src = (string)$data['image'];
		$thumb = $modx->runSnippet('phpthumb', array(
			'input' => (string)$data['image'],
			'options' => 'w=96,h=75,zc=C'
		));
		$output = array(
			'src' => $site . $src,
			'opts' => array(
				'caption' => $caption,
				'thumb' => $site . $thumb
			)
		);
		return $output;
	}
}
