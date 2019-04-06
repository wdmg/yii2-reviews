<?php

namespace wdmg\reviews;

/**
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @copyright       Copyright (c) 2019 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 */

use yii\base\BootstrapInterface;
use Yii;


class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        // Get the module instance
        $module = Yii::$app->getModule('reviews');

        // Get URL path prefix if exist
        $prefix = (isset($module->routePrefix) ? $module->routePrefix . '/' : '');

        // Add module URL rules
        $app->getUrlManager()->addRules(
            [
                $prefix . '<module:reviews>/' => '<module>/reviews/index',
                $prefix . '<module:reviews>/<controller>/' => '<module>/<controller>',
                $prefix . '<module:reviews>/<controller>/<action>' => '<module>/<controller>/<action>',
                $prefix . '<module:reviews>/<controller>/<action>' => '<module>/<controller>/<action>',
            ],
            true
        );
    }
}