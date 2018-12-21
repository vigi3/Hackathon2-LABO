<?php

namespace App\Controller;

use App\Entity\CategoryCompany;
use App\Form\CategoryCompanyType;
use App\Repository\CategoryCompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category/company")
 */
class CategoryCompanyAdminController extends AbstractController
{
    /**
     * @Route("/", name="category_company_admin_index", methods={"GET"})
     */
    public function index(CategoryCompanyRepository $categoryCompanyRepository): Response
    {
        return $this->render('admin/category_company/index.html.twig', ['category_companies' => $categoryCompanyRepository->findAll()]);
    }

    /**
     * @Route("/new", name="category_company_admin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categoryCompany = new CategoryCompany();
        $form = $this->createForm(CategoryCompanyType::class, $categoryCompany);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoryCompany);
            $entityManager->flush();

            return $this->redirectToRoute('category_company_admin_index');
        }

        return $this->render('admin/category_company/new.html.twig', [
            'category_company' => $categoryCompany,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_company_admin_show", methods={"GET"})
     */
    public function show(CategoryCompany $categoryCompany): Response
    {
        return $this->render('admin/category_company/show.html.twig', ['category_company' => $categoryCompany]);
    }

    /**
     * @Route("/{id}/edit", name="category_company_admin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategoryCompany $categoryCompany): Response
    {
        $form = $this->createForm(CategoryCompanyType::class, $categoryCompany);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_company_admin_index', ['id' => $categoryCompany->getId()]);
        }

        return $this->render('admin/category_company/edit.html.twig', [
            'category_company' => $categoryCompany,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_company_admin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CategoryCompany $categoryCompany): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoryCompany->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoryCompany);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_company_admin_index');
    }
}
