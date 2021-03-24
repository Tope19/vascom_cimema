<?php
namespace App\Repositories;

interface MovieInterface{
    public function all();

    public function get();

    public function edit($id);

    public function store(array $data);

    public function update($id, array $data);

    public function delete($id);
}
