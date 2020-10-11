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
            'name' => 'father_fname',
            'label' => 'Father FirstName',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'father_lname',
            'label' => 'Father LastName',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'mother_fname',
            'label' => 'Mother FirstName',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'mother_lname',
            'label' => 'Mother LastName',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'occupation',
            'label' => 'Occupation',
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
            'label' => 'Student Name',
            'name' => 'students_id',
            'type' => 'select',
            'entity' => 'students',
            'attributes' => ['required' => 'required'],
            'attribute' => 'firstname',
            'model' => "App\Models\Student",
            'options'   => (function ($query) {
                return $query->orderBy('firstname', 'ASC')->get();
            }),
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4'
            ],
        ]);
        $this->crud->addField([
            'label' => 'Father Firstname',
            'type' => 'text',
            'name' => 'father_fname',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Father Lastname',
            'type' => 'text',
            'name' => 'father_lname',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Mother Firstname',
            'type' => 'text',
            'name' => 'mother_fname',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Mother Lastname',
            'type' => 'text',
            'name' => 'mother_lname',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Occupation',
            'name' => 'occupation',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Address',
            'name' => 'address',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-8'
            ],
        ]);
        $this->crud->addField([
            'label' => 'Nationality',
            'name' => 'nationality',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Phone Number',
            'name' => 'phoneNumber',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4'
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

    protected function setupShowOperation()
    {

        $this->crud->addColumn([
            'label' => 'Father Firstname',
            'type' => 'text',
            'name' => 'father_fname',
        ]);
        $this->crud->addColumn([
            'name' => 'father_lname',
            'label' => 'Father LastName',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'mother_fname',
            'label' => 'Mother FirstName',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'mother_lname',
            'label' => 'Mother LastName',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'occupation',
            'label' => 'Occupation',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'nationality',
            'label' => 'Nationality',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'phoneNumber',
            'label' => 'Phonenumber',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'avatar',
            'label' => 'Photo',
            'type' => 'image',
            'height' => '100px'
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
