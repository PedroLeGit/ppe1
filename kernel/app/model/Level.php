<?php
require_once(LIB."Model.php");
class Level extends Model
{
    protected $id_level;
    protected $label;

    public function __construct()
    {
        parent::__construct("level", "id_level");
        $this->id_level = null;
        $this->label = "";
    }

    /**
     * @return null
     */
    public function getIdLevel()
    {
        return $this->id_level;
    }

    /**
     * @param null $id_level
     */
    public function setIdLevel($id_level)
    {
        $this->id_level = $id_level;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

}