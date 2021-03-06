<?php
/**
* This class has been generated by TheliaStudio
* For more information, see https://github.com/thelia-modules/TheliaStudio
*/

namespace Redirection\Event\Base;

use Thelia\Core\Event\ActionEvent;
use Redirection\Model\PermanentRedirection;

/**
* Class PermanentRedirectionEvent
* @package Redirection\Event\Base
* @author TheliaStudio
*/
class PermanentRedirectionEvent extends ActionEvent
{
    protected $id;
    protected $visible;
    protected $position;
    protected $path;
    protected $destination;
    protected $title;
    protected $chapo;
    protected $permanentRedirection;
    protected $locale;

    public function getLocale()
    {
        return $this->locale;
    }

    public function setLocale($v)
    {
        $this->locale = $v;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getVisible()
    {
        return $this->visible;
    }

    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    public function getDestination()
    {
        return $this->destination;
    }

    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getChapo()
    {
        return $this->chapo;
    }

    public function setChapo($chapo)
    {
        $this->chapo = $chapo;

        return $this;
    }

    public function getPermanentRedirection()
    {
        return $this->permanentRedirection;
    }

    public function setPermanentRedirection(PermanentRedirection $permanentRedirection)
    {
        $this->permanentRedirection = $permanentRedirection;

        return $this;
    }
}
