<?php namespace Modules\Users\Http\Controllers;

use JavaScript;
use Pingpong\Modules\Routing\Controller;
use JJSoft\SigesCore\UI\Field\FormBuilder;
use JJSoft\SigesCore\FieldGenerator\FieldModel;
use JJSoft\SigesCore\EntityGenerator\EntityModel;

/**
 * Class ConfigController
 * @package Modules\Users\Http\Controllers
 */
class ConfigController extends Controller {

    /**
     * Add middleware
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * List the users settings
     * @return \Illuminate\View\View
     */
    public function index()
	{
        $entity = EntityModel::where('slug', 'users')->firstOrFail();
        JavaScript::put([
            'entity_id' => $entity->id
        ]);
		return view('users::config.index');
	}

    /**
     * Create a field for the user
     * @return $this
     */
    public function createField()
    {
        $entity = EntityModel::where('slug', 'users')->firstOrFail();
        $builder = new FormBuilder($entity);
        $builder->setReturnUrl(route('users.config'));
        JavaScript::put([
            'entity_id' => $entity->id
        ]);
        return view('users::config.create')
            ->with('form', $builder->render());
    }

    /**
     * Edit a field for the user
     * @param $id
     * @return $this
     */
    public function editField($id)
    {
        $field = FieldModel::findOrFail($id);
        $entity = $field->entity;
        $builder = new FormBuilder($entity);
        $builder->setReturnUrl(route('users.config'));
        $builder->setModel($field);
        JavaScript::put([
            'entity_id' => $entity->id,
            'field_id' => $field->id
        ]);
        return view('users::config.edit')
            ->with('form', $builder->render());
    }

    public function config()
    {
        return view('users::config');
    }
}