<?php
/*************************************************************************************/
/* This file is part of the Thelia package.                                          */
/*                                                                                   */
/* Copyright (c) OpenStudio                                                          */
/* email : dev@thelia.net                                                            */
/* web : http://www.thelia.net                                                       */
/*                                                                                   */
/* For the full copyright and license information, please view the LICENSE.txt       */
/* file that was distributed with this source code.                                  */
/*************************************************************************************/

namespace Redirection\EventListener;

use Redirection\Model\Map\PermanentRedirectionTableMap;
use Redirection\Model\PermanentRedirectionQuery;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Thelia\Core\HttpFoundation\Request;

/**
 * Class RequestListener
 * @package Redirection\EventListener
 * @author Benjamin Perche <bperche@thelia.net>
 */
class RequestListener implements EventSubscriberInterface
{
    public function redirect(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $pathInfo = $request->getPathInfo();

        $redirections = PermanentRedirectionQuery::create()
            ->filterByVisible(true)
            ->select([PermanentRedirectionTableMap::PATH, PermanentRedirectionTableMap::DESTINATION])
            ->find()
            ->toArray()
        ;

        foreach ($redirections as $redirection) {
            $path = $redirection[PermanentRedirectionTableMap::PATH];

            if (preg_match("#^" . $path . "$#", $pathInfo)) {
                $destinationPath = preg_replace(
                    "#^" . $path . "$#",
                    $redirection[PermanentRedirectionTableMap::DESTINATION],
                    $pathInfo
                );

                $event->setResponse(new RedirectResponse(
                    $this->generateUrl($request, $destinationPath)
                ), 301);
            }
        }
    }

    protected function generateUrl(Request $request, $path)
    {
        $scheme = $request->server->get("REQUEST_SCHEME");
        $name = $request->server->get("SERVER_NAME");
        $pathInfo = $request->getPathInfo();
        $requestURI = $request->getRequestUri();
        $port = $request->getPort();

        $url = $scheme . "://" . $name;

        if ($port !== 80) {
            $url .= ":" . $port;
        }

        $url .= str_replace($pathInfo, $path, $requestURI);

        return $url;
    }

    public function filterPath(&$entry)
    {
        $entry = preg_replace("/([^\\\\]*)#/", "\\#", $entry);
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     *
     * @api
     */
    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::REQUEST => array("redirect", 192),
        );
    }

}
