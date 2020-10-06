<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TeacherRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TeacherCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TeacherCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Teacher::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/teacher');
        CRUD::setEntityNameStrings('teacher', 'teachers');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(TeacherRequest::class);

        $this->crud->addField([
            'label' => 'First Name',
            'type' => 'text',
            'name' => 'firstname',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Last Name',
            'type' => 'text',
            'name' => 'lastname',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Gender',
            'name' => 'gender',
            'type'        => 'select_from_array',
            'options'     => ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Phone Number',
            'type' => 'text',
            'name' => 'phonenumber',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Address',
            'type' => 'text',
            'name' => 'address',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Birthday',
            'type' => 'datetime_picker',
            'name' => 'birthday',
            'datetime_picker_options' => [
                'format' => 'DD/MM/YYYY HH:mm',
            ],
            'allows_null' => true,
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Religion',
            'type' => 'text',
            'name' => 'religion',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Email Address',
            'type' => 'email',
            'name' => 'email',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Student Photo ',
            'name' => 'avatar',
            'type' => 'image',
            'upload' => true,
            'crop' => true,
            'aspect_ratio' => 1,
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4'
            ],
        ]);
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumn([
            'name' => 'firstname',
            'label' => 'First Name',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'lastname',
            'label' => 'Last Name',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'birthday',
            'label' => 'Birthday',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'phonenumber',
            'label' => 'Phone Number',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'religion',
            'label' => 'Religion',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'avatar',
            'label' => 'Teacher Avatar',
            'type' => 'image',
        ]);
        $this->crud->addColumn([
            'name' => 'created_at',
            'label' => 'Created At',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'updated_at',
            'label' => 'Updated At',
            'type' => 'text',
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
