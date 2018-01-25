<?php
/**
 * Created by PhpStorm.
 * User: pplaud
 * Date: 25/01/2018
 * Time: 08:42
 */
require_once(LIB."Model.php");
class Department extends Model
{
    protected $id_department;
    protected $label;
    protected $staff;

    public function __construct()
    {
        parent::__construct("department", "id_department");
        $this->id_department = null;
        $this->label = "";
        $this->staff = "";

    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getStaff()
    {
        return $this->staff;
    }

    /**
     * @param mixed $staff
     */
    public function setStaff($staff)
    {
        $this->staff = $staff;
    }
}