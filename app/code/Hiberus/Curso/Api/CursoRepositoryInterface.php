<?php

namespace Hiberus\Curso\Api;

use Hiberus\Curso\Api\Data\CursoInterface;

interface CursoRepositoryInterface
{
    /**
     * @param int $entityId
     * @return CursoInterface
     */
    public function getById(int $entityId);

    /**
     * @param CursoInterface $curso
     * @return CursoInterface
     */
    public function save(CursoInterface $curso);

    /**
     * @param CursoInterface $curso
     * @return void
     */
    public function delete(CursoInterface $curso);

    /**
     * @param int $entityId
     * @return CursoInterface
     */
    public function deleteById(int $entityId);
}

