<?php

namespace App\Services;

class BladeModelService
{

    public function id($model, $id, $attribute = null)
    {
        if (!is_null($id)) {
            $model = call_user_func("App\Models\\" . $model . "::find", [$id])->first();
            if ($model) {
                return is_null($attribute) ? $model : $model->$attribute;
            }
        }
    }

}
