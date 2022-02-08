<?php

namespace App\Controller;

use App\Entity\TarifService;
use App\Form\TarifServiceType;
use App\Repository\TarifServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tarif/service")
 */
class TarifServiceController extends AbstractController
{
    /**
     * @Route("/", name="tarif_service_index", methods={"GET"})
     */
    public function index(TarifServiceRepository $tarifServiceRepository): Response
    {
        return $this->render('tarif_service/index.html.twig', [
            'tarif_services' => $tarifServiceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tarif_service_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tarifService = new TarifService();
        $form = $this->createForm(TarifServiceType::class, $tarifService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tarifService);
            $entityManager->flush();

            return $this->redirectToRoute('tarif_service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tarif_service/new.html.twig', [
            'tarif_service' => $tarifService,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tarif_service_show", methods={"GET"})
     */
    public function show(TarifService $tarifService): Response
    {
        return $this->render('tarif_service/show.html.twig', [
            'tarif_service' => $tarifService,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tarif_service_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TarifService $tarifService): Response
    {
        $form = $this->createForm(TarifServiceType::class, $tarifService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tarif_service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tarif_service/edit.html.twig', [
            'tarif_service' => $tarifService,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tarif_service_delete", methods={"POST"})
     */
    public function delete(Request $request, TarifService $tarifService): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tarifService->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tarifService);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tarif_service_index', [], Response::HTTP_SEE_OTHER);
    }
}
