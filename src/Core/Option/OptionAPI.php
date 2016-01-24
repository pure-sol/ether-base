<?php

namespace Etherbase\Core\Option;

use Etherbase\App\Repositories\OptionRepository;
use Illuminate\Database\Eloquent\Collection;

class OptionAPI {

    protected $option;
    protected $autoload = [];

    public function __construct(OptionRepository $option) {
        $this->option = $option;
        $this->autoloadOptions();
    }

    public function autoloadOptions() {
        $options = $this->option->findWhere(['autoload' => 'yes'], ['option_name', 'option_value']);
        
        if ($options instanceof Collection) {
            foreach ($options as $option) {
                $this->autoload[$option->option_name] = $option->option_value;
            }
        }
    }

    public function getOption($name) {
        if (isset($this->autoload[$name])) {
            $value = $this->autoload[$name];
        } else {
            $query = $this->option->findBy('option_name', $name);

            if ($query) {
                $value = $query->option_value;
            } else {
                return FALSE;
            }
        }

        if ($this->isJSON($value)) {
            return json_decode($value);
        }
        return $value;
    }

    public function setOption($name, $value, $autoload = 'yes') {
        if (is_array($value))
            $value = json_encode($value);

        if ($this->option->create(['option_name' => $name, 'option_value' => $value, 'autoload' => $autoload]))
            return TRUE;
        return FALSE;
    }

    public function updateOption($name, $value, $autoload = 'yes') {
        if (is_array($value))
            $value = json_encode($value);
        if ($this->option->updateOrCreate(['option_name' => $name], ['option_name' => $name, 'option_value' => $value, 'autoload' => $autoload]))
            return TRUE;
        return FALSE;
    }

    public function isJSON($string) {
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }

}
