<?php

namespace AppBundle\Repository;

class EmployerRepository extends \Doctrine\ORM\EntityRepository {

    public function getAll() {
        return
            $this->getEntityManager()->createQuery
            (
                '
            SELECT e FROM AppBundle:Employer e 
            ORDER BY e.lastName ASC'
            )
                ->getResult();
    }
}
