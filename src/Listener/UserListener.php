<?php

namespace App\Listener;

use App\Entity\User;
use Johndodev\Security\BcryptEncoder;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Pimple\Container;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Mapping as ORM;

class UserListener
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * on first insert
     * @ORM\PrePersist
     * @param User $user
     * @param LifecycleEventArgs $event
     */
    public function PrePersist(User $user, LifecycleEventArgs $event)
    {
        /** @var Request $request */
        $request = $this->container['request_stack']->getCurrentRequest();

        /** @var BcryptEncoder $passwordEncoder */
        $passwordEncoder = $this->container['security.encoder.digest'];

        // $user->setValidEmailHash(uniqid());
        $user->setCreatedAt(new \DateTime());
        $user->setCreatorIp($request->getClientIp());
        $user->setPassword($passwordEncoder->encodePassword($user->getPlainPassword(), null));
    }
}
