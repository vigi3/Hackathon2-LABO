<?php

namespace App\Controller;

use App\Entity\CategoryService;
use App\Form\CategoryServiceType;
use App\Repository\CategoryServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category/service")
 */
class CategoryServiceAdminController extends AbstractController
{
    /**
     * @Route("/admin", name="category_service_admin_index", methods={"GET"})
     */
    public function index(CategoryServiceRepository $categoryServiceRepository): Response
    {
        return $this->render('admin/category_service/index.html.twig', ['category_services' => $categoryServiceRepository->findAll()]);
    }

    /**
     * @Route("/new", name="category_service_admin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categoryService = new CategoryService();
        $form = $this->createForm(CategoryServiceType::class, $categoryService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoryService);
            $entityManager->flush();

            return $this->redirectToRoute('category_service_admin_index');
        }

        return $this->render('admin/category_service/new.html.twig', [
            'category_service' => $categoryService,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_service_admin_show", methods={"GET"})
     */
    public function show(CategoryService $categoryService): Response
    {
        return $this->render('admin/category_service/show.html.twig', ['category_service' => $categoryService]);
    }

    /**
     * @Route("/{id}/edit", name="category_service_admin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategoryService $categoryService): Response
    {
        $form = $this->createForm(CategoryServiceType::class, $categoryService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_service_admin_index', ['id' => $categoryService->getId()]);
        }

        return $this->render('admin/category_service/edit.html.twig', [
            'category_service' => $categoryService,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_service_admin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CategoryService $categoryService): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoryService->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoryService);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_service_admin_index');
    }
}
