<?php

namespace App\Controller;

use App\Entity\SourceCode;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sourceCode = new SourceCode();
        $sourceCode->setText('Write your code here');

        $form = $this->createFormBuilder($sourceCode)
            ->add('text', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'cols' => 120,
                    'rows' => 10
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Share!',
                'attr' => [
                    'class' => 'btn btn-lg btn-success'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var SourceCode $sourceCode */
            $sourceCode = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sourceCode);
            $entityManager->flush();

            return $this->redirectToRoute(
                'view',
                ['id' => $sourceCode->getId()]
            );
        }

        return $this->render(
            'default/index.html.twig',
            ['form' => $form->createView()]
        );
    }

    /**
     * @Route("/{id}", name="view")
     * @param $id
     * @return Response
     */
    public function view($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        /** @var SourceCode|null $sourceCode */
        $sourceCode = $entityManager->getRepository(SourceCode::class)->find($id);
        if ($sourceCode === null) {
            throw $this->createNotFoundException();
        }

        return $this->render('default/view.html.twig', [
            'id' => $sourceCode->getId(),
            'text' => $sourceCode->getText(),
        ]);
    }
}
