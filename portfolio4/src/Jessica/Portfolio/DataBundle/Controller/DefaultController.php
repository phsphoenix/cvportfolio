<?php

namespace Jessica\Portfolio\DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JessicaPortfolioDataBundle:Default:index.html.twig');
    }
}
