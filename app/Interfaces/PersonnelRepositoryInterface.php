<?php

namespace App\Interfaces;

interface PersonnelRepositoryInterface
{
    public function getAllPersonnels();
    public function getPersonnelById(int $id);
    public function deletePersonnel(int $id);
    public function createPersonnel(array $data);
    public function updatePersonnel(int $id, array $data);
}
