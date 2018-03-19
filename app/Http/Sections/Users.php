<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 12.03.2018
 * Time: 15:46
 */

namespace App\Http\Sections;


use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Navigation\Badge;
use Illuminate\Http\UploadedFile;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Renderable;
/**
 * Class Pages
 *
 * @property \App\Brand $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */

class Users extends Section implements Initializable
{

    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;
    /**
     * @var string
     */
    protected $title = 'Users';
    /**
     * @var string
     */
    protected $slug;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-globe');
    }

    /**
     * @return DisplayInterface
     *
     *
     */
    public function onDisplay()
    {
        return AdminDisplay::table()->setColumns([
            AdminColumn::text('id', '#')->setWidth('30px'),
            //        return AdminDisplay::table()
//            ->with('roles')
//            ->setHtmlAttribute('class', 'table-primary')
//            ->setColumns([
                AdminColumn::link('name', 'Username'),
                AdminColumn::email('email', 'Email')->setWidth('150px'),
                AdminColumn::image('avatar')->setWidth('150px'),
                AdminColumn::datetime('date')->setLabel('Date')->setFormat('d.m.Y')->setWidth('150px'),


            AdminColumn::datetime('created_at')->setLabel('Created'),
            AdminColumn::datetime('updated_at')->setLabel('Updated'),
        ])->paginate(20);


    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */

    public function onEdit($id)
    {
        return AdminForm::form()->setElements([
            AdminFormElement::text('name', 'Username')->required(),
            AdminFormElement::password('password', 'Password')->required()->addValidationRule('min:6'),
            AdminFormElement::text('email', 'E-mail')->required()->addValidationRule('email'),
            //AdminFormElement::multiselect('roles', 'Roles', Role::class)->setDisplay('name'),
            AdminFormElement::upload('avatar', 'Avatar'),//->addValidationRule('image'),
            AdminFormElement::image('avatar'),
        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    public function onDelete($id)
    {
        // todo: remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }


}
//$table->increments('id');
//$table->string('name');
//$table->string('email')->unique();
//$table->string('password');
//$table->string('avatar')->default(0);
//$table->integer('is_admin')->default(0);
//$table->integer('status')->default(0);
//$table->rememberToken();
//$table->timestamps();
////namespace Admin\Http\Sections;
////
////use AdminColumn;
////use AdminDisplay;
////use AdminForm;
////use AdminFormElement;
//////use App\Role;
////use SleepingOwl\Admin\Contracts\Initializable;
////use SleepingOwl\Admin\Navigation\Badge;
////use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
////use SleepingOwl\Admin\Contracts\Form\FormInterface;
////use SleepingOwl\Admin\Section;
/////**
//// * Class Users
//// *
//// * @property \App\User $model
//// *
//// * @see http://sleepingowladmin.ru/docs/model_configuration_section
//// */
////class Users extends Section implements Initializable
////{
////    /**
//
//namespace App\Http\Sections;
//
//use AdminColumn;
//use AdminDisplay;
//use AdminForm;
//use AdminFormElement;
//use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
//use SleepingOwl\Admin\Contracts\Form\FormInterface;
//use Illuminate\Contracts\Support\Arrayable;
//use Illuminate\Contracts\Support\Renderable;
//use SleepingOwl\Admin\Contracts\Initializable;
//use SleepingOwl\Admin\Navigation\Badge;
//use SleepingOwl\Admin\Section;
//use Illuminate\Http\UploadedFile;
///**
// * Class Pages
// *
// * @property \App\User $model
// *
// * @see http://sleepingowladmin.ru/docs/model_configuration_section
// */
//
//class Users extends Section implements Initializable
//{
//
//    /**
//     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
//     *
//     * @var bool
//     */
//    protected $checkAccess = false;
//    /**
//     * @var string
//     */
//    protected $title = 'Users';
//    /**
//     * @var string
//     */
//    protected $slug;
//    /**
//     * Initialize class.
//     */
//    public function initialize()
//    {
//        $this->addToNavigation()->setIcon('fa fa-sitemap');
//    }
//    /**
//     * @return DisplayInterface
//     */
//    public function onDisplay()
//    {
//        return AdminDisplay::table()
//            ->with('roles')
//            ->setHtmlAttribute('class', 'table-primary')
//            ->setColumns([
//                AdminColumn::link('name', 'Username'),
//                AdminColumn::email('email', 'Email')->setWidth('150px'),
//                AdminColumn::image('avatar')->setWidth('150px'),
//                AdminColumn::datetime('date')->setLabel('Date')->setFormat('d.m.Y')->setWidth('150px')
//
//            ])->paginate(20);
//    }
//    /**
//     * @param int $id
//     *
//     * @return FormInterface
//     */
//    public function onEdit($id)
//    {
//        return AdminForm::panel()->addBody([
//            AdminFormElement::text('name', 'Username')->required(),
//            AdminFormElement::password('password', 'Password')->required()->addValidationRule('min:6'),
//            AdminFormElement::text('email', 'E-mail')->required()->addValidationRule('email'),
//            //AdminFormElement::multiselect('roles', 'Roles', Role::class)->setDisplay('name'),
//            AdminFormElement::upload('avatar', 'Avatar'),//->addValidationRule('image'),
//            AdminFormElement::image('avatar'),
//        ]);
//    }
//    /**
//     * @return FormInterface
//     */
//    public function onCreate()
//    {
//        return $this->onEdit(null);
//    }
//
//    public function onDelete($id)
//    {
//        // to do: remove if unused
//    }
//    /**
//     * @return void
//     */
//    public function onRestore($id)
//    {
//        // to do: remove if unused
//    }
//
//}