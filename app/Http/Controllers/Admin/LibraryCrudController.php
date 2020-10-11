<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LibraryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LibraryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LibraryCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Library::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/library');
        CRUD::setEntityNameStrings('library', 'libraries');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb();
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(LibraryRequest::class);

        $this->crud->addField([
            'label' => 'Book Name',
            'type' => 'text',
            'name' => 'book_name',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Writer Name',
            'type' => 'text',
            'name' => 'writer_name',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],

        ]);
        $this->crud->addField([
            'label' => 'Subject Name',
            'name' => 'subjects_id',
            'type' => 'select',
            'entity' => 'subjects',
            'attributes' => ['required' => 'required'],
            'attribute' => 'name',
            'model' => "App\Models\Subject",
            'options'   => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }),
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'label' => 'Publish Year',
            'type' => 'datetime_picker',
            'name' => 'publish_year',
            'datetime_picker_options' => [
                'format' => 'DD/MM/YYYY HH:mm',
            ],
            'allows_null' => true,
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],

        ]);
    }
    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumn([
            'label' => 'Book Name',
            'type' => 'text',
            'name' => 'book_name',
        ]);
        $this->crud->addColumn([
            'label' => 'Writer Name',
            'type' => 'text',
            'name' => 'writer_name',
        ]);

        $this->crud->addColumn([
            'label' => 'Publish Year',
            'type' => 'datetime_picker',
            'name' => 'publish_year',
        ]);
        $this->crud->addColumn([
            'label' => 'Created At',
            'type' => 'datetime_picker',
            'name' => 'updated_at',
        ]);
        $this->crud->addColumn([
            'label' => 'Updated At',
            'type' => 'datetime_picker',
            'name' => 'created_at',
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
