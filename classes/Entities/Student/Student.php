<?php

namespace classes\Entities\Student;

use classes\PureClasses\Date\Date;
use classes\PureClasses\Name\Name;

class Student
{
    private Name $name;
    private Date $date;

    /**
     * @param Name $name
     * @param Date $date
     */
    public function __construct(Name $name, Date $date)
    {
        $this->name = $name;
        $this->date = $date;
    }

    public function getName() : string
    {
        return $this->name->getFullName();
    }

    public function getDate() : string
    {
        return $this->date->getDate();
    }


}