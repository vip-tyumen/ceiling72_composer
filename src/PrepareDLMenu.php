<?php
namespace ProjectSoft;

class PrepareDLMenu {

	public static function prepareHome(array $data, \DocumentParser $modx, $_DL, \prepare_DL_Extender $_extDocLister)
	{
		$func = function($a) {
			return (int)$a;
		};
		$sheme = $_DL->getCFGDef('urlScheme');
		$site = $modx->config['site_name'];
		$ignored = $modx->config['ignore_menu_ids'] ? $modx->config['ignore_menu_ids'] : '';
		$ignored = array_map($func, explode(',', $ignored));
		if(in_array((int)$data['id'], $ignored, true)):
			$data['url'] = $modx->makeUrl($modx->config['site_start'], '', '', $sheme) . "#" . $data["alias"];
		endif;
		return $data;
	}
}