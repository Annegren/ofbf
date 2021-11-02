<?php

namespace App\EventSubscriber;

use App\Entity\Article;
use DateTimeImmutable;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;


class EasyAdminSubscriber implements EventSubscriberInterface
{

    private $slugger;
    private $security;

    public function __construct(SluggerInterface $slugger, Security $security)
    {
        $this->slugger = $slugger;
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => [['setArticleSlugAndDateAndUser']],
           /* BeforeEntityPersistedEvent::class => ['setCorpsDeMetierSlug']
            * ['eventName' => [['methodName1', $priority], ['methodName2']]]*/
        ];
    }

   

    public function setArticleSlugAndDateAndUser(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Article) ) {
            return;
        }

        $slug = $this->slugger->slug($entity->getTitle());
        $entity->setSlug($slug);

        $now = new DateTimeImmutable('now');
        $entity->setCreatedAt($now);

       

    }
}