<?php

namespace CesiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

use CesiBundle\Entity\Training;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TrainingRenderController extends Controller
{
    public function indexAction($page) {
        return $this -> get('templating')
            -> renderResponse('CesiBundle:Training:home.html.twig', array('page' => $page));
    }

    public function addTrainingAction(Request $request) {

        $training = new Training();

        $form = $this -> get('form.factory')
            -> createBuilder(FormType::class, $training)
            -> add('name', TextType::class)          
            -> add('teacher', TextType::class)
            -> add('startingDate', DateType::class)
            -> add('endingDate', DateType::class)
            -> add('save', SubmitType::class)
            -> getForm();

        if ($request -> isMethod('POST')) {
            $form -> handleRequest($request);

            if ($form -> isValid()) {
                $em = $this -> getDoctrine() -> getManager();
                $em -> persist($training);
                $em -> flush();

                $request -> getSession() 
                    -> getFlashBag() 
                    -> add('success',"Le formation à bien été ajoutée");
                return $this -> redirectToRoute('cesi_home_training_render', array('page'=> 0));
            }
        }

        return $this -> render('CesiBundle:Training:add-training.html.twig', array(
            'form' => $form -> createView(),
        ));       
    }

    public function editTrainingAction($id, Request $request) {

        $training = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('CesiBundle:Training')
            ->find($id);

        $form = $this -> get('form.factory')
            -> createBuilder(FormType::class, $training)
            -> add('name', TextType::class)          
            -> add('teacher', TextType::class)
            -> add('startingDate', DateType::class)
            -> add('endingDate', DateType::class)
            -> add('save', SubmitType::class)
            -> add('delete', SubmitType::class)
            -> getForm();

        if ($request -> isMethod('POST')) {
            $form -> handleRequest($request);

            if ($form -> isValid()) {
                $em = $this -> getDoctrine() -> getManager();
                $em -> persist($training);
                $em -> flush();

                $request -> getSession() 
                    -> getFlashBag() 
                    -> add('success',"Le formation à bien été modifié");
                return $this -> redirectToRoute('cesi_home_training_render', array('page'=> 0));
            }
        }

        return $this -> get('templating')
            -> renderResponse('CesiBundle:Training:edit-training.html.twig', array(
            'form' => $form -> createView(),
        ));        
    }

}
