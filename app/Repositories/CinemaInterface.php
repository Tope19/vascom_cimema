<?php
namespace App\Repositories;

interface CinemaInterface{
    public function all();

    public function edit($id);

    public function store(array $data);

    public function update($id, array $data);

    public function delete($id);
}
