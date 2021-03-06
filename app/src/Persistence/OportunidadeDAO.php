<?php

namespace App\Persistence;

use App\Model\Oportunidade;
use Doctrine\ORM\EntityManager;

class OportunidadeDAO extends BaseDAO
{

    public function __construct(EntityManager $db)
    {
        $this->em = $db;
    }

    public function getById($id) : Oportunidade
    {
        try {
            $query = $this->em->createQuery("SELECT u FROM App\Model\Oportunidade AS u WHERE u.id = :id");
            $query->setParameter('id', $id);
            $oportunidade = $query->getOneOrNullResult();
        } catch (\Exception $e) {
            $oportunidade = null;
        }

        return $oportunidade;
    }

    public function getAll()
    {
        try {
            $query = $this->em->createQuery("SELECT o FROM App\Model\Oportunidade as o ORDER BY o.criado_em DESC");
            $oportunidades = $query->getResult();
        } catch (\Exception $e) {
            $oportunidades = null;
        }

        return $oportunidades;
    }

    public function setPreRequisito($oportunidade, $disciplina)
    {
        $sql_insert = "INSERT INTO db_gamificacao.oportunidade_disciplina (oportunidade, disciplina) VALUES ($oportunidade, $disciplina)";
        $stmt_insert = $this->em->getConnection()->prepare($sql_insert);
        $stmt_insert->execute();
    }
}


