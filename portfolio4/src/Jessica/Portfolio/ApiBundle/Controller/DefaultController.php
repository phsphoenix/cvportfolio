<?php

namespace Jessica\Portfolio\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JessicaPortfolioApiBundle:Default:index.html.twig');
    }
}
