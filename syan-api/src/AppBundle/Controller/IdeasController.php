<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\View;
use AppBundle\Entity\Idea;



class IdeasController extends Controller implements ClassResourceInterface
{
    /**
     * "get_ideas"     [GET] /ideas
     * Get a list of all ideas
     *
     * @return array
     */
    public function cgetAction()
    {
        $ideas = $this->getDoctrine()
            ->getRepository('AppBundle:Idea')->findAll();
        return $ideas;
    }

    /**
     * "get_idea"      [GET] /ideas/{id}
     *
     * Get idea information
     *
     * @param $id
     * @return null|object
     */
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

    /**
     * "delete_idea"          [DELETE] /ideas/{id}
     *
     * Delete an idea. Return a status code 204
     *
     * @param $id
     *
     * @View(statusCode=204)
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $idea = $em->getRepository('AppBundle:Idea')->find($id);
        if($idea) {
            $em->remove($idea);
            $em->flush();
        }
    }

    /**
     * "new_ideas"            [GET] /ideas/new
     *
     * @View(statusCode=204)
     */
    public function cpostAction(Request $request)
    {
        $idea = new Idea();
        $idea->setName($request->get('name'));
        $idea->setDescription($request->get('description'));

        $em = $this->getDoctrine()->getManager();
        $em->persist($idea);
        $em->flush();
    }

    /**
     * "put_idea"             [PUT] /ideas/{id}
     * Update an idea
     *
     * @param $id
     * @param Request $request
     * @View(statusCode=204)
     */
    public function postAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $idea = $em->getRepository('AppBundle:Idea')->find($id);
        $idea->setName($request->get('name'));
        $idea->setDescription($request->get('description'));
        $em->flush();
    }



}