<?php

namespace App\Controller\Admin;

use App\Repository\PostRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/admin", name="admin_area")
 * @Security("is_granted('ROLE_USER')")
 */

class AdminController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index(PostRepository $posts): Response
    {
            $allPosts = $posts->findAll();

        return $this->render('admin/index.html.twig', [
            'email' => $this->getUser() ? $this->getUser()->getUsername() : '',
            'posts' => $allPosts
        ]);
    }
}