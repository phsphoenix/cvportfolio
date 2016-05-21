<?php

namespace Jessica\Portfolio\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JessicaPortfolioWebBundle:Default:index.html.twig');
    }
}
