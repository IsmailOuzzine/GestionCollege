<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/etudiant")
 */
class EtudiantController extends AbstractController
{
    /**
     * @Route("/", name="etudiant_index", methods={"GET"})
     */
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $etudiants = $this->getDoctrine()
            ->getRepository(Etudiant::class)
            ->findAll();

        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }

    /**
     * @Route("/new", name="etudiant_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($etudiant);
            $entityManager->flush();

            return $this->redirectToRoute('etudiant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etudiant/new.html.twig', [
            'etudiant' => $etudiant,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{cne}", name="etudiant_show", methods={"GET"})
     */
    public function show(Etudiant $etudiant): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('etudiant/show.html.twig', [
            'etudiant' => $etudiant,
        ]);
    }

    /**
     * @Route("/{cne}/edit", name="etudiant_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Etudiant $etudiant): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(EtudiantType::class, $etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etudiant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etudiant/edit.html.twig', [
            'etudiant' => $etudiant,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{cne}", name="etudiant_delete", methods={"POST"})
     */
    public function delete(Request $request, Etudiant $etudiant): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if ($this->isCsrfTokenValid('delete'.$etudiant->getCne(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($etudiant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('etudiant_index', [], Response::HTTP_SEE_OTHER);
    }
}
