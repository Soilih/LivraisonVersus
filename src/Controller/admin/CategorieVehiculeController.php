<?php

namespace App\Controller\admin;

use App\Entity\CategorieVehicule;
use App\Form\CategorieVehiculeType;
use App\Repository\CategorieVehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/categorie/vehicule")
 */
class CategorieVehiculeController extends AbstractController
{
    /**
     * @Route("/", name="categorie_vehicule_index", methods={"GET"})
     */
    public function index(CategorieVehiculeRepository $categorieVehiculeRepository): Response
    {
        return $this->render('categorie_vehicule/index.html.twig', [
            'categorie_vehicules' => $categorieVehiculeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="categorie_vehicule_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categorieVehicule = new CategorieVehicule();
        $form = $this->createForm(CategorieVehiculeType::class, $categorieVehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categorieVehicule);
            $entityManager->flush();

            return $this->redirectToRoute('categorie_vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie_vehicule/new.html.twig', [
            'categorie_vehicule' => $categorieVehicule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_vehicule_show", methods={"GET"})
     */
    public function show(CategorieVehicule $categorieVehicule): Response
    {
        return $this->render('categorie_vehicule/show.html.twig', [
            'categorie_vehicule' => $categorieVehicule,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categorie_vehicule_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategorieVehicule $categorieVehicule): Response
    {
        $form = $this->createForm(CategorieVehiculeType::class, $categorieVehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorie_vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie_vehicule/edit.html.twig', [
            'categorie_vehicule' => $categorieVehicule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorie_vehicule_delete", methods={"POST"})
     */
    public function delete(Request $request, CategorieVehicule $categorieVehicule): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieVehicule->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categorieVehicule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('categorie_vehicule_index', [], Response::HTTP_SEE_OTHER);
    }
}
