<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

//$cache->set('page');
$tpl->setfile(array(
	'body'=>'index.tpl',
	
));

//hot news
$result = $oContent->view(10,1,0,5);
$hotnews = $result->fetch();
$hotnews = $hook->format($hotnews);
$hotnews['icon'] = $hotnews['icon']?'<img src="image.php?file='.$hotnews['icon'].'&width=451"  />':'';
$tpl->merge($hotnews,'hotnews');


while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['icon'] = $rs['icon']?'<img src="image.php?file='.$rs['icon'].'&width=108"  />':'';
	$rs['intro'] = cutnwords($rs['intro'],15);
	$tpl->assign($rs,'hotnewslist');
	
}

// focus news
$array_news = array(
	1=>$system->modules['data']['idols'][$system->lang]['module_name'],
	2=>$system->modules['data']['stars'][$system->lang]['module_name'],
	3=>$system->modules['data']['music'][$system->lang]['module_name'],
	4=>$system->modules['data']['movie'][$system->lang]['module_name'],
	5=>$system->modules['data']['style'][$system->lang]['module_name'],
	6=>$system->modules['data']['sport'][$system->lang]['module_name'],
	7=>$system->modules['data']['relax'][$system->lang]['module_name'],
	8=>$system->modules['data']['media'][$system->lang]['module_name'],
);
$result = $oContent->view(array_keys($array_news),"c.home = 1",0,7);
$focus = $result->fetch();
$focus = $hook->format($focus);
$focus['name_url'] = str2url($focus['name']);
$focus['module'] = $array_news[$focus['type']];
$focus['icon'] = $focus['icon']?'<img src="image.php?file='.$focus['icon'].'&width=229"  />':'';
$tpl->merge($focus,'focus');

while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['module'] = $array_news[$rs['type']];
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'focuslist');
	
}


// lastest news soisao
$cond = 1;//"c.home = 0";
$result = $oContent->view(2,$cond,0,7);
$stars = $result->fetch();
$stars = $hook->format($stars);
$stars['name_url'] = str2url($stars['name']);
$stars['module'] = $array_news[$stars['type']];
$stars['icon'] = $stars['icon']?'<img src="image.php?file='.$stars['icon'].'&width=140"  />':'';
$tpl->merge($stars,'stars');

while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['module'] = $array_news[$rs['type']];
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'starslist');
	
}


// lastest news music
$cond = 1;//"c.home = 0";
$result = $oContent->view(3,$cond,0,7);
$music = $result->fetch();
$music = $hook->format($music);
$music['name_url'] = str2url($music['name']);
$music['module'] = $array_news[$music['type']];
$music['icon'] = $music['icon']?'<img src="image.php?file='.$music['icon'].'&width=140"  />':'';
$tpl->merge($music,'music');

while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['module'] = $array_news[$rs['type']];
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'musiclist');
	
}

// lastest news movie
$cond = 1;//"c.home = 0";
$result = $oContent->view(4,$cond,0,7);
$movie = $result->fetch();
$movie = $hook->format($movie);
$movie['name_url'] = str2url($movie['name']);
$movie['module'] = $array_news[$movie['type']];
$movie['icon'] = $movie['icon']?'<img src="image.php?file='.$movie['icon'].'&width=140"  />':'';
$tpl->merge($movie,'movie');

while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['module'] = $array_news[$rs['type']];
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'movielist');
	
}

// lastest news style
$cond = 1;//"c.home = 0";
$result = $oContent->view(5,$cond,0,7);
$style = $result->fetch();
$style = $hook->format($style);
$style['name_url'] = str2url($style['name']);
$style['module'] = $array_news[$style['type']];
$style['icon'] = $style['icon']?'<img src="image.php?file='.$style['icon'].'&width=140"  />':'';
$tpl->merge($style,'style');

while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['module'] = $array_news[$rs['type']];
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'stylelist');
	
}

// lastest news sport
$cond = 1;//"c.home = 0";
$result = $oContent->view(6,$cond,0,7);
$sport = $result->fetch();
$sport = $hook->format($sport);
$sport['name_url'] = str2url($sport['name']);
$sport['module'] = $array_news[$sport['type']];
$sport['icon'] = $sport['icon']?'<img src="image.php?file='.$sport['icon'].'&width=140"  />':'';
$tpl->merge($sport,'sport');

while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['module'] = $array_news[$rs['type']];
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'sportlist');
	
}

// lastest news relax
$cond = 1;//"c.home = 0";
$result = $oContent->view(7,$cond,0,7);
$relax = $result->fetch();
$relax = $hook->format($sport);
$relax['name_url'] = str2url($relax['name']);
$relax['module'] = $array_news[$relax['type']];
$relax['icon'] = $relax['icon']?'<img src="image.php?file='.$relax['icon'].'&width=140"  />':'';
$tpl->merge($relax,'relax');

while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['module'] = $array_news[$rs['type']];
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'relaxlist');
	
}

// lastest news relax
$cond = 1;//"c.home = 0";
$result = $oContent->view(1,$cond,0,7);
$idols = $result->fetch();
$idols = $hook->format($idols);
$idols['name_url'] = str2url($idols['name']);
$idols['module'] = $array_news[$idols['type']];
$idols['icon'] = $idols['icon']?'<img src="image.php?file='.$idols['icon'].'&width=140"  />':'';
$tpl->merge($idols,'idols');

while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['module'] = $array_news[$rs['type']];
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'idolslist');
	
}

// lastest news relax
$cond = 1;//"c.home = 0";
$result = $oContent->view(8,$cond,0,7);
$media = $result->fetch();
$media = $hook->format($media);
$media['name_url'] = str2url($media['name']);
$media['module'] = $array_news[$media['type']];
$media['icon'] = $media['icon']?'<img src="image.php?file='.$media['icon'].'&width=140"  />':'';
$tpl->merge($media,'media');

while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['module'] = $array_news[$rs['type']];
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'medialist');
	
}

?>