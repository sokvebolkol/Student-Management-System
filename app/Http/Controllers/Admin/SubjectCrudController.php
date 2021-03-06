<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SubjectRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SubjectCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SubjectCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Subject::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/subject');
        CRUD::setEntityNameStrings('subject', 'subjects');
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
            'label' => 'Subject',
            'type' => 'text',
            'name' => 'name',

        ]);
        $this->crud->addColumn([
            'label' => 'Type',
            'type' => 'text',
            'name' => 'type',

        ]);
        $this->crud->addColumn([
            'label' => 'Created At',
            'type' => 'text',
            'name' => 'created_at',

        ]);
        $this->crud->addColumn([
            'label' => 'Updated At',
            'type' => 'text',
            'name' => 'updated_at',

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
        CRUD::setValidation(SubjectRequest::class);

        $this->crud->addField([
            'label' => 'Subject',
            'type' => 'text',
            'name' => 'name',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Type',
            'name' => 'type',
            'type'        => 'select2_from_array',
            'options'     => ['one' => 'Mathematics', 'two' => 'Theory', 'three' => 'Pratical'],
            'allows_null' => false,
            'default'     => 'one',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
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
