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
        if (isset($module->routePrefix)) {
            $app->getUrlManager()->enableStrictParsing = true;
            $prefix = $module->routePrefix . '/';
        } else {
            $prefix = '';
        }

        // Add module URL rules
        $app->getUrlManager()->addRules(
            [
                $prefix . '<module:reviews>/' => '<module>/reviews/index',
                $prefix . '<module:reviews>/<controller:\w+>/' => '<module>/<controller>',
                $prefix . '<module:reviews>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                [
                    'pattern' => $prefix . '<module:reviews>/',
                    'route' => '<module>/reviews/index',
                    'suffix' => '',
                ], [
                'pattern' => $prefix . '<module:reviews>/<controller:\w+>/',
                'route' => '<module>/<controller>',
                'suffix' => '',
            ], [
                'pattern' => $prefix . '<module:reviews>/<controller:\w+>/<action:\w+>',
                'route' => '<module>/<controller>/<action>',
                'suffix' => '',
            ],
            ],
            true
        );
    }
}