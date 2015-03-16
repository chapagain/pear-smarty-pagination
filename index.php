<?php
require_once('classes/ConnectSmarty.class.php');
require_once ('Pager/Pager.php');

// create an object of the class included above
$smarty = new ConnectSmarty;

function getPager($item,$perPage,$mode,$delta)
{
	// setting Sliding as default mode
	if($mode == "")
	{
		$mode = 'Sliding';
	}
	
	// setting the default delta value as 2
	// delta means the width of pagination
	// more delta value results more width
	if($delta == "")
	{
		$delta = '2';
	}
	
	$params = array(
				'mode'=>$mode,
				'perPage'=>$perPage,
				'delta'=>$delta,
				'itemData'=>$item);
	$pager =& Pager::factory($params);
	$data = $pager->getPageData();
	$links = $pager->getLinks();
	$links = $pager->links;
	return array($data,$links);
}

$mode = 'Sliding'; // $mode = 'Jumping';
$perPage = '3';
$delta = '2';
$item = array(
		 array('country_id'=>'1','country_name'=>'India'),
		 array('country_id'=>'2','country_name'=>'Pakistan'),
		 array('country_id'=>'3','country_name'=>'Nepal'),
		 array('country_id'=>'4','country_name'=>'Srilanka'),
		 array('country_id'=>'5','country_name'=>'Bangladesh'),
		 array('country_id'=>'6','country_name'=>'Maldives'),
		 array('country_id'=>'7','country_name'=>'Bhutan'),
		 array('country_id'=>'8','country_name'=>'Afganistan'),
		 array('country_id'=>'9','country_name'=>'China')
		 );
$pagination = getPager($item,$perPage,$mode,$delta);
// print_r($pagination);

$smarty->assign('pager',$pagination[1]);
$smarty->assign('country',$pagination['0']);

// display the content
$smarty->display('index.tpl');

?>