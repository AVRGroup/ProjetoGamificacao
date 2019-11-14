<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model\ProfessorTurma
 *
 * @ORM\Entity()
 * @ORM\Table(name="professor_turma")
 */
class ProfessorTurma
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="professor_turma")
     * @ORM\JoinColumn(name="professor", referencedColumnName="id", nullable=false)
     */
    protected $professor;

    /**
     * @ORM\ManyToOne(targetEntity="Turma", inversedBy="professor_turma")
     * @ORM\JoinColumn(name="turma", referencedColumnName="id", nullable=false)
     */
    protected $turma;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return MedalhaUsuario
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Turma
     */
    public function getTurma()
    {
        return $this->turma;
    }

    /**
     * @param mixed $turma
     * @return MedalhaUsuario
     */
    public function setMedalha($turma)
    {
        $this->turma = $turma;
        return $this;
    }

    /**
     * @return Usuario
     */
    public function getProfessor()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $professor
     * @return MedalhaUsuario
     */
    public function setUsuario($professor)
    {
        $this->professor = $professor;
        return $this;
    }

}