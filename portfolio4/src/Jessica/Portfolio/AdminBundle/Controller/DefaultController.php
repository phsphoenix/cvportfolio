<?php

namespace Jessica\Portfolio\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JessicaPortfolioAdminBundle:Default:index.html.twig');
    }
}
