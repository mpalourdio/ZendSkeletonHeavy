<?php

namespace Application\Listener;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\Mvc\I18n\Translator;
use Zend\Mvc\MvcEvent;
use Zend\Validator\AbstractValidator;

class IntlListener implements ListenerAggregateInterface
{
    protected $translator;

    /**
     * @var array
     */
    protected $listeners = [];

    /**
     * @param Translator $translator
     */
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    /**
     * {@inheritDoc}
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_ROUTE,
            [$this, 'onRoute'],
            100
        );
    }

    /**
     * @param EventManagerInterface $events
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    /**
     * @param MvcEvent $event
     */
    public function onRoute(MvcEvent $event)
    {
        AbstractValidator::setDefaultTranslator($this->translator, 'myApp');
    }
}
