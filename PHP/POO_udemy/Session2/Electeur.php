<?php


class Electeur extends Personne
{
    private $bureauVote;
    private $vote = false;

    public function booleen()
    {
        $this->vote = true;
        return $this->vote;
    }

    public function isVoter()
    {
        if ($this->vote)
        {
            echo 'Cet electeur a voté';
        }
        else
        {
            echo 'Cet electeur n\'a pas voté';
        }
    }
}