<?php

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Routing\ClassResourceInterface;
use AppBundle\Entity\Idea;

class IdeasController extends Controller implements ClassResourceInterface
{
    public function cgetAction()
    {
        $ideas = $this->getDoctrine()
            ->getRepository('AppBundle:Idea')->findAll();
        return $ideas;
    } // "get_users"     [GET] /users


    public function getAction($id)
    {
        $idea = null;
        $idea = $this->getDoctrine()
            ->getRepository('AppBundle:Idea')
            ->find($id);
        if (!is_object($idea)) {
            throw $this->createNotFoundException();
        }

        return $idea;
    }
}