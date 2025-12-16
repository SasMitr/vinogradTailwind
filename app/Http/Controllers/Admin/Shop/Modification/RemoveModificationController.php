<?php

namespace App\Http\Controllers\Admin\Shop\Modification;

use App\Http\Controllers\Controller;
use App\Models\Shop\Modification;
use Exception;

class RemoveModificationController extends Controller
{
    public function __invoke(Modification $modification)
    {
        //  неплохо добавить проверку на существование записи с удаляемым id
        try {
            $modification->delete();
            return ['success' => 'ok'];
        } catch (Exception $e) {
            return ['errors' => $e->getMessage()];
        }
    }
}
