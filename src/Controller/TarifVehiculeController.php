<?php

namespace App\Controller;

use App\Entity\TarifVehicule;
use App\Form\TarifVehiculeType;
use App\Repository\TarifVehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tarif/vehicule")
 */
class TarifVehiculeController extends AbstractController
{
    /**
     * @Route("/", name="tarif_vehicule_index", methods={"GET"})
     */
    public function index(TarifVehiculeRepository $tarifVehiculeRepository): Response
    {
        return $this->render('tarif_vehicule/index.html.twig', [
            'tarif_vehicules' => $tarifVehiculeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tarif_vehicule_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tarifVehicule = new TarifVehicule();
        $form = $this->createForm(TarifVehiculeType::class, $tarifVehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tarifVehicule);
            $entityManager->flush();

            return $this->redirectToRoute('tarif_vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tarif_vehicule/new.html.twig', [
            'tarif_vehicule' => $tarifVehicule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tarif_vehicule_show", methods={"GET"})
     */
    public function show(TarifVehicule $tarifVehicule): Response
    {
        return $this->render('tarif_vehicule/show.html.twig', [
            'tarif_vehicule' => $tarifVehicule,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tarif_vehicule_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TarifVehicule $tarifVehicule): Response
    {
        $form = $this->createForm(TarifVehiculeType::class, $tarifVehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tarif_vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tarif_vehicule/edit.html.twig', [
            'tarif_vehicule' => $tarifVehicule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tarif_vehicule_delete", methods={"POST"})
     */
    public function delete(Request $request, TarifVehicule $tarifVehicule): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tarifVehicule->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tarifVehicule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tarif_vehicule_index', [], Response::HTTP_SEE_OTHER);
    }
}
