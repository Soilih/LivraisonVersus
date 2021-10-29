<?php

namespace App\Controller\admin;

use App\Entity\TypeTarif;
use App\Form\TypeTarifType;
use App\Repository\TypeTarifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/type/tarif")
 */
class TypeTarifController extends AbstractController
{
    /**
     * @Route("/", name="type_tarif_index", methods={"GET"})
     */
    public function index(TypeTarifRepository $typeTarifRepository): Response
    {
        return $this->render('type_tarif/index.html.twig', [
            'type_tarifs' => $typeTarifRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_tarif_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeTarif = new TypeTarif();
        $form = $this->createForm(TypeTarifType::class, $typeTarif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeTarif);
            $entityManager->flush();

            return $this->redirectToRoute('type_tarif_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_tarif/new.html.twig', [
            'type_tarif' => $typeTarif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_tarif_show", methods={"GET"})
     */
    public function show(TypeTarif $typeTarif): Response
    {
        return $this->render('type_tarif/show.html.twig', [
            'type_tarif' => $typeTarif,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_tarif_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeTarif $typeTarif): Response
    {
        $form = $this->createForm(TypeTarifType::class, $typeTarif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_tarif_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_tarif/edit.html.twig', [
            'type_tarif' => $typeTarif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_tarif_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeTarif $typeTarif): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeTarif->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeTarif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_tarif_index', [], Response::HTTP_SEE_OTHER);
    }
}
