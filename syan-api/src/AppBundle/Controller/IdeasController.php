<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
}