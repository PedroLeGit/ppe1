<?php
require_once(LIB."Model.php");
class SkillCandidateLevel extends Model
{
    protected $skill;
    protected $candidate;
    protected $level;

    public function __construct()
    {
        parent::__construct("candidate_skill_level", array("skill","candidate"));
        $this->skill = null;
        $this->candidate = null;
        $this->level = null;
    }

    /**
     * @return null
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * @param null $skill
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;
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
     * @return null
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param null $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

}