<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to '/layouts/column1',
     * meaning using a single column layout. See 'protected/modules/admin/views/layouts/column1.php'.
     */
    public $layout = '/layouts/column2';

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public $_model;

    public function Flashes($error=false)
    {
        $flashMessages = Yii::app()->user->getFlashes();
        if($error)
            $flashMessages['error'] = $error;
        if ($flashMessages) {
            foreach($flashMessages as $key => $value)
            {
                printf($this->tpl, $key, $this->success, $value);
            }
        }
    }

}