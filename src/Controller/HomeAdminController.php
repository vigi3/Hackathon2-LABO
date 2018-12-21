<?php
/**
 * Created by PhpStorm.
 * User: jovanela
 * Date: 20/12/18
 * Time: 15:48
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeAdminController extends AbstractController
{
    /**
     * @Route("/admin", name="home_admin")
     */
    public function index()
    {
        return $this->render('homeadmin/index.html.twig');
    }
}