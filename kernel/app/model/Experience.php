<?php
require_once(LIB."Model.php");
class Experience extends Model
{
    protected $id_experience;
    protected $candidate;
    protected $label;

    public function __construct()
    {
        parent::__construct("experience", "id_experience");
        $this->id_experience = null;
        $this->candidate = null;
        $this->label = "";
    }

    /**
     * @return null
     */
    public function getIdExperience()
    {
        return $this->id_experience;
    }

    /**
     * @param null $id_experience
     */
    public function setIdExperience($id_experience)
    {
        $this->id_experience = $id_experience;
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