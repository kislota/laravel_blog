<<<<<<< HEAD
<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class Filters {

    protected $request, $builder;
    protected $filters = [];

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function apply($builder) {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)){
                $this->$filter($value);
            }
        }
        return $this->builder;
    }

    public function getFilters() {
        return $this->request->only($this->filters);
    }
}
=======
<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class Filters {

    protected $request, $builder;
    protected $filters = [];

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function apply($builder) {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)){
                $this->$filter($value);
            }
        }
        return $this->builder;
    }

    public function getFilters() {
        return $this->request->only($this->filters);
    }
}
>>>>>>> 10cbb11750688e8928926d6a00b9aa4b33bb755e
