<?php

namespace Cup\SecurityBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CupSecurityBundle extends Bundle
{
    public function getParent()
	{
		return 'FOSUserBundle';
	}
}
