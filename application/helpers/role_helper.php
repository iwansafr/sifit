<?php

function check_role($role_title = '')
{
	$return = false;
	if(!empty($role_title))
	{
		$role   = @$_SESSION[base_url().'_logged_in']['role'];
		if(!empty($role))
		{
			if(strtolower($role)==$role_title)
			{
				$return = true;
			}
		}
	}
	return $return;
}