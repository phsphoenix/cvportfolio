<?php

namespace Jessica\Portfolio\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JessicaPortfolioUserBundle:Default:index.html.twig');
    }
}
