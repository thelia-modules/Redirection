<?php
/**
* This class has been generated by TheliaStudio
* For more information, see https://github.com/thelia-modules/TheliaStudio
*/

namespace Redirection\Form\Type\Base;

use Thelia\Core\Form\Type\Field\AbstractIdType;
use Redirection\Model\PermanentRedirectionQuery;

/**
 * Class PermanentRedirection
 * @package Redirection\Form\Base
 * @author TheliaStudio
 */
class PermanentRedirectionIdType extends AbstractIdType
{
    const TYPE_NAME = "permanent_redirection_id";

    protected function getQuery()
    {
        return new PermanentRedirectionQuery();
    }

    public function getName()
    {
        return static::TYPE_NAME;
    }
}