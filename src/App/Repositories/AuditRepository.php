<?php namespace Puresolcom\Etherbase\App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;
use Puresolcom\Etherbase\App\Models\Audit;

class AuditRepository extends Repository {

    public function model()
    {
        return 'Puresolcom\Etherbase\App\Models\Audit';
    }

    /**
     *
     **/
    public static function log($user_id, $category, $message, Array $attributes = null, $data_parser = null, $replay_route = null){

        $audit_enabled  = config('etherbase.audit.enabled');
        $audit          = false;
        $attJson        = null;

        if ($audit_enabled) {
            // Remove from array attributes that we do not want to save.
            unset($attributes['_method']);
            unset($attributes['_token']);
            unset($attributes['password']);
            unset($attributes['password_confirmation']);

            if ($attributes) {
                $attJson = json_encode($attributes);
            }

            $audit = Audit::create([
                "user_id"           => $user_id,
                "category"          => $category,
                "message"           => $message,
                "data"              => $attJson,
                "data_parser"       => $data_parser,
                "replay_route"      => $replay_route,
            ]);
        }

        return $audit;
    }


}
