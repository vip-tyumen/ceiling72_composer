<?php
namespace ProjectSoft;

class PrepareDLMenu {

	public static function prepareHome(array $data, \DocumentParser $modx, $_DL, \prepare_DL_Extender $_extDocLister)
	{
		$sheme = $_DocLister->getCFGDef('urlScheme');
		$site = $modx->config['site_name'];
		$ignored = $modx->config['ignore_menu_ids'] || '';
		$ignored = explode(',', $ignored);
		if(array_search($data['id'], $ignored)):
			$data['url'] = $modx->makeUrl($modx->documentIdentifier, '', '', $sheme);
		endif;
		$data['id'];
		return $data;
	}
}