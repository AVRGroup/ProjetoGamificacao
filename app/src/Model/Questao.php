<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model\Questao
 *
 * @ORM\Entity()
 * @ORM\Table(name="questao")
 */
class Questao
{
    //Tipos de questões
    const FECHADA = 0;

    const ABERTA = 1;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $numero;

    /**
     * @ORM\Column(type="string", length=300, nullable=false)
     */
    protected $enunciado;

    /**
     * 0: Fechada
     * 1: Sim_Nao
     * 1: Aberta
     *
     * @ORM\Column(type="smallint", options={"default" : 0})
     */
    protected $tipo = 0;
    
    /**
     * @ORM\ManyToOne(targetEntity="Questionario", inversedBy="questoes_questionario")
     * @ORM\JoinColumn(name="questionario", referencedColumnName="id", nullable=false)
     */
    protected $questionario;

    /**
     * @ORM\OneToMany(targetEntity="RespostaAvaliacao", mappedBy="avaliacao")
     * @ORM\JoinColumn(name="avaliacao", referencedColumnName="id", nullable=false)
     */
    protected $resposta_avaliacao;

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
     * @return Questao
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     * @return Questao
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnunciado()
    {
        return $this->enunciado;
    }

    /**
     * @param mixed $enunciado
     * @return Questao
     */
    public function setEnunciado($enunciado)
    {
        $this->enunciado = $enunciado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     * @return Questao
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuestionario()
    {
        return $this->questionario;
    }

    /**
     * @param mixed $tipo_questionario
     * @return Questao
     */
    public function setQuestionario($questionario)
    {
        $this->questionario = $questionario;
        return $this;
    }

}