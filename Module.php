<?php

namespace wdmg\reviews;

/**
 * Yii2 Reviews system
 *
 * @category        Module
 * @version         0.0.6
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-reviews
 * @copyright       Copyright (c) 2019 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use Yii;
use wdmg\base\BaseModule;

/**
 * reviews module definition class
 */
class Module extends BaseModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'wdmg\reviews\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = "reviews/index";

    /**
     * @var string, the name of module
     */
    public $name = "Reviews";

    /**
     * @var string, the description of module
     */
    public $description = "Users reviews system";

    /**
     * @var string the module version
     */
    private $version = "0.0.6";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 8;


    public function bootstrap($app)
    {
        parent::bootstrap($app);
    }
}