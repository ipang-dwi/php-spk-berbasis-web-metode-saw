<?php
	/*
	** lhast alpha by ip@ng, 06/03/2015
	*/
	
	$salt = '@adDunyaa2$MataaAdDunyaa%4#AlMarAtus91Sholihah';	// saltny di sini
	
	function hashku($in,$pass){									// 8 pilihan hashing bwt signup or change password
		if($in==1)
			$return = md5($pass.$GLOBALS['salt']);
		if($in==2)
			$return = hash('sha512',$pass.$salt);
		if($in==3)
			$return = hash('ripemd320',$pass.$salt);
		if($in==4)
			$return = hash('whirlpool',$pass.$salt);
		if($in==5)
			$return = hash('tiger192,4',$pass.$salt);
		if($in==6)
			$return = hash('snefru256',$pass.$salt);
		if($in==7)
			$return = hash('gost',$pass.$salt);
		if($in==8)
			$return = hash('haval256,5',$pass.$salt);
		return $return;
	}
	
	function cekku($pass1,$pass2){								// bwt login
		if($pass1==hashku(1,$pass2))
			return true;
		else
			return false;
	}
?>