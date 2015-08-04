<?php

namespace Register\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RegisterUserBundle extends Bundle
{
     public function getParent()
      {
        return 'FOSUserBundle';
      }
}