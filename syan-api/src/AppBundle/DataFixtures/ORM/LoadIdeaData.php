<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Idea;

class LoadIdeaData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $idea = new Idea();
        $idea->setName('idée du jour');
        $idea->setDescription('une belle idée du jour');

        $manager->persist($idea);
        $manager->flush();

        $idea = new Idea();
        $idea->setName('idée de la semaine');
        $idea->setDescription('l\'idée de la semaine');

        $manager->persist($idea);
        $manager->flush();

        $idea = new Idea();
        $idea->setName('idée du siècle');
        $idea->setDescription('the idée');

        $manager->persist($idea);
        $manager->flush();
    }
}
