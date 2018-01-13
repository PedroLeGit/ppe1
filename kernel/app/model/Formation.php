<?php
require_once(LIB."Model.php");
class Formation extends Model
{
    protected $id_formation;
    protected $candidate;
    protected $label;

    public function __construct()
    {
        parent::__construct("formation", "id_formation");
        $this->id_formation = null;
        $this->candidate = null;
        $this->label = "";
    }

    /**
     * @return null
     */
    public function getIdFormation()
    {
        return $this->id_formation;
    }

    /**
     * @param null $id_formation
     */
    public function setIdFormation($id_formation)
    {
        $this->id_formation = $id_formation;
    }

    /**
     * @return null
     */
    public function getCandidate()
    {
        return $this->candidate;
    }

    /**
     * @param null $candidate
     */
    public function setCandidate($candidate)
    {
        $this->candidate = $candidate;
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