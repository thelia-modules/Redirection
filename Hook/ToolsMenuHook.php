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

namespace Redirection\Hook;

use Redirection\Redirection;
use Thelia\Core\Event\Hook\HookRenderBlockEvent;
use Thelia\Core\Hook\BaseHook;
use Thelia\Tools\URL;

/**
 * Class ToolsMenuHook
 * @package Redirection\Hook
 * @author Benjamin Perche <bperche@openstudio.fr>
 */
class ToolsMenuHook extends BaseHook
{
    public function onMainTopMenuTools(HookRenderBlockEvent $event)
    {
        $event->add([
            "url" => URL::getInstance()->absoluteUrl("/admin/module/Redirection/permanent_redirection"),
            "title" => $this->trans("Manage redirections", [], Redirection::MESSAGE_DOMAIN),
        ]);
    }
}
