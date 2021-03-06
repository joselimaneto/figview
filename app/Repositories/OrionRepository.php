<?php
/**
 * Created by PhpStorm.
 * User: joseneto
 * Date: 12/01/17
 * Time: 17:12
 */

namespace Figview\Repositories;


use Prettus\Repository\Contracts\RepositoryInterface;

interface OrionRepository extends RepositoryInterface
{

    public function isOwner($orionId, $userId);
    public function findAllUserOrions($userId, $limit = null, $columns = array());
}