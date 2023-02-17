<?php

namespace classes\Student;

use classes\Date\Date;
use classes\Name\Name;

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