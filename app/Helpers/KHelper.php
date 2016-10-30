<?php

namespace App\Helpers;

class KHelper {

    public static function json_helper($status, $data = null, $error = null) {
            return response()->json(
                        [
                            'status' => $status,
                            'data' => $data,
                            'error' => $error
                        ]
                   );
    }
}