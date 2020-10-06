<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GuardianRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GuardianCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GuardianCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Guardian::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/guardian');
        CRUD::setEntityNameStrings('parent', 'parents');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
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
            'name' => 'religion',
            'label' => 'Religion',
            'type' => 'text'
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(GuardianRequest::class);
        $this->crud->addField([
            'label' => 'Father Firstname',
            'type' => 'text',
            'name' => 'father_fname',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Father Lastname',
            'type' => 'text',
            'name' => 'father_lname',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Mother Firstname',
            'type' => 'text',
            'name' => 'mother_fname',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Mother Lastname',
            'type' => 'text',
            'name' => 'mother_lname',
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
            'label' => 'Occupation',
            'name' => 'occupation',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Address',
            'name' => 'address',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'label' => 'Nationality',
            'name' => 'nationality',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Phone Number',
            'name' => 'phoneNumber',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Avatar',
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
