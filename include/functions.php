<?php
/**
 * 成功弹出库
 */
	function success($content,$url)
	{
		echo '<script type="text/javascript">alert("'.$content.'");location.href="'.$url.'"</script>';
	}
/**
 * 失败弹出库
 */
	function error($content)
	{
		die('<script type="text/javascript">alert("'.$content.'");history.back();</script>');
	}
?>