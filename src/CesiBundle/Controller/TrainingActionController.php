<?php

namespace CesiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

use CesiBundle\Entity\Training;

class TrainingActionController extends Controller
{

    public function updateAction($id, Request $request) {

        if ($request -> isMethod('PUT')) {

            $request -> getSession()
                -> getFlashBag() 
                -> add('success',"Le formation à bien été modifiée");

            return $this -> redirectToRoute('cesi_home_training_render', array('page'=> 1));
        }

        return $this -> catchError($request);
    }

    public function deleteAction($id, Request $request) {

        if ($request -> isMethod('DELETE') and $id != null) {
            $request -> getSession()
                -> getFlashBag()
                -> add('success',"Le formation à bien été modifiée");
            return $this -> redirectToRoute('cesi_home_training_render', array('page'=> 1));
        }

        return $this -> catchError($request);
    }

    private function catchError() {
        $request -> getSession()
            -> getFlashBag()
            -> add('danger', "Oups, une érreure s'est produite");
        return $this->redirectToRoute('cesi_home_training_render', array('page'=> 1));
    }
}
