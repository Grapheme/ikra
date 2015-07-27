<?
	function antiCache($path)
	{
		if (!file_exists($path)) return;
		$ver = date('d.m.y-H:i', filemtime($path));
		$anticache = $path.'?'.$ver;
		if (preg_match('/.css$/', $path)) echo "\t".'<link href="'.$anticache.'" rel="stylesheet">'."\n";
		if (preg_match('/.js$/', $path)) echo "\t".'<script src="'.$anticache.'"></script>'."\n";
	}
?>