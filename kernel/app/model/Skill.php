<?php
require_once(LIB."Model.php");
class Skill extends Model
{
    protected $id_skill;
    protected $label;

    public function __construct()
    {
        parent::__construct("skill", "id_skill");
        $this->id_skill = null;
        $this->label = "";
    }

    /**
     * @return null
     */
    public function getIdSkill()
    {
        return $this->id_skill;
    }

    /**
     * @param null $id_skill
     */
    public function setIdSkill($id_skill)
    {
        $this->id_skill = $id_skill;
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