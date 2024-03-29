<?php

namespace LodhaStarter;

use Illuminate\Database\Eloquent\Model;

class ApiaiResponse extends Model
{
	protected $fillable = ['facebook_request_id', 'action_incomplete', 'action', 'parameters', 'fulfillment', 'intent_name'];
    protected $table = 'apiai_responses';

    public static $custom_action_namespace = 'gpit';

    public function hasIntentName() {
        return !empty($this->intent_name);
    }

    public function hasAction() {
        return !empty($this->action);
    }

    public function hasCustomActionNamespace() {
        $namespace = explode('.', $this->action)[0];
        return $namespace == self::$custom_action_namespace;
    }

    public function hasFulfillment() {
        $fulfillment = json_decode($this->fulfillment, true);
        return !empty($fulfillment) && !in_array(null, $fulfillment);
    }
}
