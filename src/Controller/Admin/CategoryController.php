<?php

namespace App\Controller\Admin;

use App\Repository\CategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/admin/categories", name="categories")
 * @Security("is_granted('ROLE_USER')")
 */

class CategoryController extends Controller
{
    /**
     * @Route("/", name="categories_index")
     */

    public function index(CategoryRepository $categories): Response
    {
        $allCategories = $categories->findAll();

        return $this->render('admin/partials/categories.html.twig', [
            'email' => $this->getUser() ? $this->getUser()->getUsername() : '',
            'categories' => $allCategories
        ]);
    }

}