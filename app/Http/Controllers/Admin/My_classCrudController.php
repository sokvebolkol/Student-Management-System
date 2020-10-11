<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\My_classRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class My_classCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class My_classCrudController extends CrudController
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
        CRUD::setModel(\App\Models\My_class::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/my_class');
        CRUD::setEntityNameStrings('class', 'classes');
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
        CRUD::setValidation(My_classRequest::class);

        $this->crud->addField([
            'label' => 'Teacher',
            'name' => 'teachers_id',
            'type' => 'select',
            'entity' => 'teachers',
            'attributes' => ['required' => 'required'],
            'attribute' => 'firstname',
            'model' => "App\Models\Teacher",
            'options'   => (function ($query) {
                return $query->orderBy('id', 'ASC')->get();
            }),
            'wrapperAttributes' => [
                'class' => 'form-group col-md-4'
            ],
        ]);
        $this->crud->addField([
            'label' => 'Class Name',
            'type' => 'text',
            'name' => 'name',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-8'
            ],

        ]);

        $this->crud->addField([
            'label' => 'Section',
            'type' => 'text',
            'name' => 'section',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],

        ]);

        $this->crud->addField([
            'label' => 'Time Close',
            'name' => 'time_close',
            'type' => 'datetime_picker',
            'datetime_picker_options' => [
                'format' => 'DD/MM/YYYY HH:mm',
            ],
            'allows_null' => true,
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
