<?php
/**
* This class has been generated by TheliaStudio
* For more information, see https://github.com/thelia-modules/TheliaStudio
*/

namespace Redirection\Form;

use Redirection\Form\Base\PermanentRedirectionCreateForm as BasePermanentRedirectionCreateForm;

/**
 * Class PermanentRedirectionCreateForm
 * @package Redirection\Form
 */
class PermanentRedirectionCreateForm extends BasePermanentRedirectionCreateForm
{
    public function getTranslationKeys()
    {
        return array(
            "visible" => "This redirection is active",
            "path" => "Path",
            "destination" => "Destination",
            "title" => "Title",
            "chapo" => "Chapo",
        );
    }
}
